<?php
$conn = mysqli_connect("localhost", "root", "", "students") or die("Connection failed");

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("SQL query failed.");


$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '
    <table border="1" width="100%" cellspacing="0" cellpadding="10px">
        <tr>
            <th width="50px"></th>
            <th width="60px">ID</th>
            <th>Name</th>
            <th width="90px">Age</th>
            <th width="90px">Country</th>
        </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td align='center'><input type='checkbox' class='delete-checkbox' value='{$row['id']}'></td>
            <td align='center'>{$row["id"]}</td>
            <td align='center'>{$row["name"]}</td>
            <td align='center'>{$row["age"]}</td>
            <td align='center'>{$row["country"]}</td>
        </tr>";
    }

    $output .= "</table>";
    echo $output;
} else {
    echo "<h2>No records found</h2>";
}
?>
