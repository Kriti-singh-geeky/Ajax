<?php
$search_value=$_POST["search"];

$conn=mysqli_connect("localhost","root","","students") or die("connection failed");

$sql="SELECT * FROM student WHERE first_name Like '%{$search_value}%' OR last_name Like '%{$search_value}%' ";

$result=mysqli_query($conn,$sql) or die("sql query failed.");

$output="";
if(mysqli_num_rows($result) >0 ){
    $output= '<table border="1" width="100%" cellspacing="0" cellpadding="10px" 
    <tr>
    <th width="60px">ID</th>
    <th>Name</th>
    <th width="90px">Edit</th>
    <th width="90px">Delete</th>
    </tr>
    ';
    while($row=mysqli_fetch_assoc($result)){
        $output .="<tr><td>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td><td><button class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
    }
    $output .="</table>";
    mysqli_close($conn);
    echo $output;
}
else{
echo "<h2>not found</h2>";
}
?>