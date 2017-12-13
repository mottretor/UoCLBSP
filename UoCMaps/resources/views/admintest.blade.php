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
            var line;
            var source;
            var map;
            var mapdata;
            var maparray;
            var polyArray;
            var graphArray;
            var path, graph, point, newpoint;
            var temp;
            var flag;
            var destination;
            var polygons = {};
            var polyid = 0;
            var startingPoint;
            var outJSON = {};


            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 6.901120, lng: 79.860532},
                    zoom: 17
                });

                //received polygon data json***************
                // var mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":60,"lat":6.903579},{"lng":79.859726,"id":61,"lat":6.90225},{"lng":79.85948,"id":62,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":9},{"destination":11,"id":10,"source":9},{"destination":12,"id":11,"source":10},{"destination":12,"id":12,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

                mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":10,"lat":6.903579},{"lng":79.859726,"id":11,"lat":6.90225},{"lng":79.85948,"id":12,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":12},{"destination":12,"id":11,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

                maparray = JSON.parse(mapdata);
                // //alert(dataPoly);
                polyArray = maparray.polygons;
                graphArray = maparray.graphs;
                loadmap();
                line = [];
                temp = [];
                flag = 0;
                source = [];
                cestination = [];
                // var verticelatlng = [];
                // var verticepos = [];

                for (var i = 0; i < polyArray.length; i++) {
                    path = [];
                    // graph = [];
                    var polyObject = polyArray[i].vertexes;

                    // alert(JSON.stringify(polyObject));
                    var polydraw = new google.maps.Polygon({
                        paths: polyObject,
                        strokeColor: '#aeb20c',
                        strokeOpacity: 0.8,
                        strokeWeight: 3,
                        fillColor: '#eaf01b',
                        fillOpacity: 0.35,
                        id: polyArray[i].id
                    });
                    polydraw.setMap(map);
                    polydraw.addListener('click', pointtwo);
                    outJSON[polyArray[i].id] = [];
                    // newpoint.addListener('click', pointone);


                }

            }
            function loadmap() {
                flag = 1;
                for (var z = 0; z < graphArray.length; z++) {
                    var sourcelat, sourcelng, destlat, destlng, sourId;
                    var graphVertexes = {};
                    for (var verti = 0; verti < graphArray[z].vertexes.length; verti++) {
                        sourcelat = graphArray[z].vertexes[verti]["lat"];
                        sourcelng = graphArray[z].vertexes[verti]["lng"];
                        sourId = graphArray[z].vertexes[verti]["id"];
                        var sourcepoint = {'lat': sourcelat, 'lng': sourcelng};

                        sourcemark = new google.maps.Marker({
                            position: sourcepoint,
                            map: map,
                            id: graphArray[z].id
                        });
                        sourcemark.addListener('click', pointone);
                        graphVertexes[sourId] = sourcepoint;
                    }

                    for (var k = 0; k < graphArray[z].edges.length; k++) {
                        var sourceid = graphArray[z].edges[k]["source"];
                        var destid = graphArray[z].edges[k]["destination"];
                        var graphline = new google.maps.Polyline({
                            path: [graphVertexes[sourceid], graphVertexes[destid]],
                            strokeColor: 'black',
                            strokeOpacity: 1.0,
                            strokeWeight: 5
                        });

                        graphline.setMap(map);
                        graphline = [];
                    }//                    
                }
            }

            function pointone(ev) {
                if (polyid == this.id) {
                    polyid = 0;
                    var point1 = ev.latLng;
                    var endPoint = {'lat': point1.lat(), 'lng': point1.lng()};
                    var outPath = {};
                    outPath['source'] = startingPoint;
                    outPath['destination'] = endPoint;
                    outJSON[this.id].push(outPath);
                    

                    var sourcemark = new google.maps.Marker({
                        position: endPoint,
                        map: map,
                        id: this.id
                    });
                    sourcemark.addListener('click', pointone);
                    
                    var path = new google.maps.Polyline({
                        path: [startingPoint,endPoint],
                        // geodesic: true,
                        strokeColor: 'blue',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                    });

                    path.setMap(map);


                } else if (polyid == 0) {
                    var point1 = ev.latLng;
                    startingPoint = {'lat': point1.lat(), 'lng': point1.lng()};
                    polyid = this.id;
                }

            }

            function pointtwo(e) {
                if (this.id == polyid) {
                    polyid = 0;
                    var point1 = e.latLng;
                    var endPoint = {'lat': point1.lat(), 'lng': point1.lng()};
                    var outPath = {};
                    outPath['source'] = startingPoint;
                    outPath['destination'] = endPoint;
                    outJSON[this.id].push(outPath);
                    

                    var sourcemark = new google.maps.Marker({
                        position: endPoint,
                        map: map,
                        id: this.id
                    });
                    sourcemark.addListener('click', pointone);

                    var path = new google.maps.Polyline({
                        path: [startingPoint,endPoint],
                        // geodesic: true,
                        strokeColor: 'blue',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                    });

                    path.setMap(map);
                }

            }

//            function pointtwo(e) {
//                var point2 = e.latLng;
//                temp.push('d');
//                line.push({'lat': point2.lat(), 'lng': point2.lng()});
//                temp.push({'lat': point2.lat(), 'lng': point2.lng()});
//                // destination.push({'lat': point2.lat(), 'lng': point2.lng()});
//                alert(JSON.stringify(destination));
//                newpoint = new google.maps.Marker({
//                    position: point2,
//                    map: map,
//                });
//                newpoint.addListener('click', pointone);
//
//                var path = new google.maps.Polyline({
//                    path: line,
//                    // geodesic: true,
//                    strokeColor: 'blue',
//                    strokeOpacity: 1.0,
//                    strokeWeight: 5
//                });
//
//                path.setMap(map);
//                alert(JSON.stringify(temp));
//                // alert(pathdraw);
//
//
//                polydraw.addListener('click', pointone);
//                // sourcemark.addListener('click', pointone);
//                // destmark.addListener('click', pointone);
//                destination = [];
//                line = [];
//                // temp = [];
//            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
        async defer></script>

    </body>
</html>




















