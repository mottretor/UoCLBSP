<?php
require '../Map/EditBuilding.php';

if(isset($_POST['UpdateBuilding'])) {
    $buildingName = $_POST['BuildingName'];
    $description = $_POST['Description'];
    $latitudes = $_POST['Latitudes'];
    $longitudes = $_POST['Longitudes'];

    require 'DbConn.php';

    $query4 = "SELECT * FROM building WHERE name = '$buildingName'";
    mysqli_query($con,$query4)
    or die(mysqli_error($con));

    $query5 = "UPDATE `building` 
                SET `name` = '$buildingName',
                    `description` = '$description',
                    `latitudes` = '$latitudes',
                    `longitudes` = '$longitudes',      
            WHERE `name` = '$buildingName'";
    $result = mysqli_query($con,$query5)
    or die(mysqli_error($con));

}

?>