<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>check Location</title>
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
          zoom: 17,
        });

        //Get polygons

        

        var uoccoords = [
          {lat: 6.903045, lng: 79.860281},
          {lat: 6.902566, lng: 79.862322},
          {lat: 6.898885, lng: 79.860198},
          {lat: 6.902580, lng: 79.858657}
        ];

        var uoc = new google.maps.Polygon({paths: uoccoords});

        //map.data.add({geometry: new google.maps.Data.Polygon([uoccoords])});

        var source = new google.maps.LatLng (6.897899, 79.860451);
        var destination = new google.maps.LatLng (6.901209, 79.860429);
        

        var srcdst =  {'source':
                         {'latitude':'', 
                          'longitude':'', 
                          'inside':''}
                        , 
                      'destination': 
                         {'latitude':'', 
                          'longitude':'', 
                          'inside':''}
                        
                      };
        

        //console.log(google.maps.geometry.poly.containsLocation(srcdst.source[0]['latitude'], uoc));
        
        srcdst.source['latitude'] = source.lat();
        srcdst.source['longitude'] = source.lng();
        srcdst.destination['latitude'] = destination.lat();
        srcdst.destination['longitude'] = destination.lng();

        srcdst.source['inside'] = google.maps.geometry.poly.containsLocation(source, uoc) ? 1 : 0;
        srcdst.destination['inside'] = google.maps.geometry.poly.containsLocation(destination, uoc) ? 1 : 0;
        //srcdst.source[2]['inside'] = 1;
        
        //srcdst.source[2]['inside'] = 1;
        

        var json = JSON.stringify(srcdst);

        
        //SEND THE JSON THROUGH THE SOCKET***************************


        var url = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
        var method = "POST";
        var postData = json;

        // want shouldBeAsync = true.
        // Otherwise, it'll block ALL execution waiting for server response.
        var shouldBeAsync = true;

        var request = new XMLHttpRequest();

        // request.onreadystatechange = function(){
        //  if(request.readyState == XMLHttpRequest.DONE && request.status ==200){
        //    alert('request.responseXML');
        //  }
        // }
        request.onload = function () {
          var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
          var data = request.response;
          //alert(data); // Returned data, e.g., an HTML document.

          // var sampleData = '{"steps":[{"latitude": 6.903045, "longitude": 79.860281},{"latitude": 6.902116, "longitude": 79.861996},{"latitude": 6.899326, "longitude": 79.860805},{"latitude": 6.898815, "longitude": 79.860429},{"latitude": 6.899528, "longitude": 79.859785},{"latitude": 6.903181, "longitude": 79.858584},{"latitude": 6.902351, "longitude": 79.857511},{"latitude": 6.901509, "longitude": 79.856942},{"latitude": 6.901019, "longitude": 79.855193},{"latitude": 6.900242, "longitude": 79.855440}]}';

          var newPath = JSON.parse(data);

          var newLine =[],lat,lng;
          for (var i = 0; i < newPath.steps.length; i++) {
            
            lat = newPath.steps[i]["latitude"];
            lng = newPath.steps[i]["longitude"];
            if(i==0){
              var markerA = new google.maps.Marker({
              position: {lat: lat, lng: lng},
              map: map,
              label:"A"
              });
            }
            else if(i==newPath.steps.length-1){
              var markerB = new google.maps.Marker({
              position: {lat: lat, lng: lng},
              map: map,
              label:"B"
              });
            }
            newLine.push({'lat':lat, 'lng':lng});
          }

          var finalPath = new google.maps.Polyline({
            path: newLine,
            geodesic: true,
            strokeColor: 'blue',
            strokeOpacity: 1.0,
            strokeWeight: 5
          });
          
          finalPath.setMap(map);


        }

        request.open(method, url, shouldBeAsync);

        //request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        //request.setRequestHeader("Authorization");
        //request.setRequestHeader("Authorization", null);
        // Or... whatever

        // Actually sends the request to the server.
        request.send(postData);
        //window.alert(json);
        //documet.write('dsdsds');
            
      //window.alert(detailsJSon);
      }   

    //google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 -->
<!-- <script type="text/javascript" src="/js/httprequest.js"></script> -->

  </body>
</html>