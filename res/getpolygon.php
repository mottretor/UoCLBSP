<?php
require 'connection.php';

$result = mysqli_query($con,"SELECT * FROM polygon");
$row = mysqli_fetch_row($result);
$data = $row[0];

echo $data;

?>