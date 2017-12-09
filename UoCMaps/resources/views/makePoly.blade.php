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

        var dataPoly = '{"polygons":[{"id":100,"vertexes":[{"latitude": 6.903045, "longitude": 79.860281},{"latitude": 6.902116, "longitude": 79.861996},{"latitude": 6.899326, "longitude": 79.860805},{"latitude": 6.898815, "longitude": 79.860429}],"edges":[{"edge1":1},{"edge2":2},{"edge3":3},{"edge4":4}]},{"id":200,"vertexes":[{"latitude": 6.899528, "longitude": 79.859785},{"latitude": 6.903181, "longitude": 79.858584},{"latitude": 6.902351, "longitude": 79.857511}],"edges":[{"edge1":1},{"edge2":2},{"edge3":3}]},{"id":647,"vertexes":[{"latitude": 6.901509, "longitude": 79.856942},{"latitude": 6.901019, "longitude": 79.855193},{"latitude": 6.900242, "longitude": 79.855440}],"edges":[{"edge1":1},{"edge2":2},{"edge3":3}]}]}';
        
        var polyJson = JSON.parse(dataPoly);
        //alert(dataPoly);
        
        var polygons = [],tempPoly = [],lat,lng,ids = [];

        for(var i=0;i<polyJson.polygons.length ; i++){
        	for(var j=0;j<polyJson.polygons[i].vertexes.length ; j++){
        		lat = polyJson.polygons[i].vertexes[j]["latitude"];
        		lng = polyJson.polygons[i].vertexes[j]["longitude"];
				tempPoly.push({'lat':lat,'lng':lng});
        	}
        	polygons[i] = new google.maps.Polygon({paths: tempPoly});
          ids[i] = polyJson.polygons[i]["id"];
        	map.data.add({geometry: new google.maps.Data.Polygon([tempPoly])});
        	tempPoly = [];
        	
        }
        
        //NEED TO BE TAKEN BY INPUT

        var source = new google.maps.LatLng (6.902202, 79.858562); //inside polygon 200
        //var destination = new google.maps.LatLng (6.900881, 79.855816); //inside polygon 647
        //var destination = new google.maps.LatLng (6.900689, 79.860633); //inside polygon 100
        var destination = new google.maps.LatLng (6.897675, 79.862457); //outside all 0

        var srcdst =  {'source':
                         {'latitude':'', 
                          'longitude':'', 
                          'inside':0}
                        , 
                      'destination': 
                         {'latitude':'', 
                          'longitude':'', 
                          'inside':0}
                        
                      };
        srcdst.source['latitude'] = source.lat();
        srcdst.source['longitude'] = source.lng();
        srcdst.destination['latitude'] = destination.lat();
        srcdst.destination['longitude'] = destination.lng();

        
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




















