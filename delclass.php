<!-- <?php
include 'connection.php';
$id = $_GET['name'];
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
    "DELETE FROM classrooms WHERE name = '$id' ");
if ($q) {

    header("Location:addclass.php");

} else {
    echo 'Error';
}
?> -->


<?php
include 'connection.php';
if (isset($_GET['CE'])  && isset($_GET['TG'])) {
    $name = $_GET['CE'];
    $lect_prac = $_GET['TG'];
    $status = $_GET['SF'];
    
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), 
"DELETE FROM classrooms WHERE name = '$name' &&  lect_prac ='$lect_prac' &&  status ='$status' ");
if ($q) {
    $message = "Classroom deleted.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addclass.php");
} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    

}
?>