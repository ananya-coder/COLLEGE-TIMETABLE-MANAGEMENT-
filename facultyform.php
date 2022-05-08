<?php
session_start();
include 'connection.php';
if (isset($_POST['FN'])) {
    $faculty_id = $_POST['FN'];
} else {
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
 "SELECT faculty_name FROM teachers WHERE faculty_id = '$faculty_id'");
if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    $_SESSION['loggedin_name'] = $row['faculty_name'];
    $_SESSION['loggedin_id'] = $faculty_id;
    header("Location:facultypage.php");
} else {
    $message = "Username incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";

}
if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    echo 'welcome ' . $row['faculty_name'];
} else {
    $message = "Invalid Faculty Number.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";

}
?>