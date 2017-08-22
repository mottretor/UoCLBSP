<?php
//require '../include/header.php';

//require '../Map/EditBuilding.php';

if(isset($_POST['UpdateBuilding'])) {
    $buildingName = $_POST['BuildingName'];

    require 'DbConn.php';

    $sql = "SELECT * FROM building WHERE name = '$buildingName'";
    $query6 = mysqli_query($con, $sql)
    or die(mysqli_error($con));

    while($row = mysqli_fetch_assoc($query6)) {
        echo '<a href="../Map/EditBuilding.php"';

    }
}

?>