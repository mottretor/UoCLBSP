function initialize() {
  var mapOptions = {
    zoom: 5,
    center: new google.maps.LatLng(24.886, -70.269),
    mapTypeId: 'terrain'
  };

  var map = new google.maps.Map(document.getElementById('map'),
      mapOptions);

  var bermudaTriangle = new google.maps.Polygon({
    paths: [
      new google.maps.LatLng(25.774, -80.190),
      new google.maps.LatLng(18.466, -66.118),
      new google.maps.LatLng(32.321, -64.757)
    ]
  });

  google.maps.event.addListener(map, 'click', function(event) {
    console.log(google.maps.geometry.poly.containsLocation(event.latLng, bermudaTriangle));
  });
}

google.maps.event.addDomListener(window, 'load', initialize);