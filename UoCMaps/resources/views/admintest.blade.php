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
<<<<<<< HEAD
            var polydraw, path, graph, point, newpoint;
            var temp;
            var flag;
            var destination;
=======
            var path, graph, point, newpoint;
            var temp;
            var flag;
            var destination;
            var polygons = {};
            var polyid = 0;
            var startingPoint;
            var outJSON = {};

>>>>>>> origin/master

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 6.901120, lng: 79.860532},
<<<<<<< HEAD
                    zoom: 17,
                });

                //received polygon data json***************

                // var mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":60,"lat":6.903579},{"lng":79.859726,"id":61,"lat":6.90225},{"lng":79.85948,"id":62,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":9},{"destination":11,"id":10,"source":9},{"destination":12,"id":11,"source":10},{"destination":12,"id":12,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

                mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":10,"lat":6.903579},{"lng":79.859726,"id":11,"lat":6.90225},{"lng":79.85948,"id":12,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":9},{"destination":11,"id":10,"source":9},{"destination":12,"id":11,"source":10},{"destination":12,"id":12,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

                maparray = JSON.parse(mapdata);
                // //alert(dataPoly);
                polyArray = maparray.polygons;
                graphArray = maparray.graphs;

=======
                    zoom: 17
                });

                // mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":10,"lat":6.903579},{"lng":79.859726,"id":11,"lat":6.90225},{"lng":79.85948,"id":12,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":12},{"destination":12,"id":11,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

                var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
                var method = "POST";
                var mapData = JSON.stringify({"type":"mapRequest"});
                var shouldBeAsync = true;
                var requestMap = new XMLHttpRequest();
                var data;     
                requestMap.onload = function () {
                    var status = requestMap.status; // HTTP response status, e.g., 200 for "200 OK"
                    data = requestMap.response;
                    // alert(data);
                }
                requestMap.open(method, urlPoly, shouldBeAsync);
                requestMap.send(maparray);
                alert(data);
                maparray = JSON.parse(data);
                // //alert(dataPoly);
                polyArray = maparray.polygons;
                graphArray = maparray.graphs;
                loadmap();
>>>>>>> origin/master
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
<<<<<<< HEAD
                    polydraw = new google.maps.Polygon({
=======
                    var polydraw = new google.maps.Polygon({
>>>>>>> origin/master
                        paths: polyObject,
                        strokeColor: '#aeb20c',
                        strokeOpacity: 0.8,
                        strokeWeight: 3,
                        fillColor: '#eaf01b',
<<<<<<< HEAD
                        fillOpacity: 0.35
                    });
                    polydraw.setMap(map);

                    polydraw.addListener('click', loadmap);
                    // newpoint.addListener('click', pointone);


                }

            }
            function loadmap() {
                flag = 1;
                for (var z = 0; z < graphArray.length; z++) {

                    for (var k = 0; k < graphArray[z].edges.length; k++) {
                        var sourcelat, sourcelng, destlat, destlng;
                        var graphedges = [];
                        var sourceid = graphArray[z].edges[k]["source"];
                        var destid = graphArray[z].edges[k]["destination"];

                        for (var a = 0; a < graphArray[z].vertexes.length; a++) {
                            if (sourceid === graphArray[z].vertexes[a]['id']) {
                                sourcelat = graphArray[z].vertexes[a]["lat"];
                                sourcelng = graphArray[z].vertexes[a]["lng"];
                                var sourcepoint = {'lat': sourcelat, 'lng': sourcelng};
                                graphedges.push(sourcepoint);
                            }
                        }

                        for (var c = 0; c < graphArray[z].vertexes.length; c++) {
                            if (destid === graphArray[z].vertexes[c]['id']) {
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
=======
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
>>>>>>> origin/master
                            map: map,
                            id: graphArray[z].id
                        });
<<<<<<< HEAD
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

            }

            function pointone(ev) {
                temp = [];
                // newpoint.removeListener('click', pointtwo);
                var point1 = ev.latLng;
                temp.push('s');
                line.push({'lat': point1.lat(), 'lng': point1.lng()});
                temp.push({'lat': point1.lat(), 'lng': point1.lng()});
                source.push({'lat': point1.lat(), 'lng': point1.lng()});
                // alert(JSON.stringify(source));

                // if(polydraw.addListener = true || sourcemark.addListener = true || de)
                polydraw.addListener('click', pointtwo);
                // newpoint.addListener('click', pointtwo);
                // sourcemark.addListener('click', pointtwo);
                // destmark.addListener('click', pointtwo);



            }

            function pointtwo(e) {

                var point2 = e.latLng;
                temp.push('d');
                line.push({'lat': point2.lat(), 'lng': point2.lng()});
                temp.push({'lat': point2.lat(), 'lng': point2.lng()});
                // destination.push({'lat': point2.lat(), 'lng': point2.lng()});
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
                alert(JSON.stringify(temp));
                // alert(pathdraw);


                polydraw.addListener('click', pointone);
                // sourcemark.addListener('click', pointone);
                // destmark.addListener('click', pointone);
                destination = [];
                line = [];
                // temp = [];
            }

            function pointtwo(e) {
                var point2 = e.latLng;
                temp.push('d');
                line.push({'lat': point2.lat(), 'lng': point2.lng()});
                temp.push({'lat': point2.lat(), 'lng': point2.lng()});
                // destination.push({'lat': point2.lat(), 'lng': point2.lng()});
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
                alert(JSON.stringify(temp));
                // alert(pathdraw);


                polydraw.addListener('click', pointone);
                // sourcemark.addListener('click', pointone);
                // destmark.addListener('click', pointone);
                destination = [];
                line = [];
                // temp = [];
=======
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

>>>>>>> origin/master
            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
        async defer></script>

    </body>
</html>




















