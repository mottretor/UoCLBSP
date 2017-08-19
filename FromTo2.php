<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
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
      .controls {
    margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

    </style>
  </head>
  <body>
    <input id="origin-input" class="controls" type="text"
        placeholder="Enter an origin location">

    <input id="destination-input" class="controls" type="text"
        placeholder="Enter a destination location">

<!--    <div id="mode-selector" class="controls">-->
<!--      <input type="radio" name="type" id="changemode-walking" checked="checked">-->
<!--      <label for="changemode-walking">Walking</label>-->
<!---->
<!--      <input type="radio" name="type" id="changemode-transit">-->
<!--      <label for="changemode-transit">Transit</label>-->
<!---->
<!--      <input type="radio" name="type" id="changemode-driving">-->
<!--      <label for="changemode-driving">Driving</label>-->
<!--    </div>-->

    <div id="map"></div>

    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 6.9022, lng: 79.8607},
          zoom: 16
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
        */
      function AutocompleteDirectionsHandler(map) {
          this.map = map;
          this.originPlaceId = null;
          this.destinationPlaceId = null;
          var originInput = document.getElementById('origin-input');
          var destinationInput = document.getElementById('destination-input');
          this.directionsService = new google.maps.DirectionsService;
          this.directionsDisplay = new google.maps.DirectionsRenderer;
          this.directionsDisplay.setMap(map);

          var originAutocomplete = new google.maps.places.Autocomplete(
                  originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
                  destinationInput, {placeIdOnly: true});

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
//      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
//          var radioButton = document.getElementById(id);
//          var me = this;
//          radioButton.addEventListener('click', function() {
//              me.travelMode = mode;
//              me.route();
//          });
//      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
          var me = this;
          autocomplete.bindTo('bounds', this.map);
          autocomplete.addListener('place_changed', function() {
              var place = autocomplete.getPlace();
              if (!place.place_id) {
                  window.alert("Please select an option from the dropdown list.");
                  return;
              }
              if (mode === 'ORIG') {
                  me.originPlaceId = place.place_id;
              } else {
                  me.destinationPlaceId = place.place_id;
              }
              me.route();
          });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
          if (!this.originPlaceId || !this.destinationPlaceId) {
              return;
          }
          var me = this;

          this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
              if (status === 'OK') {
                  me.directionsDisplay.setDirections(response);
              } else {
                  window.alert('Directions request failed due to ' + status);
              }
          });
      };

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>