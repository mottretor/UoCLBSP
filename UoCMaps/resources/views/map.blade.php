@section('styles')
<style>
    #map{
        height: 100%;
        width: 100%
    }
</style>

@endsection

<div id="map"></div>

<script>
    var geocoder = new google.maps.Geocoder('map');
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
                        var map = new google.maps.Map(document.getElementById('map'), {
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDlzy3HlhnvXsLI2rVbAdgAakwCTdXAuM&libraries=places&callback=initMap"
                        async defer></script>