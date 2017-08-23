<?php
//require '../include/header.php';

//require '../Map/EditBuilding.php';

if(isset($_POST['SearchBuilding'])) {
        $buildingName = $_POST['buildingName'];

    require 'DbConn.php';

    $sql = "SELECT * FROM building WHERE name = '$buildingName'";
    $query6 = mysqli_query($con, $sql)
    or die(mysqli_error($con));
    $row3 = null;
    while($row2 = mysqli_fetch_assoc($query6)) {
        $row3 = $row2;
    }

}

include("showbuilding.php")
?>