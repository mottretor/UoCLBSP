
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Polygon Arrays</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map-canvas {
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
    <div id="map-canvas"></div>
    <script>
      var MarkerData = [6.902215976621638, 79.86069999999995];
var PathData = [
          [ 6.903045,  79.860281],
          [ 6.902566,  79.862322],
          [ 6.898885,  79.860198],
          [ 6.902580,  79.858657]
        ];
function initialize() {
    var map = new google.maps.Map(document.getElementById('map-canvas'));
    // var infowindow = new google.maps.InfoWindow();

    var markerlatlng = new google.maps.LatLng(latLng.lat(), latLng.lng());
    var marker = new google.maps.Marker({
        position: markerlatlng,
        map: map,
        // title: MarkerData[2]
    });
 
    // google.maps.event.addListener(marker, 'click', function() {
    //     // infowindow.setContent(this.title);
    //     // infowindow.open(map, this);
    // });
 
    var path = [];
    var bounds = new google.maps.LatLngBounds();
    bounds.extend(center);
    for (var i in PathData){
        var p = PathData[i];
        var latlng = new google.maps.LatLng(p[0], p[1]);
        path.push(latlng);
        bounds.extend(latlng);
    }
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

    // ************************************************************

    

    // var poly = new google.maps.Polygon({path:fairview});   //initialize polygon
    //     if (google.maps.geometry.poly.containsLocation(myLatlng, poly)) {
    //       window.alert('in');
    //         // console.log("Location Found in Polygon!!!!! " + myLatlng.lat() + " " + myLatlng.lng());
    //     } else {
    //       window.alert('out');
    //         // console.log(":( " + myLatlng.lat() + " " + myLatlng.lng());
    //     }

    // google.maps.event.addListener(map, 'click', function(event) {


          
    //       var resultColor =
    //           google.maps.geometry.poly.containsLocation(e.latLng, uoc) ?
    //           'blue' :
    //           'red';

    //       var resultPath =
    //           google.maps.geometry.poly.containsLocation(e.latLng, uoc) ?
    //           // A triangle.
    //           "m 0 -1 l 1 2 -2 0 z" :
    //           google.maps.SymbolPath.CIRCLE;

    //       new google.maps.Marker({
    //         position: e.latLng,
    //         map: map,
    //         icon: {
    //           path: resultPath,
    //           fillColor: resultColor,
    //           fillOpacity: .2,
    //           strokeColor: 'white',
    //           strokeWeight: .5,
    //           scale: 10
    //         }
    //       });
    //       uoccoords.setMap(map);
}
 
//google.maps.event.addDomListener(window, 'load', initialize);

      // *********************************************************************************************************

      // var map;
      // // var infoWindow;

      // function initMap() {
      //   map = new google.maps.Map(document.getElementById('map'), {
      //     zoom: 17,
      //     center: {lat: 6.902215976621638,  lng: 79.86069999999995},
      //     mapTypeId: 'roadmap'
      //   });

      //   // Define the LatLng coordinates for the polygon.
      //   var uoccords = [
      //     {lat: 6.903045, lng: 79.860281},
      //     {lat: 6.902566, lng: 79.862322},
      //     {lat: 6.898885, lng: 79.860198},
      //     {lat: 6.902580, lng: 79.858657}
      //   ];

      //   // Construct the polygon.
      //   var uoc = new google.maps.Polygon({
      //     paths: uoccords,
      //     strokeColor: '#aeb20c',
      //     strokeOpacity: 0.8,
      //     strokeWeight: 3,
      //     fillColor: '#eaf01b',
      //     fillOpacity: 0.35
      //   });
      //   uoc.setMap(map);

        // Add a listener for the click event.
        // bermudaTriangle.addListener('click', showArrays);

        // infoWindow = new google.maps.InfoWindow;

      //   uoc.addListener('click', function (event) { //checked
      //     //alert the index of the polygon
      //     // alert('Um inside the polygon! :)');

      //     if (google.maps.geometry.poly.containsLocation()) {
      //       // Nothing to do Centroid is in polygon use it as is
      //       alert('um in');
      //     } else {
      //       alert('um out');
      //     }

      //     // Add a new marker to mark the path**********
      //     // var marker = new google.maps.Marker({
      //     //     position: event.latLng,
      //     //     title: '#' + path.getLength(),
      //     //     map: map
      //     // }); //end marker

      //   });
      // }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&callback=initialize">
    </script>
  </body>
</html>

