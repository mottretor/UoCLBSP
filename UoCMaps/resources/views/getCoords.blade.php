<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>get coordinates from id</title>
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
		
		var pidSrc = "ChIJd52O_9hb4joRLGxedcoqDyk";
		var pidDst = "ChIJi_4u5rUW4zoRXEKX9BTHDdg";
		var lats,lngs,latd,lngd;

        var urlSrc = "https://maps.googleapis.com/maps/api/geocode/json?place_id="+pidSrc+"&key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY";
        var urlDst = "https://maps.googleapis.com/maps/api/geocode/json?place_id="+pidDst+"&key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY";

        var method = "GET";
        

        var shouldBeAsync = true;

        var requestSrc = new XMLHttpRequest();

        requestSrc.onload = function () {
          var status = requestSrc.status; // HTTP response status, e.g., 200 for "200 OK"
          var data = requestSrc.responseText;
          //alert(data);
          var jObjS = JSON.parse(data);
          lats = jObjS.results[0].geometry.location['lat'];
          lngs = jObjS.results[0].geometry.location['lng'];
          alert(lngs);
        }

        requestSrc.open(method, urlSrc, shouldBeAsync);
        requestSrc.send(null);

        var requestDst = new XMLHttpRequest();

        requestDst.onload = function () {
          var status = requestDst.status; // HTTP response status, e.g., 200 for "200 OK"
          var data = requestDst.responseText;
          //alert(data);
          var jObjD = JSON.parse(data);
          latd = jObjD.results[0].geometry.location['lat'];
          lngd = jObjD.results[0].geometry.location['lng'];
          //alert(lngd);
        }

        requestDst.open(method, urlDst, shouldBeAsync);
        requestDst.send(null);
    }

    </script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
	     async defer></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 -->
<!-- <script type="text/javascript" src="/js/httprequest.js"></script> -->

  </body>
</html>




























