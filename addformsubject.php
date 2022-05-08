<?php

include 'connection.php';
if (isset($_POST['SC']) && isset($_POST['SN'])&& isset($_POST['ST']) && isset($_POST['SS']) && isset($_POST['SD'])) {
    $subject_code = $_POST['SC'];
    $subject_name = $_POST['SN'];
    $course_type = $_POST['ST'];
    $semester = $_POST['SS'];
    $department = $_POST['SD'];
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} /*else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}*/
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), 
"INSERT INTO subjects VALUES ('$subject_code','$subject_name','$course_type','$semester','$department',0,'')");
    

if ($q) {
    $message = "Subject added.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsubject.php");
} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}
?>