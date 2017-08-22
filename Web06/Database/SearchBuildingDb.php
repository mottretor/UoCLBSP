<?php

if(isset($_POST['SearchBuilding'])) {
    $buildingName = $_POST['buildingName'];

    require 'DbConn.php';

    $sql = "SELECT * FROM EventTable WHERE name = '$buildingName'";
    $query3 = mysqli_query($con, $sql)
    or die(mysqli_error($con));

    while($row = mysqli_fetch_assoc($query3)) {
        echo '
            <!DOCTYPE html>
                <html>
                    <head>
//                        <title>Add Event</title>
//                            <link rel="stylesheet" type="text/css" href="../css/eventStyle.css">
                    </head>
                    <body>
//                        <h1>Update Building</h1>
//                        <div class="dive" style=" margin-right: 0px; margin-left: 350px; background-color: #0B314A" align=center>
                            <form action="UpdateBuilding.php" method="post">
                                <table>
                                    <tr>
                                        <td> Name : </td>
                                        <td> 
                                            <input type="text" name="BuildingName" value="'.$row['buildingName'].'">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> Description : </td>
                                        <td> 
                                            <textarea rows="5" cols="30" name="Description">'.$row['Description'].'</textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Latitude : </td>
                                        <td> 
                                            <input type="text" name="Latitudes" value="'.$row['Latitudes'].'">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Contact Number : </td>
                                        <td> 
                                            <input type="text" name="Longitudes" value="'.$row['Longitudes'].'">
                                        </td>
                                    </tr>
                                    
                                </table>

                            <input type="submit" name="UpdateEvent" value="Update Building">
                            <input type="reset" value="Cancel">

                            </form>
                        </div>
                    </body>
                </html>';

//        require '../include/footer.php';

    }
}

?>