<?php

$conn=mysqli_connect("localhost","root","","students") or die("connection failed");

$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$country=$_POST['country'];

$sql="INSERT INTO students(name,age,gender,country) VALUES ('{$name}',$age,'{$gender}','{$country}')";

if(mysqli_query($conn,$sql))
{
    echo "Hello {$name} your record is saved.";
}
else{
    echo "can't save your data";
}
?>