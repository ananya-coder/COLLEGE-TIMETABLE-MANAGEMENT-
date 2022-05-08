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

<div align="center"
     style="margin-top:10%">
    <button
        id="classroommanual" class="btn btn-success btn-lg">ADD CLASSROOM
    </button>
</div>

<div id="myModal" class="modal">

   
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Adding Classroom</h2>
        </div>
        <div class="modal-body" id="EnterClassroom">
      
            <div style="display:none" id="addClassroomForm">
                <form action="addformclass.php" method="POST">
                    <div class="form-group">
                        <label for="classroomname">ClassRoom Number</label>
                        <input type="text" class="form-control" id="classroomname" name="CN"
                               placeholder="B116, B102,..">
                    </div>

                    <div class="form-group">
                        <label for="classroomname">Subject</label>
                        <input type="text" class="form-control" id="classroomname" name="TF"
                               placeholder="DBMS, TACD..">
                    </div> 

                    <div class="form-group">
                        <label for="classroomname">Status</label>
                        <input type="text" class="form-control" id="classroomname" name="ST"
                               placeholder="1, 2..">
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

<div align="center"
     style="margin-top:10%">
    <button
        id="classroommanual1" class="btn btn-success btn-lg">DELETE CLASSROOM
    </button>
</div>
<div id="myModal1" class="modal">

   
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead1">Deleting Classroom</h2>
        </div>
        <div class="modal-body" id="EnterClassroom">
      
            <div style="display:none" id="addClassroomForm1">
                <form action="delclass.php" method="GET">
                    <div class="form-group">
                        <label for="classroomname">ClassRoom Number</label>
                        <input type="text" class="form-control" id="classroomname" name="CE"
                               placeholder="B116, B102,..">
                    </div>

                    <div class="form-group">
                        <label for="classroomname">Subject</label>
                        <input type="text" class="form-control" id="classroomname" name="TG"
                               placeholder="DBMS, TACD..">
                    </div> 

                    <div class="form-group">
                        <label for="classroomname">Status</label>
                        <input type="text" class="form-control" id="classroomname" name="SF"
                               placeholder="1, 2..">
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
  
    var modal = document.getElementById('myModal');


    var addclassroomBtn = document.getElementById("classroommanual");
    var heading = document.getElementById("popupHead");
    var classroomForm = document.getElementById("addClassroomForm");
  
    var span = document.getElementsByClassName("close")[0];

    

    addclassroomBtn.onclick = function () {
        modal.style.display = "block";
     
        classroomForm.style.display = "block";
    


    }

    span.onclick = function () {
        modal.style.display = "none";
        classroomForm.style.display = "none";

    }

   
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
  
    var modal1 = document.getElementById('myModal1');


    var addclassroomBtn1 = document.getElementById("classroommanual1");
    var heading1 = document.getElementById("popupHead1");
    var classroomForm1 = document.getElementById("addClassroomForm1");
  
    var span = document.getElementsByClassName("close")[0];

    

    addclassroomBtn1.onclick = function () {
        modal1.style.display = "block";
     
        classroomForm1.style.display = "block";
    


    }

    span.onclick = function () {
        modal1.style.display = "none";
        classroomForm1.style.display = "none";

    }

   
    window.onclick = function (event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
</script>
<!--
<script>
    function deleteHandlers() {
        var table = document.getElementById("classroomstable");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var b = currentRow.getElementsByTagName("td")[0];
            var createDeleteHandler =
                function (row) {
                    return function () {
                        var cell = row.getElementsByTagName("td")[0];
                        var id = cell.innerHTML;
                        var x;
                        if (confirm("Are You Sure?") == true) {
                            window.location.href = "delclass.php?name=" + id;

                        }

                    };
                };
            currentRow.cells[2].onclick = createDeleteHandler(currentRow);
        }
    }-->
</script>
<div align="center">
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 70%;
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


    <table id=classroomstable>
        <caption><strong>ADDED CLASSROOMS</strong></caption>
        <tr>

            <th width="100">Classroom Number</th>
            <th width="60">Subject</th>
            <th width="60">Year</th>
        </tr>
        
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "root", "ananya1234", "timetable"),
            "SELECT * FROM classrooms ");
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['name']}</td>
            <td>{$row['lect_prac']}</td>
            <td>{$row['status']}</td>
                
                    </tr>\n";
        }
        //echo "<script>deleteHandlers();</script>";
        ?>
    </table>
</div>
</div>
</body>
</html>