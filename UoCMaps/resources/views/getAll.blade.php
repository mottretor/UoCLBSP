<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Get Shortest Path</title>
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
    <div id="map"></div>
    <script>
      // This example requires the Geometry library. Include the libraries=geometry
      // parameter when you first load the API. For example:
       

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 6.901120, lng: 79.860532},
        zoom: 15,
      });
		  var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
	  	var method = "POST";
	  	var polyData = JSON.stringify({"type":"polyRequest"});
		  var shouldBeAsync = true;
	  	var requestPoly = new XMLHttpRequest();	
      requestPoly.timeout = 10000;
      requestPoly.ontimeout = function(e){
        alert('request timeout');
      }    
	  	requestPoly.onload = function () {
	    	var status = requestPoly.status;
        if(requestPoly.readyState === XMLHttpRequest.DONE && requestPoly.status === 200){
          // HTTP response status, e.g., 200 for "200 OK"
          var dataPoly = requestPoly.response;
          var status = requestPoly.status;
          //alert(dataPoly);
          var polyJson = JSON.parse(dataPoly);
          //alert(dataPoly);
          
          var polygons = [],lat,lng,ids = [];

          for(var i=0;i<polyJson.polygons.length ; i++){
            // for(var j=0;j<polyJson.polygons[i].vertexes.length ; j++){
            //   lat = polyJson.polygons[i].vertexes[j]["latitude"];
            //   lng = polyJson.polygons[i].vertexes[j]["longitude"];
            //   tempPoly.push({'lat':lat,'lng':lng});
            // }
            if(polyJson.polygons[i].vertexes.length>0){
              polygons[i] = new google.maps.Polygon({paths: polyJson.polygons[i].vertexes});
              ids[i] = polyJson.polygons[i]["id"];
              map.data.add({geometry: new google.maps.Data.Polygon([polyJson.polygons[i].vertexes])});
              //tempPoly = [];
            }
            
            
            
          }
          alert(JSON.stringify(polygons));
          
          //NEED TO BE TAKEN BY INPUT
          var source = new google.maps.LatLng (9.827079, 80.249237); //point pedro
          //var source = new google.maps.LatLng (6.869262, 79.889792);//nugegoda
          //var source = new google.maps.LatLng (9.803694, 80.202572); //nelliyadi
          //var source = new google.maps.LatLng (6.902202, 79.858562); //inside polygon 200
          //var destination = new google.maps.LatLng (6.900881, 79.855816); //inside polygon 647
          //var destination = new google.maps.LatLng (6.900689, 79.860633); //inside polygon 100
          //var destination = new google.maps.LatLng (6.897675, 79.862457); //outside all 0
          var destination = new google.maps.LatLng (5.921169, 80.594002); //dewundara point

          var srcdst =  { 'type':'getPath',
                          'source':
                             {'latitudes':'', 
                              'longitudes':'', 
                              'inside':0
                              }, 
                          'destination': 
                             {'latitudes':'', 
                              'longitudes':'', 
                              'inside':0
                              }
                        };

          srcdst.source['latitudes'] = source.lat();
          srcdst.source['longitudes'] = source.lng();
          srcdst.destination['latitudes'] = destination.lat();
          srcdst.destination['longitudes'] = destination.lng();

              
          for(var z=0;z<polygons.length ; z++){
            if(polygons[z] != null){
              if(google.maps.geometry.poly.containsLocation(source, polygons[z])){
                srcdst.source['inside'] = ids[z];
              }
              if(google.maps.geometry.poly.containsLocation(destination, polygons[z])){
                srcdst.destination['inside'] = ids[z];
              }
            }
            
          }
          var jsonInside = JSON.stringify(srcdst);
          //alert(json);


          var url = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
          var method = "POST";
          var postData = jsonInside;

          // want shouldBeAsync = true.
          // Otherwise, it'll block ALL execution waiting for server response.
          var shouldBeAsync = true;

          var requestPath = new XMLHttpRequest();

          // request.onreadystatechange = function(){
          //  if(request.readyState == XMLHttpRequest.DONE && request.status ==200){
          //    alert('request.responseXML');
          //  }
          // }
          requestPath.timeout = 20000;
          requestPath.ontimeout = function(e){
            alert('request timeout');
          }
          requestPath.onload = function () {
            var status = requestPath.status; // HTTP response status, e.g., 200 for "200 OK"
            var newPathJson = requestPath.response;
            if(requestPath.readyState === XMLHttpRequest.DONE && requestPath.status === 200){
              //alert(newPathJson); // Returned data, e.g., an HTML document.

              // var sampleData = '{"steps":[{"latitude": 6.903045, "longitude": 79.860281},{"latitude": 6.902116, "longitude": 79.861996},{"latitude": 6.899326, "longitude": 79.860805},{"latitude": 6.898815, "longitude": 79.860429},{"latitude": 6.899528, "longitude": 79.859785},{"latitude": 6.903181, "longitude": 79.858584},{"latitude": 6.902351, "longitude": 79.857511},{"latitude": 6.901509, "longitude": 79.856942},{"latitude": 6.901019, "longitude": 79.855193},{"latitude": 6.900242, "longitude": 79.855440}]}';

              var newPath = JSON.parse(newPathJson);

              // var newLine =[],lat,lng;
              // for (var i = 0; i < newPath.steps.length; i++) {
                
              //   lat = newPath.steps[i]["latitudes"];
              //   lng = newPath.steps[i]["longitudes"];
              //   if(i==0){
              //     var markerA = new google.maps.Marker({
              //     position: {lat: lat, lng: lng},
              //     map: map,
              //     animation: google.maps.Animation.DROP,
              //     label:"A"
              //     });
              //   }
              //   else if(i==newPath.steps.length-1){
              //     var markerB = new google.maps.Marker({
              //     position: {lat: lat, lng: lng},
              //     map: map,
              //     animation: google.maps.Animation.DROP,
              //     label:"B"
              //     });
              //   }
              //   newLine.push({'lat':lat, 'lng':lng});
              // }



              

              


              var finalPath = new google.maps.Polyline({
                path: newPath.steps,
                geodesic: true,
                strokeColor: 'blue',
                strokeOpacity: 1.0,
                strokeWeight: 5
              });
              
              finalPath.setMap(map);

              var markerA = new google.maps.Marker({
                  position: {lat: newPath.steps[0]['lat'], lng: newPath.steps[0]['lng']},
                  map: map,
                  animation: google.maps.Animation.DROP,
                  label:"A"
              });
              var markerB = new google.maps.Marker({
                  position: {lat: newPath.steps[newPath.steps.length-1]['lat'], lng: newPath.steps[newPath.steps.length-1]['lng']},
                  map: map,
                  animation: google.maps.Animation.DROP,
                  label:"B"
              });
              //INFO windows for start and end
              markerA.addListener('click', function() {
                infowindowA.open(map, markerA);
              });
              var infowindowA = new google.maps.InfoWindow({
                content: "Origin Location"
              });
              markerB.addListener('click', function() {
                infowindowB.open(map, markerB);
              });
              var infowindowB = new google.maps.InfoWindow({
                content: "Destination Location"
              });
              map.addListener('click', function() {
                infowindowA.close();
                infowindowB.close();
              });


              var markerBounds = new google.maps.LatLngBounds();
              
              markerBounds.extend(markerA.position);
              markerBounds.extend(markerB.position);
              // map.setCenter(markerBounds.getCenter(), 
              // map.getBoundsZoomLevel(markerBounds));
              map.fitBounds(markerBounds);
   
            }

          }
        }


        requestPath.open(method, url, shouldBeAsync);

        //request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        //request.setRequestHeader("Authorization");
        //request.setRequestHeader("Authorization", null);
        // Or... whatever

        // Actually sends the request to the server.
        requestPath.send(postData);

    	}
    	requestPoly.open(method, urlPoly, shouldBeAsync);
    	requestPoly.send(polyData);
	  }   

    //google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>


  </body>
</html>