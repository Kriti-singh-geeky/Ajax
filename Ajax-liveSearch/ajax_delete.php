<?php
$student_id=$_POST["id"];

$conn=mysqli_connect("localhost","root","","students") or die("connection failed");

$sql="DELETE FROM student WHERE id={$student_id}";

if(mysqli_query($conn,$sql))
{
    echo 1;
}
else{
    echo 0;
}
?>