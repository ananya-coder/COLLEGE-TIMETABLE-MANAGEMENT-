<?php
$servername="localhost";
$username="ananya";

//defaultusernameisroot
$password="ananya1234";
//defaultpasswordisblank
$conn=mysqli_connect($servername,$username,$password);
if(!$conn)
   die("Connectionfailed".mysqli_connect_error());
else
echo"Successfullyconnectedwithdatabase";
/*$query="CREATE DATABASE timetable";
if(mysqli_query($conn,$query))
{
    echo "Databasecreatedsuccessfullywiththenametimetable";
}
else{
    echo "Errorcreatingdatabase:".mysqli_error($conn);
    }*/
mysqli_close($conn);?>