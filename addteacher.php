<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel = "stylesheet" href = "bootstrap.css">
    <link rel = "stylesheet" href = "flexslider.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>


#menu {
    background-color: lightcyan;
    color: #fff;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 1px;
    min-height: 70px;
}



.navbar-inverse .navbar-nav > li > a, .navbar-inverse .navbar-nav > li > a:hover {
    color: #000000;
    padding: 12px 10px;
}


.modal {
    display: none; 
    position: fixed;
    z-index: 1; 
    left: 0;
    top: 0;
    opacity: 1;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0, 0, 0); 
    background-color: rgba(0, 0, 0, 0.4); 
    -webkit-animation-name: fadeIn; 
    -webkit-animation-duration: 0.4s;
    animation-name: fadeIn;
    animation-duration: 0.4s
}


.modal-content {

    position: fixed;
    top: 25%;
    left: 35%;
    background-color: #fff;
    width: 30%;
    -webkit-animation-name: slideIn;
    -webkit-animation-duration: 0.4s;
    animation-name: slideIn;
    animation-duration: 0.4s
}

.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 5px 20px;
    background-color: #000000;
    color: white;
}

.modal-body {
    padding: 2px 16px;
}

.modal-footer {
    padding: 2px 16px;
    background-color: #FFFFFF;
    color: white;
}


@-webkit-keyframes slideIn {
    from {
        top: 0;
        opacity: 0
    }
    to {
        top: 25%;
        opacity: 1
    }
}

@keyframes slideIn {
    from {
        top: 0;
        opacity: 0
    }
    to {
        top: 25%;
        opacity: 1
    }
}

@-webkit-keyframes fadeIn {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}

@keyframes fadeIn {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}


#footer {
    padding: 5px 20px;
    background-color: lightcyan;
    text-align: right;
    color: #fff;
    font-size: 15px;
}
    </style>
    <br>

<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    
        <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="addteacher.php">ADD TEACHERS</a></li>
                <li><a href="addsubject.php">ADD SUBJECTS</a></li>
                <li><a href="addclass.php">ADD CLASSROOMS</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ALLOTMENT
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li>
                            <a href=allotsubject.php>THEORY COURSES</a>
                        </li>
                        <li>
                            <a href=allotpractical.php>PRACTICAL COURSES</a>
                        </li>
                        <li>
                            <a href=allotclass.php>CLASSROOMS</a>
                        </li>
                    </ul>
                </li>

      <div align="center" style="margin-top:80px">
    
    
</div>               
                
    
</div>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="homepage.html">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>

<br>


<?php
          if (isset($_POST['faculty_id']))
          {             
                $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
                    "INSERT INTO teachers VALUES ('$faculty_id','$faculty_name')");
                if ($q) {
                    $sql = "CREATE TABLE " . $faculty_id . " (
                day VARCHAR(10) PRIMARY KEY, 
                period1 VARCHAR(30),
                period2 VARCHAR(30),
                period3 VARCHAR(30),
                period4 VARCHAR(30),
                period5 VARCHAR(30),
                period6 VARCHAR(30)
                )";
                    mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), $sql);
                    $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
                    for ($i = 0; $i < 6; $i++) {
                        $day = $days[$i];
                        $sql = "INSERT into " . $faculty_id . " VALUES('$day','','','','','','')";
                        mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), $sql);
                    }
                }
          }
           
    ?>

<div align="center" style="margin-top:100px">
    <button id="teachermanual" class="btn btn-success btn-lg">ADD TEACHER</button>
</div>

<div id="myModal" class="modal">


    <div class="modal-content" style="margin-top: -60px">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add Teacher</h2>
        </div>
        <div class="modal-body" id="EnterTeacher">
            
            <div style="display:none" id="addTeacherForm">
                <form action="addformteacher.php" method="POST">
                <div class="form-group">
                        <label for="facultyno">Faculty No</label>
                        <input type="text" class="form-control" id="facultyno" name="TN" placeholder="Faculty No ...">
                    </div>
                    <div class="form-group">
                        <label for="teachername">Teacher's Name</label>
                        <input type="text" class="form-control" id="teachername" name="TF"
                               placeholder="Teacher's Name ...">
                    </div>
                    
                        
                    </div>
                    
                    <div align="right">
                        <input type="submit" class="btn btn-default" name="ADD" value="ADD">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<div align="center" style="margin-top:100px">
    <button id="teachermanual1" class="btn btn-success btn-lg">DELETING TEACHER</button>
</div>

<div id="myModal1" class="modal">


    <div class="modal-content" style="margin-top: -60px">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead1">Delete Teacher</h2>
        </div>
        <div class="modal-body" id="EnterTeacher">
            
            <div style="display:none" id="addTeacherForm1">
                <form action="delteacher.php" method="GET">
                <div class="form-group">
                        <label for="TL">Faculty No</label>
                        <input type="text" class="form-control" id="facultyno" name="TQ" placeholder="Faculty No ...">
                    </div>
                    <div class="form-group">
                        <label for="teachername">Teacher's Name</label>
                        <input type="text" class="form-control" id="teachername" name="TL"
                               placeholder="Teacher's Name ...">
                    </div>
                    
                        
                    </div>
                    
                    <div align="right">
                        <input type="submit" class="btn btn-default" name="DELETE" value="DELETE">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addteacherBtn = document.getElementById("teachermanual");
    var heading = document.getElementById("popupHead");
    var facultyForm = document.getElementById("addTeacherForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addteacherBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        facultyForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        facultyForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    // Get the modal
    var modal1 = document.getElementById('myModal1');

    // Get the button that opens the modal
    var addteacherBtn1 = document.getElementById("teachermanual1");
    var heading1 = document.getElementById("popupHead1");
    var facultyForm1 = document.getElementById("addTeacherForm1");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addteacherBtn1.onclick = function () {
        modal1.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        facultyForm1.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal1.style.display = "none";
        //adminForm.style.display = "none";
        facultyForm1.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal1.style.display = "none";
        }
    }
</script>
<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 30px;
            width: 90%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>



    <table id=teacherstable style="margin-left: 80px">
        <caption><strong>Teacher's Information </strong></caption>
        <tr>
            <th width="130">Faculty No</th>
            <th width=290>Name</th>
            
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
            "SELECT * FROM teachers ORDER BY faculty_id ASC");

        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['faculty_id']}</td>
                    <td>{$row['faculty_name']}</td>
                   <td>
                   
                    </tr>\n";
        }
       // echo "<script>deleteHandlers();</script>";
        ?>
        
        </tbody>
    </table>

</div>

</body>
</html>