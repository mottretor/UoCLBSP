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
	    	var data = requestPoly.response;
	    	alert(data);
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