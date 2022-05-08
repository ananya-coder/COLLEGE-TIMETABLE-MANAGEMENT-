<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel = "stylesheet" href = "bootstrap.css">
    <link rel = "stylesheet" href = "flexslider.css">
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
                            <a href=allotclass.php>CLASSROOMS</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ADMINISTRATION
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    
                        <li>
                            <a href=allotclass.php>FACULTY</a>
                        </li>
                        <li>
                            <a href=allotclass.php>STUDENT</a>
                        </li>
                        <li>
                            <a href=allotclass.php>TIMETABLE</a>
                        </li>
                    </ul>
                </li>
                
    
</div>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>

<br>

<div align="center" style="margin-top:60px">
   
    <?php
       if (isset($_POST['subject_code']) && isset($_POST['subject_name'])&& isset($_POST['course_typw']) && isset($_POST['semester']) && isset($_POST['department']))
       { 
                $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
                    "INSERT INTO subjects VALUES ('$subject_code','$subject_name','$course_type','$semester','$department',0,'')");
       }            
   
    ?>
</div>


<div align="center"
     style="margin-top:10%">
    <button
        id="classroommanual" class="btn btn-success btn-lg">ADD SUBJECT
    </button>
</div>

<div id="myModal" class="modal">

      <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Adding Subject</h2>
        </div>
        <div class="modal-body" id="EnterClassroom">
      
            <div style="display:none" id="addClassroomForm">
                <form action="addformsubject.php" method="POST">
                <div class="form-group">
                        <label for="subjectcode">Subject Code</label>
                        <input type="text" class="form-control" id="subjectcode" name="SC" placeholder="CO203 CO205...">
                    </div>
                    
                    <div class="form-group">
                        <label for="classroomname">Subject</label>
                        <input type="text" class="form-control" id="subjectname" name="SN"
                               placeholder="DBMS, TACD, AOA..">
                    </div>
                    
                    <div class="form-group">
                        <label for="subjecttype">Course Type</label>
                        <select class="form-control" id="subjecttype" name="ST">
                            <option selected disabled>Select</option>
                            <option value="THEORY">THEORY</option>
                            <option value="LAB">LAB</option>

                        </select>
</div>   

                    <div class="form-group">
                        <label for="subjectsemester">Semester</label>
                        <select class="form-control" id="subjectsemester" name="SS">
                            <option selected disabled>Select</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subjectdepartment">Department</label>
                        <select class="form-control" id="subjectdepartment" name="SD">
                            <option selected disabled>Select</option>
                            <option value="Computer Engg.">Computer Engg.</option>
                            <option value="Electronics Engg.">Electronics Engg.</option>
                            <option value="Electrical Engg.">Electrical Engg.</option>
                            <option value="Mechanical Engg.">Mechanical Engg.</option>
                        </select>
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
        id="classroommanual1" class="btn btn-success btn-lg">DELETE SUBJECT
    </button>
</div>

<div id="myModal1" class="modal">

      <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead1">Deleting Subject</h2>
        </div>
        <div class="modal-body" id="EnterClassroom">
      
            <div style="display:none" id="addClassroomForm1">
                <form action="delsubject.php" method="GET">
                <div class="form-group">
                        <label for="subjectcode">Subject Code</label>
                        <input type="text" class="form-control" id="subjectcode" name="SK" placeholder="CO203 CO205...">
                    </div>
                    
                    <div class="form-group">
                        <label for="classroomname">Subject</label>
                        <input type="text" class="form-control" id="subjectname" name="SE"
                               placeholder="DBMS, TACD, AOA..">
                    </div>
                    
                    <div class="form-group">
                        <label for="subjecttype">Course Type</label>
                        <select class="form-control" id="subjecttype" name="SQ">
                            <option selected disabled>Select</option>
                            <option value="THEORY">THEORY</option>
                            <option value="LAB">LAB</option>

                        </select>
</div>   
                    
                    <div class="form-group">
                        <label for="subjectsemester">Semester</label>
                        <select class="form-control" id="subjectsemester" name="SX">
                            <option selected disabled>Select</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subjectdepartment">Department</label>
                        <select class="form-control" id="subjectdepartment" name="SL">
                            <option selected disabled>Select</option>
                            <option value="Computer Engg.">Computer Engg.</option>
                            <option value="Electronics Engg.">Electronics Engg.</option>
                            <option value="Electrical Engg.">Electrical Engg.</option>
                            <option value="Mechanical Engg.">Mechanical Engg.</option>
                        </select>
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
        if (event.target == modal) {
            modal1.style.display = "none";
        }
    }
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

</div>



<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 50px;
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

    
    <table id=subjectstable style="margin-left: 90px">
        <caption><strong> Subject's Information</strong></caption>
        <tr>
            <th width="150">Code</th>
            <th width=300>Title</th>
            <th width=150>Course Type</th>
            <th width="150">Semester</th>
            <th width="350">Department</th>
            <!-- <th width="40">Action</th> -->
            
        </tr>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
            "SELECT * FROM subjects ORDER BY subject_code ASC ");
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['subject_code']}</td>
                    <td>{$row['subject_name']}</td>
                    <td>{$row['course_type']}</td>
                    <td>{$row['semester']}</td>
                     <td>{$row['department']}</td>
                     
                    </tr>\n";
        }
       // echo "<script>deleteHandlers();</script>";
        ?>
    </table>
</div>

</body>
</html>