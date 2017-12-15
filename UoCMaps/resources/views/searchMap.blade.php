

<html>

<h2 class="heading">UoC Location Based Services Platform</h2>
<style type="text/css">
  .heading { 
    color : #fff;
    font-family: sans-serif;
    
    text-align: center;
    

   }
</style>
  <head>
    <title>Get directions</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/typeahead.bundle.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
    </head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style >
      #map {
          height: 83%;
          z-index: initial;
        }
      body{
        background-color: black;
      }
      html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
      .controls {
          margin-top: 10px;
          border: 4px solid transparent;
          border-radius: 2px 0 0 2px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          height: 32px;
          outline: none;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
      #origin-input,
        #destination-input{
          background-color: #fff;
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
          margin-left: 12px;
          margin-top: 10px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          width: 200px;
          height: 30px;
        }
        #search-button {
          
          font-family: Roboto;
          font-size: 17px;
          font-weight: 500;
          margin-left: 12px;
          margin-top: 10px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          width: 200px;
          height: 30px;
        }

        #origin-input:focus,
        #destination-input:focus{
          border-color: #4d90fe;
        }
  </style>
  
  

</head>
<body>
    
    

    

    <!-- <input id="origin-input" class="controls" type="text"
        placeholder="Origin location...">

    <input id="destination-input" class="controls" type="text"
        placeholder="Destination location..."> -->
    
      <input list="places"  id="origin-input" placeholder="Origin.." />
      <datalist id="places"></datalist>

      <input list="placesD" id="destination-input" placeholder="Destination.." />
      <datalist id="placesD"></datalist>

      <button type="button" onclick="getDirections()" id="search-button" class="btn btn-default">Get Directions</button>
    
      
      

    <div id="map"></div>

    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        window.map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: true,
            zoom: 16,
            center: {lat: 6.9022, lng: 79.8607},
            gestureHandling: 'cooperative'
        });
        var originInput = document.getElementById('origin-input');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);

        var destinationInput = document.getElementById('destination-input');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);

        var searchButton = document.getElementById('search-button');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchButton);

        
      }

        //ORIGIN****************************************************
        //search part
        $('#origin-input').keyup(function(){
          var searchValue=$(this).val();
          //alert(searchValue);


          //Getting two places from the search bars Origin and Destination
          //search results are retrieved from the java server
          var getPlaces = {"type":"searchRequest","input":searchValue,"role":"no"};

          var getPlacesJson = JSON.stringify(getPlaces);
          var urlPlaces = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
          var method = "POST";
          var placesData = getPlacesJson;
          var shouldBeAsync = true;
          var requestPlaces = new XMLHttpRequest(); 
          requestPlaces.timeout = 15000;
          requestPlaces.ontimeout = function(e){
            alert('request timeout');
          }  

          //on success  
          requestPlaces.onload = function () {
            var status = requestPlaces.status;
            var data = requestPlaces.response;
            //alert(data);
            //var datax = '{"Results":[{"lng":80.01436559999999,"name":"Gampaha","lat":7.0873101},{"lng":80.564677,"name":"Gampola","lat":7.126777},{"lng":79.9937034,"name":"Gampaha Railway Station","lat":7.093542999999999},{"lng":79.99173739999999,"name":"Gampaha Bus Station","lat":7.092380399999999},{"lng":79.8976314,"name":"Gamsabha Junction Bus Stop","lat":6.864619100000001}]}';
            //alert(status);
            var results = JSON.parse(data);
            window.resultsO = results;
            var places=[];
            window.placeLats=[];
            var nameX;
            for(var i=0; i<results.Results.length; i++){
              nameX = results.Results[i]['name']
              places[i] = nameX;
              window.placeLats.push([nameX,i]); 

            }
            document.getElementById('places').innerHTML = '';
            var list = document.getElementById('places');

            places.forEach(function(item){
               var option = document.createElement('option');
               option.value = item;
               list.appendChild(option);
            });



          }
          requestPlaces.open(method, urlPlaces, shouldBeAsync);
          requestPlaces.send(placesData);
        });

        //DESTINATION************************************************
        //getting search results for the destination
        $('#destination-input').keyup(function(){
          var searchValue=$(this).val();
          //alert(searchValue);


          var getPlaces = {"type":"searchRequest","input":searchValue,"role":"no"};

          var getPlacesJson = JSON.stringify(getPlaces);
          var urlPlaces = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
          var method = "POST";
          var placesData = getPlacesJson;
          var shouldBeAsync = true;
          var requestPlacesD = new XMLHttpRequest(); 
          requestPlacesD.timeout = 5000;
          requestPlacesD.ontimeout = function(e){
            alert('request timeout');
          }    
          //on success
          requestPlacesD.onload = function () {
            var status = requestPlacesD.status;
            var data = requestPlacesD.response;
            //alert(data);
            //var datax = '{"Results":[{"lng":80.01436559999999,"name":"Gampaha","lat":7.0873101},{"lng":80.564677,"name":"Gampola","lat":7.126777},{"lng":79.9937034,"name":"Gampaha Railway Station","lat":7.093542999999999},{"lng":79.99173739999999,"name":"Gampaha Bus Station","lat":7.092380399999999},{"lng":79.8976314,"name":"Gamsabha Junction Bus Stop","lat":6.864619100000001}]}';
            //alert(status);
            var results = JSON.parse(data);
            window.resultsD = results;
            var places=[];
            window.placeLatsD=[];
            var nameX;

            for(var i=0; i<results.Results.length; i++){
              nameX = results.Results[i]['name'];
              places[i] = nameX;
              window.placeLatsD.push([nameX,i]);

            }
            document.getElementById('placesD').innerHTML = '';
            var list = document.getElementById('placesD');

            places.forEach(function(item){
               var option = document.createElement('option');
               option.value = item;
               list.appendChild(option);
            });
            //alert(JSON.stringify(placeLats));
            


          }
          requestPlacesD.open(method, urlPlaces, shouldBeAsync);
          requestPlacesD.send(placesData);
        });


        //getting directions
        function getDirections(){
          window.source;
          window.destination;
          var originName = document.getElementById('origin-input').value;
          var destinationName = document.getElementById('destination-input').value;
          //alert(window.placeLatsD);
          var index=1;
          //alert(JSON.stringify(window.resultsO.Results[index]['lat']));
          for(var i=0;i<window.placeLats.length;i++){
            if(window.placeLats[i][0]==originName){
              index = window.placeLats[i][1];
              window.source = new google.maps.LatLng (window.resultsO.Results[index]['lat'], window.resultsO.Results[index]['lng']);
              window.destination = new google.maps.LatLng (window.resultsD.Results[index]['lat'], window.resultsD.Results[index]['lng']);
            }
          }
          // alert(source); 
          // alert(destination);
          getWholePath();

        }


        function getWholePath() {
          // var map = new google.maps.Map(document.getElementById('map'), {
          //   center: {lat: 6.901120, lng: 79.860532},
          //   zoom: 15,
          // });

          //requesting polygons from the server
          var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
          var method = "POST";
          var polyData = JSON.stringify({"type":"polyRequest"});
          var shouldBeAsync = true;
          var requestPoly = new XMLHttpRequest(); 
          requestPoly.timeout = 10000;
          requestPoly.ontimeout = function(e){
            alert('request timeout');
          }    
          requestPoly.onload = function () {
            var status = requestPoly.status;
            //if(requestPoly.readyState === XMLHttpRequest.DONE && requestPoly.status === 200){
              // HTTP response status, e.g., 200 for "200 OK"
              var dataPoly = requestPoly.response;
              var status = requestPoly.status;
              //alert(dataPoly);
              var polyJson = JSON.parse(dataPoly);
              //alert(dataPoly);
              
              var polygons = [],tempPoly = [],lat,lng,ids = [];

              for(var i=0;i<polyJson.polygons.length ; i++){
                for(var j=0;j<polyJson.polygons[i].vertexes.length ; j++){
                  lat = polyJson.polygons[i].vertexes[j]["lat"];
                  lng = polyJson.polygons[i].vertexes[j]["lng"];
                  tempPoly.push({'lat':lat,'lng':lng});
                }
                //alert(polyJson.polygons[i].vertexes.length>0);
                if(polyJson.polygons[i].vertexes.length>0){

                  //make new polygons
                  polygons[i] = new google.maps.Polygon({paths: tempPoly});
                  ids[i] = polyJson.polygons[i]["id"];
                  //if(polygons[i]){

                    //draw polygons on the map
                    //window.map.data.add({geometry: new google.maps.Data.Polygon([tempPoly])});
                    tempPoly = [];
                    //polygons[i].setMap(window.map);
                  //}
                }
                
                
                
              }
              //alert(JSON.stringify(polygons));
              
              //NEED TO BE TAKEN BY INPUT
              //var source = new google.maps.LatLng (9.827079, 80.249237); //point pedro
              //var source = new google.maps.LatLng (6.869262, 79.889792);//nugegoda
              //var source = new google.maps.LatLng (9.803694, 80.202572); //nelliyadi
              //var source = new google.maps.LatLng (6.902202, 79.858562); //inside polygon 200
              //var destination = new google.maps.LatLng (6.900881, 79.855816); //inside polygon 647
              //var destination = new google.maps.LatLng (6.900689, 79.860633); //inside polygon 100
              //var destination = new google.maps.LatLng (6.897675, 79.862457); //outside all 0
              //var destination = new google.maps.LatLng (5.921169, 80.594002); //dewundara point

              var source = window.source;
              var destination = window.destination;

              var srcdst =  { 'type':'getPath',
                              'source':
                                 {'latitudes':'', 
                                  'longitudes':'', 
                                  'inside':0
                                  }, 
                              'destination': 
                                 {'latitudes':'', 
                                  'longitudes':'', 
                                  'inside':0
                                  }
                            };

              srcdst.source['latitudes'] = source.lat();
              srcdst.source['longitudes'] = source.lng();
              srcdst.destination['latitudes'] = destination.lat();
              srcdst.destination['longitudes'] = destination.lng();
              //alert(JSON.stringify(srcdst));

              //check if the search points are inside any of the polygons 
              //otherwise zero   
              for(var z=0;z<polygons.length ; z++){
                if(polygons[z]){
                  if(google.maps.geometry.poly.containsLocation(source, polygons[z])){
                    srcdst.source['inside'] = ids[z];
                  }
                  if(google.maps.geometry.poly.containsLocation(destination, polygons[z])){
                    srcdst.destination['inside'] = ids[z];
                  }
                }
                
              }
              var jsonInside = JSON.stringify(srcdst);
              //alert(json);

              //sending the two points' coordinates and inside or not details
              var url = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
              var method = "POST";
              var postData = jsonInside;

              // want shouldBeAsync = true.
              // Otherwise, it'll block ALL execution waiting for server response.
              var shouldBeAsync = true;

              var requestPath = new XMLHttpRequest();

              // request.onreadystatechange = function(){
              //  if(request.readyState == XMLHttpRequest.DONE && request.status ==200){
              //    alert('request.responseXML');
              //  }
              // }
              requestPath.timeout = 20000;
              requestPath.ontimeout = function(e){
                alert('request timeout');
              }
              requestPath.onload = function () {
                var status = requestPath.status; // HTTP response status, e.g., 200 for "200 OK"
                var newPathJson = requestPath.response;
                //alert(newPathJson);
                // if(requestPath.readyState === XMLHttpRequest.DONE && requestPath.status === 200){
                  //alert(newPathJson); // Returned data, e.g., an HTML document.

                  // var sampleData = '{"steps":[{"latitude": 6.903045, "longitude": 79.860281},{"latitude": 6.902116, "longitude": 79.861996},{"latitude": 6.899326, "longitude": 79.860805},{"latitude": 6.898815, "longitude": 79.860429},{"latitude": 6.899528, "longitude": 79.859785},{"latitude": 6.903181, "longitude": 79.858584},{"latitude": 6.902351, "longitude": 79.857511},{"latitude": 6.901509, "longitude": 79.856942},{"latitude": 6.901019, "longitude": 79.855193},{"latitude": 6.900242, "longitude": 79.855440}]}';
                  //alert(newPathJson);
                  var newPath = JSON.parse(newPathJson);

                  // var newLine =[],lat,lng;
                  // for (var i = 0; i < newPath.steps.length; i++) {
                    
                  //   lat = newPath.steps[i]["latitudes"];
                  //   lng = newPath.steps[i]["longitudes"];
                  //   if(i==0){
                  //     var markerA = new google.maps.Marker({
                  //     position: {lat: lat, lng: lng},
                  //     map: map,
                  //     animation: google.maps.Animation.DROP,
                  //     label:"A"
                  //     });
                  //   }
                  //   else if(i==newPath.steps.length-1){
                  //     var markerB = new google.maps.Marker({
                  //     position: {lat: lat, lng: lng},
                  //     map: map,
                  //     animation: google.maps.Animation.DROP,
                  //     label:"B"
                  //     });
                  //   }
                  //   newLine.push({'lat':lat, 'lng':lng});
                  // }



                  //load new map for each search instance
                  // window.map = new google.maps.Map(document.getElementById('map'), {
                  //   mapTypeControl: true,
                  //   zoom: 15,
                  //   center: {lat: 6.9022, lng: 79.8607}
                  // });
                  
                  if(newPath.steps.length>0){
                    var finalPath = new google.maps.Polyline({
                      path: newPath.steps,
                      geodesic: true,
                      strokeColor: 'blue',
                      strokeOpacity: 1.0,
                      strokeWeight: 5
                    });

                    
                    //drawing the final received path on the map
                    finalPath.setMap(window.map);


                    //putting two markers on origin and destination
                    var markerA = new google.maps.Marker({
                        position: {lat: newPath.steps[0]['lat'], lng: newPath.steps[0]['lng']},
                        map: window.map,
                        animation: google.maps.Animation.DROP,
                        label:"A"
                    });
                    var markerB = new google.maps.Marker({
                        position: {lat: newPath.steps[newPath.steps.length-1]['lat'], lng: newPath.steps[newPath.steps.length-1]['lng']},
                        map: window.map,
                        animation: google.maps.Animation.DROP,
                        label:"B"
                    });
                    //INFO windows for start and end
                    markerA.addListener('click', function() {
                      infowindowA.open(window.map, markerA);
                    });
                    var infowindowA = new google.maps.InfoWindow({
                      content: "Origin Location"
                    });
                    markerB.addListener('click', function() {
                      infowindowB.open(window.map, markerB);
                    });
                    var infowindowB = new google.maps.InfoWindow({
                      content: "Destination Location"
                    });
                    map.addListener('click', function() {
                      infowindowA.close();
                      infowindowB.close();
                    });

                    //adjust the zoom level for the path to be clearly seen
                    var markerBounds = new google.maps.LatLngBounds();
                    
                    markerBounds.extend(markerA.position);
                    markerBounds.extend(markerB.position);
                    // map.setCenter(markerBounds.getCenter(), 
                    // map.getBoundsZoomLevel(markerBounds));
                    window.map.fitBounds(markerBounds);
         
                  }
                  else{
                    alert('No Valid paths Available');
                  }

                  
                //}

              }
            //}


            requestPath.open(method, url, shouldBeAsync);

            //request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            //request.setRequestHeader("Authorization");
            //request.setRequestHeader("Authorization", null);
            // Or... whatever

            // Actually sends the request to the server.
            requestPath.send(postData);

          }
          requestPoly.open(method, urlPoly, shouldBeAsync);
          requestPoly.send(polyData);
        }

        


        
      


      </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places,geometry&callback=initMap"
        async defer></script>

        
  </body>
</html>
