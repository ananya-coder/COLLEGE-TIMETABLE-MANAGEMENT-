<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    title>College TimeTable Management System</title>
    <link rel = "stylesheet" href = "bootstrap.css">
    <link rel = "stylesheet" href = "flexslider.css">
</head>
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
    padding: 22px 10px;
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
<body>

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
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="homepage.html">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>

<br>
<?php
if (isset($_POST['in_class'])) {
    include 'connection.php';
    $year = $_POST['course'];
    $class = $_POST['in_class'];
    $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
        "UPDATE classrooms SET status = '$year' WHERE name = '$class'");
}
?>

<!-- <form action="allotclass.php" method="post" style="margin-top: 100px">

    <div align="center">
        <select name="course" class="list-group-item">
            <option selected disabled>Select Year of College</option>
            ';
            <option value="2">1st Year</option>
            <option value="2">2nd Year</option>
            <option value="3">3rd Year</option>
            <option value="4">4th Year</option>
        </select>
    </div>

    <div align="center" style="margin-top: 5px">
        <select name="in_class" class="list-group-item">
         <?php
            include 'connection.php';
            $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
                "SELECT * FROM classrooms");
            $row_count = mysqli_num_rows($q);
            if ($row_count) {
                $mystring = '
             <option selected disabled>Select Classroom</option>';
                while ($row = mysqli_fetch_assoc($q)) {
                    if (($row['status'] != 0))
                        continue;
                    $mystring .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
                echo $mystring;
            }
            ?>
        </select>
    </div>
    <div align="center" style="margin-top: 10px;">
        <button type="submit" class="btn btn-success btn-lg">Allot</button>
    </div>
    
</form> -->



<div align="center">
    <style>
        table {
            margin-top: 70px;
            margin-bottom: 50px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 80px;
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

    <table id=allotedclassroomstable>
        <caption><strong>CLASSROOMS ALLOTMENT</strong></caption>
        <tr>
            <th width="250">Classroom</th>
            <th width="400">Alloted To</th>
            
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
            "SELECT * FROM classrooms ");
        $courses = array('B.Tech 2nd Year', 'B.Tech 3rd Year', 'B.Tech 4th Year');
        while ($row = mysqli_fetch_assoc($q)) {
            if ($row['status'] == 0)
             continue;
            
           echo "<tr><td>{$row['name']}</td>
                 <td>{$courses[$row['status']-2]}</td>
                
                    </tr>\n";
        
    }
       
        ?>
        </tbody>
    </table>
</div>

</body>
</html>