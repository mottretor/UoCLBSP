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
        // var map = new google.maps.Map(document.getElementById('map'), {
        //   center: {lat: 6.901120, lng: 79.860532},
        //   zoom: 17,
        // });

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
        var shouldBeAsync = true;

        var request = new XMLHttpRequest();

        
        request.onload = function () {
          //document.write();
          //var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
          
          alert(request.responseText);
            
          //console.error(request.statusText);
          
          //var data = request.responseText;
          //window.alert(data);
          //document.write(status);

     
          //window.alert('done'); 
        }


        request.open(method, url, shouldBeAsync);

        //request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        //request.setRequestHeader("Authorization");
        //request.setRequestHeader("Authorization", "  ");
        // Or... whatever

        // Actually sends the request to the server.
        request.send(postData);
        //window.alert(json);
        //documet.write('dsdsds');
            


        /*function initialize() {
          var mapOptions = {
            zoom: 5,
            center: new google.maps.LatLng(24.886, -70.269),
            mapTypeId: 'terrain'
          };

          var map = new google.maps.Map(document.getElementById('map'),
              mapOptions);

          var bermudaTriangle = new google.maps.Polygon({
            paths: [
              new google.maps.LatLng(25.774, -80.190),
              new google.maps.LatLng(18.466, -66.118),
              new google.maps.LatLng(32.321, -64.757)
            ]
          });

          google.maps.event.addListener(map, 'click', function(event) {
            console.log(google.maps.geometry.poly.containsLocation(event.latLng, bermudaTriangle));
          });
        }

        //google.maps.event.addDomListener(window, 'load', initialize);
        google.maps.event.addListener(map, 'click', function(e) {
          
          var resultColor =
              google.maps.geometry.poly.containsLocation(e.latLng, uoc) ?
              'blue' :
              'red';

          var resultPath =
              google.maps.geometry.poly.containsLocation(e.latLng, uoc) ?
              // A triangle.
              "m 0 -1 l 1 2 -2 0 z" :
              google.maps.SymbolPath.CIRCLE;

          new google.maps.Marker({
            position: e.latLng,
            map: map,
            icon: {
              path: resultPath,
              fillColor: resultColor,
              fillOpacity: .2,
              strokeColor: 'white',
              strokeWeight: .5,
              scale: 10
            }
          });
          console.log(google.maps.geometry.poly.containsLocation(e.latLng, bermudaTriangle));
        });*/
      //window.alert(detailsJSon);
      }
      

  

        

    //google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 -->
<!-- <script type="text/javascript" src="/js/httprequest.js"></script> -->

  </body>
</html>