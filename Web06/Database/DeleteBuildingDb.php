<?php
    require '../Map/EditBuilding.php';

    if(isset($_POST['DeleteBuilding'])) {
        $eventid = $_POST['BuildingName'];

        require 'DbConn.php';

        $query6 = "DELETE FROM `building` WHERE name = '$buildingName'";
        mysqli_query($con, $query6)
        or die(mysqli_error($con));
    }

?>

?>

?>