<?php
include 'connection.php';
if (isset($_POST['CN'])  && isset($_POST['TF'])) {
    $name = $_POST['CN'];
    $lect_prac = $_POST['TF'];
    $status = $_POST['ST'];
    
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), 
"INSERT INTO classrooms VALUES ('$name','$lect_prac','$status')");
if ($q) {
    $message = "Classroom added.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addclass.php");
} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    

}
?>