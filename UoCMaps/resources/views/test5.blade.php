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
       
       var flag = 0;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 6.901120, lng: 79.860532},
          zoom: 17,
        });

        //received polygon data json***************

        // var mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":60,"lat":6.903579},{"lng":79.859726,"id":61,"lat":6.90225},{"lng":79.85948,"id":62,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":9},{"destination":11,"id":10,"source":9},{"destination":12,"id":11,"source":10},{"destination":12,"id":12,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

        var mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":10,"lat":6.903579},{"lng":79.859726,"id":11,"lat":6.90225},{"lng":79.85948,"id":12,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":9},{"destination":11,"id":10,"source":9},{"destination":12,"id":11,"source":10},{"destination":12,"id":12,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';
        
        var maparray = JSON.parse(mapdata);
        // //alert(dataPoly);
        var polyArray = maparray.polygons;
        var graphArray = maparray.graphs;
        var polydraw, path, graph, point, newpoint;
        var line = [];
        var flag = 0;
        var source = [];
        var destination = [];
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

            polydraw.addListener('click', loadmap);
            // newpoint.addListener('click', pointone);

            function loadmap(){
                flag = 1;
                for (var z = 0; z < graphArray.length; z++) {

                    for (var k = 0; k < graphArray[z].edges.length; k++) {
                        var sourcelat, sourcelng, destlat, destlng;
                        var graphedges = [];
                        var sourceid = graphArray[z].edges[k]["source"]; 
                        var destid = graphArray[z].edges[k]["destination"];

                        for (var a = 0; a < graphArray[z].vertexes.length; a++) {
                            if (sourceid ===  graphArray[z].vertexes[a]['id']){
                                sourcelat = graphArray[z].vertexes[a]["lat"];
                                sourcelng = graphArray[z].vertexes[a]["lng"];
                                var sourcepoint = {'lat': sourcelat, 'lng': sourcelng};
                                graphedges.push(sourcepoint);
                            }
                        }

                        for (var c = 0; c < graphArray[z].vertexes.length; c++) {
                            if (destid ===  graphArray[z].vertexes[c]['id']){
                                destlat = graphArray[z].vertexes[c]["lat"];
                                destlng = graphArray[z].vertexes[c]["lng"];
                                var destpoint = {'lat': destlat, 'lng': destlng};
                                graphedges.push(destpoint);
                            }
                        }
                        
                        sourcemark = new google.maps.Marker({
                            position: sourcepoint,
                            map: map,
                        });
                        sourcemark.addListener('click', pointone);

                        destmark = new google.maps.Marker({
                            position: destpoint,
                            map: map,
                        });
                        destmark.addListener('click', pointone);

                        var graphline = new google.maps.Polyline({
                            path: graphedges,
                            strokeColor: 'black',
                            strokeOpacity: 1.0,
                            strokeWeight: 5
                        });
                                
                        graphline.setMap(map);
                        graphline = [];

                        // newpoint.addListener('click', pointone);

                    }
                    
                }

                function pointone(ev){
                    // newpoint.removeListener('click', pointtwo);
                    var point1 = ev.latLng;
                    line.push({'lat': point1.lat(), 'lng': point1.lng()});
                    source.push({'lat': point1.lat(), 'lng': point1.lng()});
                    // alert(JSON.stringify(source));

                    // if(polydraw.addListener = true || sourcemark.addListener = true || de)
                    polydraw.addListener('click', pointtwo);
                    newpoint.addListener('click', pointtwo);
                    // sourcemark.addListener('click', pointtwo);
                    // destmark.addListener('click', pointtwo);
                }

                function pointtwo(e){
                    var point2 = e.latLng;
                    line.push({'lat': point2.lat(), 'lng': point2.lng()});
                    destination.push({'lat': point2.lat(), 'lng': point2.lng()});
                    alert(JSON.stringify(destination));
                    newpoint = new google.maps.Marker({
                        position: point2,
                        map: map,
                    });
                    newpoint.addListener('click', pointone);

                    var path = new google.maps.Polyline({
                        path: line,
                        // geodesic: true,
                        strokeColor: 'blue',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                    });
                                
                    path.setMap(map);
                    

                    polydraw.addListener('click', pointone);
                    // sourcemark.addListener('click', pointone);
                    // destmark.addListener('click', pointone);
                    destination = [];
                    line = [];
                    

                    
                    // sourcemark.addListener('click', pathdraw);
                    // destmark.addListener('click', pathdraw);

                }

            }
        }
        
    }  

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>

</body>
</html>




















