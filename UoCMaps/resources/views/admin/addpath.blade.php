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

    // This example creates an interactive map which constructs a polyline based on
    // user clicks. Note that the polyline only appears once its path property
    // contains two LatLng coordinates.

    var poly;
    var map;
    var pathvertices = [];
    var pathline;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: {lat: 6.902215976621638, lng: 79.86069999999995}  // Center the map
        });

        poly = new google.maps.Polyline({
            strokeColor: '#000000',
            strokeOpacity: 1.0,
            strokeWeight: 3
        });
        poly.setMap(map);

        // Add a listener for the click event for the map**********
        map.addListener('click', addLatLng);

    }
    // console.log("iuhiu");

    // Handles click events on a map, and adds a new point to the Polyline.**********
    function addLatLng(event) {
        var path = poly.getPath();

        // Because path is an MVCArray, we can simply append a new coordinate
        // and it will automatically appear.**********
        // pathvertices = path.getArray();
        path.push(event.latLng);

        poly.getPath().forEach(function(latLng) {
            // pathvertices.push(latLng);
            pathvertices.push({'latitude': latLng.lat(), 'longitude': latLng.lng()});
          }); 
        var pathsend = JSON.stringify(pathvertices);
        // document.write(pathsend);

        // vertices.push(event.latLng);*********

        // Add a new marker at the new plotted point on the polyline.**********
        var marker = new google.maps.Marker({
            position: event.latLng,
            title: '#' + path.getLength(),
            map: map
        }); //end marker

        // // Add event listeners to every marker********** 
        // google.maps.event.addListener(marker, 'click', function() { 
        //    // alert("I am marker " + marker.title); 
        //    window.alert("Hi!");
        //     // var drawing = true;
        // }); 
        // // return marker; 

        
       
    }
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap">
</script>
</body>
</html>