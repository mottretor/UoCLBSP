<?php

if(isset($_POST['UpdateBuilding'])) {
    $buildingName = $_POST['buildingName'];
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

if(isset($_POST['DeleteBuilding'])) {
    $eventid = $_POST['BuildingName'];

    require 'DbConn.php';

    $query6 = "DELETE FROM `building` WHERE name = '$buildingName'";
    mysqli_query($con, $query6)
    or die(mysqli_error($con));
}


?>