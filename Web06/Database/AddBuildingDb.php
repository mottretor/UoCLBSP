<?php
require '../Map/AddBuilding.php';

if(isset($_POST['AddBuilding'])) {
    $buildingName = $_POST['BuildingName'];
    $description = $_POST['Description'];
    $latitudes = $_POST['Latitudes'];
    $longitudes = $_POST['Longitudes'];

    require 'DbConn.php';

    $query = "SELECT * FROM building WHERE id = ''";
    mysqli_query($con,$query)
    or die(mysqli_error($con));

    $query2 = "INSERT INTO `building` (name, description, latitudes, longitudes) VALUES ('$buildingName', '$description', '$latitudes', '$longitudes') ";
    mysqli_query($con, $query2)
    or die(mysqli_error($con));

    require '../Map/AddBuilding.php';

//    require '../include/footer.php';

}

?>








