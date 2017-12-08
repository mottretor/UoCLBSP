<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Polygon Arrays</title>
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

      var map;
      // var infoWindow;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: 6.902215976621638,  lng: 79.86069999999995},
          mapTypeId: 'roadmap'
        });

        // Define the LatLng coordinates for the polygon.
        var uoccords = [
          {lat: 6.903045, lng: 79.860281},
          {lat: 6.902566, lng: 79.862322},
          {lat: 6.898885, lng: 79.860198},
          {lat: 6.902580, lng: 79.858657}
        ];

        // Construct the polygon.
        var uoc = new google.maps.Polygon({
          paths: uoccords,
          strokeColor: '#aeb20c',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#eaf01b',
          fillOpacity: 0.35
        });
        uoc.setMap(map);

        // Add a listener for the click event.
        // bermudaTriangle.addListener('click', showArrays);

        // infoWindow = new google.maps.InfoWindow;

        // uoc.addListener('click', function (event) {
        //   //alert the index of the polygon
        //   alert('Um inside the polygon! :)');

        //   // Add a new marker to mark the path**********
        //   var marker = new google.maps.Marker({
        //       position: event.latLng,
        //       title: '#' + path.getLength(),
        //       map: map
        //   }); //end marker

        // });
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&callback=initMap">
    </script>
  </body>
</html>