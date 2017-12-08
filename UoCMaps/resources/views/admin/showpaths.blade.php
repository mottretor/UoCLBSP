<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polylines</title>
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
    	var pathsjson = '{"vertexes":[{"latitude":6.9022,"id":9,"longitude":79.8606},{"latitude":6.9024,"id":10,"longitude":79.8605},{"latitude":6.9016,"id":11,"longitude":79.86},{"latitude":6.9021,"id":12,"longitude":79.8596}],"edges":[{"destination":10,"id":9,"source":9},{"destination":11,"id":10,"source":9},{"destination":12,"id":11,"source":10},{"destination":12,"id":12,"source":11}]}';

		var pathsarr = JSON.parse(pathsjson);
		/*var path = [];
		var lat, lng;

		for (var i = 0; i < pathsarr.vertexes.length; i++) {
			 lat = pathsarr.vertexes[i]["latitude"];
			 lng = pathsarr.vertexes[i]["longitude"];
			 path.push({'lat':lat, 'lng':lng});
		}*/

		// var src,dst,templine=[],lat,lng;
		// for (var i = 0; i < pathsarr.edges.length; i++) {
		// 	dst = pathsarr.edges[i]["destination"];
		// 	src = pathsarr.edges[i]["source"];
		// 	for (var j = 0; j < pathsarr.vertexes.length; j++) {
		// 		if(pathsarr.vertexes[j]["id"]==dst || pathsarr.vertexes[j]["id"]==src){
		// 			lat = pathsarr.vertexes[j]["latitude"];
		// 	 		lng = pathsarr.vertexes[j]["longitude"];
		// 	 		templine.push({'lat':lat, 'lng':lng});
		// 		}
		// 	}

		// }

		//document.getelementById("demo").innerHTML = path;

	// document.getelementById("paths").innerHTML = pathsarr.vertexes;	

      // This example creates a 2-pixel-wide red polyline showing the path of
      // the first trans-Pacific flight between Oakland, CA, and Brisbane,
      // Australia which was made by Charles Kingsford Smith.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: 6.902215976621638, lng: 79.86069999999995},
          mapTypeId: 'terrain'
        });

        var src,dst,templine=[],lat,lng;
		for (var i = 0; i < pathsarr.edges.length; i++) {
			dst = pathsarr.edges[i]["destination"];
			src = pathsarr.edges[i]["source"];
			for (var j = 0; j < pathsarr.vertexes.length; j++) {
				if(pathsarr.vertexes[j]["id"]==dst || pathsarr.vertexes[j]["id"]==src){
					lat = pathsarr.vertexes[j]["latitude"];
			 		lng = pathsarr.vertexes[j]["longitude"];
			 		templine.push({'lat':lat, 'lng':lng});
				}
			}
			var temppath = new google.maps.Polyline({
	          path: templine,
	          geodesic: true,
	          strokeColor: 'blue',
	          strokeOpacity: 1.0,
	          strokeWeight: 6
	        });
	        templine=[];
	        temppath.setMap(map);

		}
        

  //       var path1 = [
  //   {lat: 6.9021, lng: 79.8596},
  //   {lat: 6.9022, lng: 79.8606}
  // ];

  //       var flightPath1 = new google.maps.Polyline({
  //         path: path1,
  //         geodesic: true,
  //         strokeColor: '#FF0000',
  //         strokeOpacity: 1.0,
  //         strokeWeight: 2
  //       });

        
        // flightPath1.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&callback=initMap">
    </script>
  </body>
</html>

