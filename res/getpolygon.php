<?php

$result = mysqli_query($con,"SELECT description FROM polygon");
$row = mysqli_fetch_array($result);
$data = $row[0];

echo $data;

?>