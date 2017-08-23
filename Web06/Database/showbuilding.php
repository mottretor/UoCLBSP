
<html>
<head>

</head>

<body>



<div style="width: 100%; height: 10%; float: top; background-color: black">
    <p style="color: white; font-size: 30px"> UoC Location Based Services Platform</p>
</div>
<div style="width: 100%; height: 90%; float: bottom">
    <div style="width: 25%; float: left">
        <div>
            </br>

            <form action="UpdateBuildingDb.php" method="post">

                <table>
                    <tr>
                        <td> Name : </td>
                        <td>
                            <input type="text" name="BuildingName" value="<?php echo $row3['name'];?>">
                        </td>
                    </tr>

                    <tr>
                        <td> Description : </td>
                        <td>
                            <textarea rows="5" cols="30" name="Description"><?php echo $row3['description'];?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td> Latitudes : </td>
                        <td>
                            <input type="text" name="Latitudes" value="<?php echo $row3['latitudes'];?>">
                        </td>
                    </tr>

                    <tr>
                        <td> Longitudes : </td>
                        <td>
                            <input type="text" name="Longitudes" value="<?php echo $row3['longitudes'];?>">
                        </td>
                    </tr>

                </table>

                <input type="submit" name="UpdateBuilding" value="Update Building">
                <input type="submit" name="DeleteBuilding" value="Delete Building">
                <input type="reset" value="Reset">

            </form>

        </div>
    </div>

    <div style="width: 75%; float:right">
        <div>
            <html>
            <head>
                <!--                        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />-->
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <script type="text/javascript">
                    var geocoder = new google.maps.Geocoder();

                    function geocodePosition(pos) {
                        geocoder.geocode({
                            latLng: pos
                        });
                    }

                    function updateMarkerStatus(str) {
                        document.getElementById('markerStatus').innerHTML = str;
                    }

                    function updateMarkerPosition(latLng) {
                        document.getElementById('infoLat').setAttribute('value',latLng.lat());
                        document.getElementById('infoLng').setAttribute('value',latLng.lng());
                    }

                    function initialize() {
                        var latLng = new google.maps.LatLng(6.902215976621638, 79.86069999999995);
                        var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                            zoom: 19,
                            center: latLng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        var marker = new google.maps.Marker({
                            position: latLng,
                            map: map,
                            draggable: true
                        });

                        // Update current position info.
                        updateMarkerPosition(latLng);
                        geocodePosition(latLng);

                        google.maps.event.addListener(marker, 'drag', function() {
                            updateMarkerStatus('Dragging...');
                            updateMarkerPosition(marker.getPosition());
                        });

                        google.maps.event.addListener(marker, 'dragend', function() {
                            updateMarkerStatus('Position Found!');
                            geocodePosition(marker.getPosition());
                        });

                    }

                    // Onload handler to fire off the app.
                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap"
                        async defer></script>
                <!--                        <script async defer-->
                <!--                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&callback=myMap">-->
                <!--                        </script>-->
            </head>
            <body>
            <style>
                #mapCanvas {
                    width: 100%;
                    height: 100%;
                    float: left;
                    z-index : 1;
                }

            </style>

            <div id="mapCanvas"></div>

            </body>
            </html>

        </div>
    </div>
</div>

</body>
</html>

