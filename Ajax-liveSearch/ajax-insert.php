<?php
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];

$conn=mysqli_connect("localhost","root","","students") or die("connection failed");

$sql="INSERT INTO student(first_name,last_name) VALUES ('{$first_name}','{$last_name}')";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}


?>