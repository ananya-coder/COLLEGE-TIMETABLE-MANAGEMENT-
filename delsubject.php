<?php

include 'connection.php';
if (isset($_GET['SK']) && isset($_GET['SE']) && isset($_GET['SQ']) && isset($_GET['SX']) && isset($_GET['SL']) ) {
    $subject_code = $_GET['SK'];
    $subject_name = $_GET['SE'];
    $course_type = $_GET['SQ'];
    $semester = $_GET['SX'];
    $department = $_GET['SL'];
      $message = "nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), 
"DELETE FROM subjects WHERE subject_code ='$subject_code' && subject_name ='$subject_name' && course_type ='$course_type' && semester='$semester'&& department ='$department' || isAlloted ='$isAlloted' || allotedto ='$allotedto'");
if ($q) {
    $message = "Subject deleted.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsubject.php");
} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}
?>