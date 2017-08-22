<?php
require '../Database/AddBuilding.php';

if(isset($_POST['addBuilding'])) {
    $buildingName = $_POST['BuildingName'];
    $description = $_POST['Description'];
    $latitude = $_POST['Latitudes'];
    $longitude = $_POST['Longitudes'];

    require 'DbConn.php';

    $query = "SELECT * FROM building WHERE EventId = ''";
    mysqli_query($con,$query)
    or die(mysqli_error($con));

    $query2 = "INSERT INTO `Building` (name, description, latitudes, longitudes) VALUES ('$buildingName', '$description', '$latitudes', '$longitudes') ";
    mysqli_query($con, $query2)
    or die(mysqli_error($con));

//    require '../include/footer.php';

}

?>








