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

    var marker, poly, map, pathline, latlngmarker0;
    var pathvertices = [];
    var pathline;
    // var drawable = true;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: 6.902215976621638, lng: 79.86069999999995}  // Center the map
        });

        poly = new google.maps.Polyline({
            strokeColor: '#000000',
            strokeOpacity: 1.0,
            strokeWeight: 3
        });
        poly.setMap(map);

        // Add a listener for the click event
        map.addListener('click', addLatLng);

    }
    // console.log("iuhiu");

    // Handles click events on a map, and adds a new point to the Polyline.
    function addLatLng(event) {
        var path = poly.getPath();

        // Because path is an MVCArray, we can simply append a new coordinate
        // and it will automatically appear.
        // pathvertices = path.getArray();
        path.push(event.latLng);

        pathvertices = [];
        poly.getPath().forEach(function(latLng) {
             // pathvertices = [];
            pathvertices.push(latLng);
            // pathvertices.push({'lat': latLng.lat(), 'lng': latLng.lng()});
            // pathvertices.push(path);
            // path = [];
        }); 

        // window.alert(path);
        window.alert(pathvertices);
        latlngmarker0 = pathvertices[0];
        

        // var pathsend = JSON.stringify(pathvertices);

        // document.write(pathsend);

        // vertices.push(event.latLng);*********

        // while(drawable){
            // Add a new marker at the new plotted point on the polyline.
            marker = new google.maps.Marker({
                position: event.latLng,
                // title: '#' + path.getLength(),
                map: map
            }); //end marker
        // }

        marker0 = new google.maps.Marker({
            position: pathvertices[0],
            // title: '#' + path.getLength(),
            map: map
        }); //end marker

        google.maps.event.addListener(marker0, 'click', function() { 
            pathvertices.push(latlngmarker0);
            // drawable = false;

            var uoc = new google.maps.Polygon({
              paths: pathvertices,
              strokeColor: '#aeb20c',
              strokeOpacity: 0.8,
              strokeWeight: 3,
              fillColor: '#eaf01b',
              fillOpacity: 0.35
            });
            uoc.setMap(map);

        }); 
    }
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap">
</script>
</body>
</html>