<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        From To
    </title>


    <link rel="stylesheet" type="text/css" href="/assets/jquery.datetimepicker.css" >

    <script src="/assets/build/jquery.datetimepicker.full.min.js"></script>

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
        #mode-selector {
            color: #fff;
            background-color: #4d90fe;
            margin-left: 12px;
            padding: 5px 11px 0px 11px;
        }
        #mode-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
    </style>
</head>
<body>

<!--<nav class="navbar navbar-default">-->
<!--    <div class="container-fluid">-->
<!--        <div class="navbar-header">-->
<!--            <a class="navbar-brand" href="#">GetDirections</a>-->
<!--        </div>-->
<!--<ul class="nav navbar-nav">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">Page 1</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
</ul>-->
<!--    </div>-->
<!--</nav>-->

<h2>
    UoC Location Based Services Platform
</h2>

<input id="origin-input" class="controls" type="text"
       placeholder="Enter an origin location">

<input id="destination-input" class="controls" type="text"
       placeholder="Enter a destination location">

<!--<input type="text" class="datetimepicker" id="from-time" placeholder="Time From">-->
<!--<input type="text" class="datetimepicker" id="to-time" placeholder="Time To">-->


<!-- Modal -->
<div id="dataModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Your Path Information</h4>
            </div>
            <div class="modal-body">
                <p id="processing-display">
                    Data is being processing.
                </p>

                <p id="best-time">

                </p>

                <p id="duration">

                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--<div id="mode-selector" class="controls">
    <input type="radio" name="type" id="changemode-walking" checked="checked">
    <label for="changemode-walking">Walking</label>
    <input type="radio" name="type" id="changemode-transit">
    <label for="changemode-transit">Transit</label>
    <input type="radio" name="type" id="changemode-driving">
    <label for="changemode-driving">Driving</label>
</div>-->

<div id="map"></div>


<script>
    var sourceAddress, destinationAddress;
    function sendData(){
        if (typeof sourceAddress !== 'undefined' && typeof  destinationAddress !== 'undefined'){
            var fromTime = $('#from-time').val();
            var toTime = $('#to-time').val();
            if ((typeof fromTime !== 'undefined' || fromTime !== '') && (typeof  toTime !== 'undefined' || toTime !== '')){
                var from, to;
                var dateString = fromTime,
                    dateTimeParts = dateString.split(' '),
                    timeParts = dateTimeParts[1].split(':'),
                    dateParts = dateTimeParts[0].split('-');
                from = new Date(dateParts[2], parseInt(dateParts[1], 10) - 1, dateParts[0], timeParts[0], timeParts[1]);
                console.log(from);
                console.log(from.getTime());
                /* console.log(date.getTime()); //1379426880000
                 console.log(date);*/
                var dateStringTo = toTime,
                    dateTimePartsTo = dateStringTo.split(' '),
                    timePartsTo = dateTimePartsTo[1].split(':'),
                    datePartsTo = dateTimePartsTo[0].split('-');
                to = new Date(datePartsTo[2], parseInt(datePartsTo[1], 10) - 1, datePartsTo[0], timePartsTo[0], timePartsTo[1]);
                var diff = ( from.getTime() - to.getTime() ) / 1000;
                var url = 'http://localhost:9090/Controller/mainHandler?origin='+ encodeURI(sourceAddress)+
                    '&destination='+ encodeURI(destinationAddress)+
                    '&sTimeh='+from.getTime()+
                    '&sTimem='+diff;
                console.log(url);
                $.ajax({
                    method:'GET',
                    dataType: 'jsonp',
                    url: url
                    ,
                    beforeSend: function () {
                        $('#dataModal').modal('show');
                    },
                    success:function (data) {
                        $('#processing-display').html();
                        $('#best-time').html(
                            '<strong>Best time for your travelling is: </strong>'+data.bestTime
                        );
                        $('#duration').html(
                            '<strong>Your travelling may take up to: </strong>'+data.duration +''
                        );
                    },
                    error:function (data) {
                        $('#processing-display').html('An error occurred while processing your data. ');
                    },
                    complete:function (data) {
                    }
                });
            }
        }
    }
</script>

<script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: false,
            center: {lat: 6.902215976621638, lng: 79.86069999999995},
            zoom: 15
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
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);
        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});
        /*this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');*/
        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
    }
    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    /*AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
            me.travelMode = mode;
            me.route();
        });
    };*/
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
                sourceAddress = place.name;
            } else {
                me.destinationPlaceId = place.place_id;
                destinationAddress = place.name;
            }
            me.route();
            sendData();
//            console.log(place);
            /*console.log('place: '+place.destinationPlaceId);*/
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkxICLv1Os6X3RaKF4zSdGFDxde72Pl1o&libraries=places&callback=initMap"
        async defer></script>

<script>
    $(function () {
        jQuery('.datetimepicker').datetimepicker({
            format:'d-m-Y H:i',
            step:1
        });
    });
</script>
</body>
</html>