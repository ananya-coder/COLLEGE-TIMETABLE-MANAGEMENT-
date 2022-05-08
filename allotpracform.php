<?php
include 'connection.php';
if (isset($_POST['tobealloted']) && isset($_POST['toalloted']) ) {
    $subject = $_POST['tobealloted'];
    $teacher = $_POST['toalloted'];
    /*$teacher2 = $_POST['toalloted2'];
    $teacher3 = $_POST['toalloted3'];*/
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), 
"UPDATE subjects SET isAlloted=1, allotedto='$teacher' WHERE subject_code='$subject'");

if ($q) {
    $message = "Done.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:allotpractical.php");
} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    $message = $subject;
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.html");

}

?>