<?php
require 'connection.php';

$result = mysqli_query($con,"SELECT * FROM polygon");
$row = mysqli_fetch_assoc($result);
$data = $row['description'];

echo $data;

?>