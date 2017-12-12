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
       
       var flag = 0;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 6.901120, lng: 79.860532},
          zoom: 17,
        });

        //received polygon data json***************

        var mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":60,"lat":6.903579},{"lng":79.859726,"id":61,"lat":6.90225},{"lng":79.85948,"id":62,"lat":6.902409}],"edges":[],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';
        
        var maparray = JSON.parse(mapdata);
        // //alert(dataPoly);
        var polyArray = maparray.polygons;
        var graphArray = maparray.graphs;
        var polydraw, path, graph, point, newpoint;
        var line = [];
        // var verticelatlng = [];
        // var verticepos = [];

        for (var i = 0; i < polyArray.length; i++) {
            path = [];
            // graph = [];
            var polyObject = polyArray[i].vertexes;
            
            // alert(JSON.stringify(polyObject));
            polydraw = new google.maps.Polygon({
              paths: polyObject,
              strokeColor: '#aeb20c',
              strokeOpacity: 0.8,
              strokeWeight: 3,
              fillColor: '#eaf01b',
              fillOpacity: 0.35
            });
            polydraw.setMap(map);

            polydraw.addListener('click', function(){
                // alert('hi')
                for (var z = 0; z < graphArray.length; z++) {
                    for (var j = 0; j < graphArray[z].vertexes.length; j++) {
                        graph = [];
                        var latObject = graphArray[z].vertexes[j]["lat"];
                        var lngObject = graphArray[z].vertexes[j]["lng"];

                        point = new google.maps.Marker({
                            position: {lat: latObject, lng: lngObject},
                            map: map,
                        });

                        point.addListener('click', draw);
                            // polydraw.addListener('click', function(){
                            //     alert('let me draw')
                            // });
                        // });

                        // function draw(){
                        //     polydraw.addListener('click', function(){
                        //         alert('let me draw')
                        //     });
                        //     // alert('let me draw');
                        // }
                        
                    }
                    function draw(ev){
                        var cords = ev.latLng;
                        line.push({'lat': cords.lat(), 'lng': cords.lng()});
                            polydraw.addListener('click', function(e){
                                // placeMarker(e.latlng);
                                // alert('polygon');
                                // point.removeEventListner();
                                // verticepos = {'lat': event.latlng.lat(), 'lng': event.latlng.lng()};
                                // alert(verticepos);
                                // verticelatlng.push({"lat": verticepos.lat(), "lng": verticepos.lng()});
                                // alert(verticelatlng);

                                var pos = e.latLng;
                                line.push({'lat': pos.lat(), 'lng': pos.lng()});
                                // alert(pos);
                                newpoint = new google.maps.Marker({
                                    
                                    // position: {'lat': verticepos.lat(), 'lng': verticepos.lng()},
                                    // position: verticepos,
                                    position: pos,
                                    map: map,
                                });

                                newpoint.addListener('click', draw);

                                var path = new google.maps.Polyline({
                                  path: line,
                                  geodesic: true,
                                  strokeColor: 'black',
                                  strokeOpacity: 1.0,
                                  strokeWeight: 5
                                });
                                
                                path.setMap(map);
                                line = [];

                            });
                            // verticelatlng = [];
                            // alert('let me draw');
                        }
                }


            });
        }
        

        // for (var j = 0; j < graphArray.length; j++) {
        //     for (var k = 0; k < graphArray.vertexes[j].length; i++) {
        //         graph = [];
        //         var latObject = graphArray[j].vertexes[k]["lat"];
        //         var lngObject = graphArray[j].vertexes[k]["lng"];

        //         point = new google.maps.Marker({
        //             position: {"lat": latObject, "lng": lngObject},
        //             map: map,
        //         });
        //     }
            
            
        // }
    }
    //     var polylat, polylng, polyid, graphlat, graphlng, graphid, polydraw;
    //     var temppoly = [];
    //     var tempgraph = [];

    //     for (var i = 0; i < maparray.polygons.length; i++){
    //         polyid = maparray.polygon[i]["id"];
    //         graphid = maparray.graphs[i]["id"];
    //         for (var j = 0; j < maparray.polygons[i].length; j++){
    //             polylat = maparray.polygons[i].vertexes["lat"];
    //             polylng = maparray.polygon[i].vertexes["lng"];
    //             temppoly.push({'lat':polylat, 'lng':polylng});
    //             window.alert('polygon');
    //         // }

    //         polydraw = new google.maps.Polygon({
    //             paths: temppoly,
    //             strokeColor: '#aeb20c',
    //           strokeOpacity: 0.8,
    //           strokeWeight: 3,
    //           fillColor: '#eaf01b',
    //           fillOpacity: 0.35
    //         });
    //         polydraw.setMap(map);
    //         polydraw.addListener('click', drawmarkert());
    //         temppoly = [];

    //         // for (var k = 0; k < maparray.graphs[i].length; k++){
    //             graphlat = maparray.graphs[i].vertexes["lat"];
    //             graphlng = maparray.graphs[i].vertexes["lng"];
    //             tempgraph.push({'lat':graphlat, 'lng':graphlng});
    //             alert('graph');
    //         }
    //     }
            
            
        
    // }

        // while(flag = ids[0]){
        //     function draw(){
        //         alert('hi');
        //     }
        // }

    

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>

</body>
</html>




















