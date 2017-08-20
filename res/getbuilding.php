<?php
require 'connection.php';

$test = $_POST['text'];

$res = mysqli_query($con,"SELECT * FROM building WHERE name LIKE $test%");

$result = array();

while($row = mysqli_fetch_array($res)){
    array_push($result,
        array('id'=>$row[0],
            'name'=>$row[1],
            'description'=>$row[2],
            'latitudes'=>$row[3],
            'longitudes'=>$row[4]
        ));
}

echo json_encode(array("result"=>$result));

mysqli_close($con);

?>