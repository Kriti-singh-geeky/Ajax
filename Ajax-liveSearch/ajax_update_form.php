<?php
$student_id=$_POST["id"];
$firstName=$_POST["first_name"];
$lastName=$_POST["last_name"];

$conn=mysqli_connect("localhost","root","","students") or die("connection failed");

$sql = "UPDATE student SET first_name='{$firstName}', last_name='{$lastName}' WHERE id={$student_id}";

if(mysqli_query($conn,$sql))
{
    echo 1;
}
else{
    echo 0;
}
?>