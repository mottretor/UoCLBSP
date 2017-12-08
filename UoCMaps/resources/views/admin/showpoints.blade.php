<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 700px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var marker;
      var coordinates = [];
      var MarkerData = [6.902215976621638, 79.86069999999995];
      
      var points = [
          {lat: 6.90109, lng: 79.85994},
          {lat: 6.90135, lng: 79.86084},
          {lat: 6.90054, lng: 79.86049},
          {lat: 6.89994, lng: 79.86032}
        ];

      function initialize() {
        // var cent = {lat: 6.902215976621638,  lng: 79.86069999999995};
        // var map = new google.maps.Map(document.getElementById('map'), {
        //   zoom: 17,
        //   center: cent
        // });
        var map = new google.maps.Map(document.getElementById('map-canvas'));
        // var infowindow = new google.maps.InfoWindow();
        var center = new google.maps.LatLng(MarkerData[0], MarkerData[1]);
        var marker = new google.maps.Marker({
            position: center,
            map: map,
            title: MarkerData[2]
        });var path = [];

        var bounds = new google.maps.LatLngBounds();
        bounds.extend(center);
        // for (var i in PathData){
        //     var p = PathData[i];
        //     var latlng = new google.maps.LatLng(p[0], p[1]);
        //     path.push(latlng);
        //     bounds.extend(latlng);
        // }

        for (var i = 0; i < points.length; i++) {
          var latitude = points[i]['lat'];
          var longitude = points[i]['lng'];
          coordinates.push({'lat':latitude, 'lng':longitude});
          var cod = JSON.stringify(coordinates);
          // alert(cod);

        var poly = new google.maps.Polygon({
            paths: path,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 3,
            fillColor: '#FF0000',
            fillOpacity: 0.1
        });
        poly.setMap(map);
     
        map.fitBounds(bounds);

        // var path = [];
        // var bounds = new google.maps.LatLngBounds();
        // bounds.extend(center);

        // for (var i in PathData){
        //     var p = PathData[i];
        //     var latlng = new google.maps.LatLng(p[0], p[1]);
        //     path.push(latlng);
        //     bounds.extend(latlng);
        // }
        
        // var poly = new google.maps.Polygon({
        //     paths: path,
        //     strokeColor: '#FF0000',
        //     strokeOpacity: 0.8,
        //     strokeWeight: 3,
        //     fillColor: '#FF0000',
        //     fillOpacity: 0.1
        // });
        // poly.setMap(map);
         
        // map.fitBounds(bounds);

        // for (var i = 0; i < vertices.length; i++) {
        //   var latitude = vertices[i]['lat'];
        //   var longitude = vertices[i]['lng'];
        //   coordinates.push({'lat':latitude, 'lng':longitude});
        //   var cod = JSON.stringify(coordinates);
        //   // alert(cod);
            
          marker = new google.maps.Marker({
            position: coordinates[0],
            map: map
          });

          google.maps.event.addListener(marker, 'click', function() { 
             // alert("I am marker " + marker.title); 
             window.alert("Hi!");
              // var drawing = true;
          }); 
          // return marker;
          
          coordinates = [];

        }

        
      }
      </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf_UNZ4XLYq1wPHkvOVF6zkrvVOzG3eE&callback=initialize"
    async defer></script>
    </body>
</html>