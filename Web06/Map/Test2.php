<!DOCTYPE html>
<html>

<body>

<div id="map" style="width:100%;height:500px"></div>

<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(6.9022, 79.8607);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom:};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position: myCenter, draggable: true});
        marker.setMap(map);

        updateMarkerPosition(latLng);
        geocodePosition(latLng);

        google.maps.event.addListener(marker, 'dragstart', function () {
            updateMarkerAddress('Dragging...');
        });

        google.maps.event.addListener(marker, 'drag', function () {
            updateMarkerStatus('Dragging...');
            updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function () {
            updateMarkerStatus('Drag ended');
            geocodePosition(marker.getPosition());
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&callback=myMap"></script>

</body>
</html>
