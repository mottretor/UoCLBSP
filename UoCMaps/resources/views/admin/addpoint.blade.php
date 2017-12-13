<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Complex Polylines</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map" style="height: 100%"></div>
<script>

    // This creates an interactive map which constructs a polygon based on user clicks***************************** 

    var marker, poly, map, pathline, latlngmarker0;
    var points = [];
    var pathline;
    var drawable = 1;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: 6.902215976621638, lng: 79.86069999999995}  // Center the map
        });

        // Add a listener for the click event
        map.addListener('click', addLatLng);

    }
    // console.log("iuhiu");

    // Handles click events on a map, and adds a new point to the Polyline.
    function addLatLng(event) {
        
        points.push(event.latLng);
        // window.alert(path);
        window.alert(points);
      
            // Add a new marker at the new plotted point on the polyline.
            marker = new google.maps.Marker({
                position: event.latLng,
                // title: '#' + path.getLength(),
                map: map
            }); //end marker

        
        // This allows the user to define exit points of the polygon************************************************


    }
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap">
</script>
</body>
</html>