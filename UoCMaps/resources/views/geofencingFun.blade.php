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
            height: 95%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map" style="height: 100%"></div>
<script>

    // This creates an interactive map which constructs a polygon based on user clicks***************************** 

    var marker, poly, map, pathline, latlngmarker0, pathline, polypath, uoc;
    var jsonpath = {'type':'geofence'};
    var jsonObject = {};
    var jsonArray = [];
    var pathvertices = [];
    var pathobj = {'latitudes': '', 'longitudes': ''};
    // int drawable = 1;
    // @php $drawable = 1
    var draw = 1;
    var outerVertexes = [];
    var json;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
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
        //map.addListener('dblclick',sendData(json));
        //alert(json);
        map.addListener('dblclick',function(){
            alert(json);
            var url = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
            var method = "POST";
            var postData = json;

            // want shouldBeAsync = true.
            // Otherwise, it'll block ALL execution waiting for server response.
            var shouldBeAsync = true;
 
            var request = new XMLHttpRequest();

            // request.onreadystatechange = function(){
            //  if(request.readyState == XMLHttpRequest.DONE && request.status ==200){
            //      alert('request.responseXML');
            //  }
            // }
            request.onload = function () {
                var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
                var data = request.response;
                alert(data); // Returned data, e.g., an HTML document.
            }

            request.open(method, url, shouldBeAsync);

            //request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            //request.setRequestHeader("Authorization");
            //request.setRequestHeader("Authorization", null);
            // Or... whatever

            // Actually sends the request to the server.
            request.send(postData);

                    
        });


    }
    // console.log("iuhiu");

// This allows the user to define exit points of the polygon******************************************************
        // Handles click events on a map, and adds a new point to the Polyline.
        function addLatLng(event) {

            var path = poly.getPath();
            
            // Because path is an MVCArray, we can simply append a new coordinate
            // and it will automatically appear.
            // pathvertices = path.getArray();
            path.push(event.latLng);

            pathvertices = [];
            jsonArray = [];
            poly.getPath().forEach(function(latLng) {
                jsonObject = {};
                 // pathvertices = [];
                jsonObject['latitudes'] = latLng.lat();
                jsonObject['longitudes'] = latLng.lng();
                jsonArray.push(jsonObject);
                // pathvertices.push(latLng);
                pathvertices.push({'lat': latLng.lat(), 'lng': latLng.lng()});
                // pathvertices.push(path);
                // path = [];
            }); 

            // window.alert(path);
            // window.alert(pathvertices);
            latlngmarker0 = pathvertices[0];
            
            // Add a new marker at the new plotted point on the polyline.
            marker = new google.maps.Marker({
                position: event.latLng,
                // title: '#' + path.getLength(),
                map: map
            }); //end marker

            marker0 = new google.maps.Marker({
                position: pathvertices[0],
                // title: '#' + path.getLength(),
                map: map
            }); //end marker

            // window.alert(pathvertices);

            google.maps.event.addListener(marker0, 'click', function() {
                // polypath = pathvertices;
                jsonpath['polygon'] = jsonArray;
                // window.alert(JSON.stringify(jsonpath));
                //var polypath = JSON.stringify(jsonpath); //****************************************
                pathvertices.push(latlngmarker0);
                //alert(polypath);
                

                uoc = new google.maps.Polygon({
                  paths: pathvertices,
                  strokeColor: '#aeb20c',
                  strokeOpacity: 0.8,
                  strokeWeight: 3,
                  fillColor: '#eaf01b',
                  fillOpacity: 0.35,
                  // indexId: 2
                });
                uoc.addListener('click', addouts); 
    
                uoc.setMap(map);
                poly = [];
                draw = 0;
                
                

                // window.alert(pathvertices);

            }); 
        }

            function addouts(e) {
                var outerlatlng = e.latLng; 
                marker1 = new google.maps.Marker({
                    position: outerlatlng,
                    map: map
                }); 
                outerVertexes.push({'latitudes':marker1.position.lat(),'longitudes':marker1.position.lng()}); 
                jsonpath['outvertexes'] = outerVertexes;
                json = JSON.stringify(jsonpath);

            }
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap">
</script>
</body>
</html>