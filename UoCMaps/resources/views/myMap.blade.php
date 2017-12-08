<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 600px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h2 align="center">කොළඹ විශ්ව විද්‍යාලයීය පරිගණක අධ්‍යයනායතනය</h2>
    <div id="map"></div>
    <script>
      function initMap() {

        var uluru = {lat: 6.902215976621638,  lng: 79.86069999999995};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 19,
          center: uluru
        }
        var ucsc = {lat: 6.902215976621638, lng: 79.86069999999995};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: ucsc,
          mapTypeId: 'satellite'

        });
        var marker = new google.maps.Marker({
          position: ucsc,
          map: map
        });
      }
      </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf_UNZ4XLYq1wPHkvOVF6zkrvVOzG3eE&callback=initMap"
    async defer></script>
    </body>
</html>