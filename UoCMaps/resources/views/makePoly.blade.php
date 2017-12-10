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

        //received polygon data json***************

        var dataPoly = '{"polygons":[{"id":100,"vertexes":[{"lat": 6.903045, "lng": 79.860281},{"lat": 6.902116, "lng": 79.861996},{"lat": 6.899326, "lng": 79.860805},{"lat": 6.898815, "lng": 79.860429}],"edges":[{"edge1":1},{"edge2":2},{"edge3":3},{"edge4":4}]},{"id":200,"vertexes":[{"lat": 6.899528, "lng": 79.859785},{"lat": 6.903181, "lng": 79.858584},{"lat": 6.902351, "lng": 79.857511}],"edges":[{"edge1":1},{"edge2":2},{"edge3":3}]},{"id":647,"vertexes":[{"lat": 6.901509, "lng": 79.856942},{"lat": 6.901019, "lng": 79.855193},{"lat": 6.900242, "lng": 79.855440}],"edges":[{"edge1":1},{"edge2":2},{"edge3":3}]}]}';
        
        var polyJson = JSON.parse(dataPoly);
        //alert(dataPoly);
        
        var polygons = [],tempPoly = [],lat,lng,ids = [];

        for(var i=0;i<polyJson.polygons.length ; i++){
        	for(var j=0;j<polyJson.polygons[i].vertexes.length ; j++){
        		lat = polyJson.polygons[i].vertexes[j]["lat"];
        		lng = polyJson.polygons[i].vertexes[j]["lng"];
				    tempPoly.push({'lat':lat,'lng':lng});
        	}
        	polygons[i] = new google.maps.Polygon({paths: tempPoly});
          ids[i] = polyJson.polygons[i]["id"];
        	map.data.add({geometry: new google.maps.Data.Polygon([tempPoly])});
        	tempPoly = [];
        	
        }
        
        //NEED TO BE TAKEN BY INPUT

        var source = new google.maps.LatLng (7.902202, 79.858562); //inside polygon 200
        //var destination = new google.maps.LatLng (6.900881, 79.855816); //inside polygon 647
        //var destination = new google.maps.LatLng (6.900689, 79.860633); //inside polygon 100
        var destination = new google.maps.LatLng (6.897675, 79.862457); //outside all 0

        var srcdst =  {'source':
                         {'latitudes':'', 
                          'longitudes':'', 
                          'inside':0}
                        , 
                      'destination': 
                         {'latitudes':'', 
                          'longitudes':'', 
                          'inside':0}
                        
                      };
        srcdst.source['lat'] = source.lat();
        srcdst.source['lng'] = source.lng();
        srcdst.destination['lat'] = destination.lat();
        srcdst.destination['lng'] = destination.lng();

        
        for(var z=0;z<polygons.length ; z++){
        	if(google.maps.geometry.poly.containsLocation(source, polygons[z])){
        		srcdst.source['inside'] = ids[z];
        	}
        	if(google.maps.geometry.poly.containsLocation(destination, polygons[z])){
        		srcdst.destination['inside'] = ids[z];
        	}
        }
        var json = JSON.stringify(srcdst);
        alert(json);

    }

    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>

</body>
</html>




















