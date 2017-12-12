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
          zoom: 15,
        });
		var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
	  	var method = "POST";
	  	var polyData = JSON.stringify({"type":"polyRequest"});
		var shouldBeAsync = true;
	  	var requestPoly = new XMLHttpRequest();	    
	  	requestPoly.onload = function () {
	    	var status = requestPoly.status; // HTTP response status, e.g., 200 for "200 OK"
	    	var dataPoly = requestPoly.response;
	    	alert(dataPoly);
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
	  	requestPoly.open(method, urlPoly, shouldBeAsync);
	  	requestPoly.send(polyData);
	  }   
    //google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>


  </body>
</html>