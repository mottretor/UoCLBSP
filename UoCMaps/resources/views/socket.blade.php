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

        var sampleData = '{"steps":[{"latitude": 6.903045, "longitude": 79.860281},{"latitude": 6.902116, "longitude": 79.861996},{"latitude": 6.899326, "longitude": 79.860805},{"latitude": 6.898815, "longitude": 79.860429},{"latitude": 6.899528, "longitude": 79.859785},{"latitude": 6.903181, "longitude": 79.858584},{"latitude": 6.902351, "longitude": 79.857511},{"latitude": 6.901509, "longitude": 79.856942},{"latitude": 6.901019, "longitude": 79.855193},{"latitude": 6.900242, "longitude": 79.855440}]}';

        var newPath = JSON.parse(sampleData);

        var newLine =[],lat,lng;
        for (var i = 0; i < newPath.steps.length; i++) {
          
          lat = newPath.steps[i]["latitude"];
          lng = newPath.steps[i]["longitude"];
          if(i==0){
            var markerA = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map,
            animation: google.maps.Animation.DROP,
            label:"A"
            });
          }
          else if(i==newPath.steps.length-1){
            var markerB = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map,
            animation: google.maps.Animation.DROP,
            label:"B"
            });
          }
          newLine.push({'lat':lat, 'lng':lng});
        }


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


        var finalPath = new google.maps.Polyline({
          path: newLine,
          geodesic: true,
          strokeColor: 'blue',
          strokeOpacity: 1.0,
          strokeWeight: 5
        });
        
        finalPath.setMap(map);

        
      }


      </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 -->
<!-- <script type="text/javascript" src="/js/httprequest.js"></script> -->

  </body>
</html>
