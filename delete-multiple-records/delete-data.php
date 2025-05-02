<?php

$student_id=$_POST['id'];


$str = implode(",", $student_id);

$conn = mysqli_connect("localhost", "root", "", "students") or die("Connection failed");

$sql = "DELETE FROM students WHERE id IN ({$str})";

if (mysqli_query($conn,$sql)) {
   echo 1;

    }
    else{
        echo 0;
    }

   

?>
