                // <!--                        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />-->
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <script type="text/javascript">        
                    var geocoder = new google.maps.Geocoder();

                    function geocodePosition(pos) {
                        geocoder.geocode({
                            latLng: pos
                        });
                    }

                    function updateMarkerStatus(str) {
                        document.getElementById('markerStatus').innerHTML = str;
                    }

                    function updateMarkerPosition(latLng) {
                        document.getElementById('infoLat').setAttribute('value',latLng.lat());
                        document.getElementById('infoLng').setAttribute('value',latLng.lng());
                    }

                    function initialize() {
                        var latLng = new google.maps.LatLng(6.902215976621638, 79.86069999999995);
                        var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                            zoom: 19,
                            center: latLng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        var marker = new google.maps.Marker({
                            position: latLng,
                            map: map,
                            draggable: true
                        });

                        // Update current position info.
                        updateMarkerPosition(latLng);
                        geocodePosition(latLng);

                        google.maps.event.addListener(marker, 'drag', function() {
                            updateMarkerStatus('Dragging...');
                            updateMarkerPosition(marker.getPosition());
                        });

                        google.maps.event.addListener(marker, 'dragend', function() {
                            updateMarkerStatus('Position Found!');
                            geocodePosition(marker.getPosition());
                        });

                    }

                    // Onload handler to fire off the app.
                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap"
                        async defer></script>
                <!--                        <script async defer-->
                <!--                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&callback=myMap">-->
                <!--                        </script>-->
