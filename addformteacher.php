<?php

include 'connection.php';
if (isset($_POST['TN']) && isset($_POST['TF']) ) {
    $faculty_id = $_POST['TN'];
    $faculty_name = $_POST['TF'];
   
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), 
"INSERT INTO teachers VALUES ('$faculty_id','$faculty_name')");

$sql = "CREATE TABLE " . $faculty_id . 
" (
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
if ($q) {
    $message = "Teacher added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addteacher.php");
} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}

?>