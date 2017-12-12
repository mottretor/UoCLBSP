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
            {!! Form::open(['url' => 'people','method' => 'post']) !!}
            <form action="../Database/AddPeopleDb.php" method="post">
            
                <table>
                    <tr>
                        <td>
                            ID :
                        </td>
                        <td>
                            {!!Form::text('nic',null,['class'=>'form-control']);!!}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            NAME :
                        </td>
                        <td>
                            <!-- <input type="text" name="Description" value=""> -->
                            {!!Form::text('name',null,['class'=>'form-control']);!!}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            DESIGNATION :
                        </td>
                        <td>
                            <!-- <input type="text" name="Description" value=""> -->
                            {!!Form::text('designation',null,['class'=>'form-control']);!!}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            DESCRIPTION :
                        </td>
                        <td>
                            <!-- <input type="text" name="Description" value=""> -->
                            {!!Form::text('description',null,['class'=>'form-control']);!!}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Latitude :
                        </td>
                        <td>
                            <input type="text" name="Latitudes" id="infoLat" value="">
                            
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Longitude :
                        </td>
                        <td>
                            <input type="text" name="Longitudes" id="infoLng" value="">
                            
                        </td>
                    </tr>

                </table>

                <input type="submit" name="AddPeople" value="Add People">
                <!-- <button onclick="reset()">Reset</button> -->
                <button type="button" class="btn btn-default"> <a href="peopleShow">Back</a></button>

            
            </form>
            {!! Form::close() !!}
            

            <p>Drag the marker to where you should add the people!</p>

            <div id="infoPanel">
                <div id="markerStatus"><i>Drag the marker.</i></div>

            </div>

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
                    // function reset(){
                    //     document.getElementByName('nic').value = null;
                    // }

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