<?php
//require '../include/header.php';

if(isset($_POST['SearchBuilding'])) {
    $buildingName = $_POST['BuildingName'];

    require 'DbConn.php';

    $sql3 = "SELECT * FROM building WHERE name = '$buildingName'";
    $query7 = mysqli_query($con, $sql3)
    or die(mysqli_error($con));

    while($row3 = mysqli_fetch_assoc($query7)) {
        echo '
            <!DOCTYPE html>
                <html>
                    <head>
//                        <title>Add Event</title>
//                            <link rel="stylesheet" type="text/css" href="../css/eventStyle.css">
                    </head>
                    <body>
                        <h1>Update Event</h1>
//                        <div class="dive" style=" margin-right: 0px; margin-left: 350px; background-color: #0B314A" align=center>
                            <form action="../Database/EditBuildingDb.php" method="post">
                                <table>
                                    <tr>
                                        <td> Name : </td>
                                        <td> 
                                            <input type="text" name="BuildingName" value="'.$row3['BuildingName'].'">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> Description : </td>
                                        <td> 
                                            <textarea rows="5" cols="30" name="Description">'.$row3['Description'].'</textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Latitudes : </td>
                                        <td> 
                                            <input type="text" name="Latitudes" value="'.$row3['Latitudes'].'">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Longitudes : </td>
                                        <td> 
                                            <input type="text" name="Longitudes" value="'.$row3['Longitudes'].'">
                                        </td>
                                    </tr>

                                </table>

                            <input type="submit" name="UpdateBuilding2" value="Update Building">
                            <input type="reset" value="Reset">

                            </form>
                        </div>
                    </body>
                </html>';

//        require '../include/footer.php';

    }
}

?>