<?php
require 'connection.php';

$test = $_POST['text'];

$result = mysqli_query($con,"SELECT * FROM building WHERE name LIKE $test%");
$row = mysqli_fetch_all($result);


echo json_encode($row);

?>