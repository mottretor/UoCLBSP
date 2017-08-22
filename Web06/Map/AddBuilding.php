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
            <form action="" method="post" id="form-ab">
                <table>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <input type="text" name="BuildingName" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Description :
                        </td>
                        <td>
                            <textarea rows="10" cols="30" name="Description"></textarea>
                        </td>
                    </tr>

                    <p>Drag the marker to where you should add the building!</p>

                    <tr>
                        <td>
                            Latitude :
                        </td>
                        <td>
                            <input type="text" name="latitude">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Longitude :
                        </td>
                        <td>
                            <input type="text" name="longitude" id="infol" value="">
                        </td>
                    </tr>

                </table>

                <input type="submit" name="addBuilding" value="Add Building">
                <input type="reset" name="cancel" value="Cancel">

            </form>

            <div id="infoPanel">
                <div id="markerStatus"><i>Drag the marker to the position.</i></div>
                <b>Current position:</b>
                <div id="info"></div>

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
                    document.getElementById('info').innerHTML=20;
                    var geocoder = new google.maps.Geocoder();

                    function geocodePosition(pos) {
                        geocoder.geocode({
                            latLng: pos
                        });
                    }

                    function updateMarkerStatus(str) {
                        document.getElementById('markerStatus').innerHTML = str;
                    }

                    //                            $lattitude = latLng.lat();
                    //                            $longitude = latLng.lng();
                    function updateMarkerPosition(latLng) {
                        document.getElementById('info').innerHTML = [
                            latLng.lat(),
                            latLng.lng()
                        ].join(', ');
                    }

                    function initialize() {
                        var latLng = new google.maps.LatLng(6.9022, 79.8607);
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
                #infoPanel div {
                    float: top|right;
                    background-color: white;
                    width: 20%;
                    height: 10%;
                    z-index:2;
                }

                /*#popup {*/
                /*position:absolute;*/
                /*display:hidden;*/
                /*top:50%;*/
                /*left:50%;*/
                /*width:400px;*/
                /*height:586px;*/
                /*margin-top:-263px;*/
                /*margin-left:-200px;*/
                /*background-color:#fff;*/
                /*z-index:2;*/
                /*padding:5px;*/
                /*}*/
                /*#overlay-back {*/
                /*position : fixed;*/
                /*top : 0;*/
                /*left : 0;*/
                /*width : 100%;*/
                /*height : 100%;*/
                /*background : #000;*/
                /*opacity : 0.7;*/
                /*filter : alpha(opacity=60);*/
                /*z-index : 1;*/
                /*display: none;*/
                /*}*/
            </style>

            <div id="mapCanvas"></div>
            <!--                    <div id="infoPanel">-->
            <!--                        <div id="markerStatus"><i>Drag the marker to the position.</i></div>-->
            <!--                        <b>Current position:</b>-->
            <!--                        <div id="info"></div>-->
            <!---->
            <!--                    </div>-->
            </body>
            </html>

        </div>
    </div>
</div>

</body>
</html>