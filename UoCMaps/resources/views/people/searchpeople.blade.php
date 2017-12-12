<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Get Shortest Path</title>
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
<div>
	<div class="container">
    @if(isset($details))
        <p>Search results <b> {{ $query }} </b> are</p>
    
    {!! Form::open(['url' => '/update','method' => 'post']) !!}
            <form action="/update" method="post">
            
                <table>

                    <tr>
                        <td>
                            NIC :
                        </td>
                        <td>
                            <!-- {!!Form::text('name',null,['class'=>'form-control']);!!} -->
                            <!-- @foreach($details as $user) -->
                            
                                <!-- <td>{{$user->name}}</td> -->
                                
                            
                            <!-- @endforeach -->
                            <!-- <input type="hidden" name="nic" value=" {{$user->nic}}"> -->
                            <input type="text" name="nic" id="nic" value="{{$user->nic}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <!-- {!!Form::text('name',null,['class'=>'form-control']);!!} -->
                            <!-- @foreach($details as $user) -->
				            
				                <!-- <td>{{$user->name}}</td> -->
				                
				            
				            <!-- @endforeach -->
                            <input type="hidden" name="nic" value=" {{$user->nic}}">
                            <input type="text" name="name" id="name" value="{{$user->name}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Designation :
                        </td>
                        <td>
                            <!-- <input type="text" name="Description" value=""> -->
                            <!-- {!!Form::text('description',null,['class'=>'form-control']);!!} -->
                            <input type="text" name="designation" id="name" value="{{$user->designation}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Description :
                        </td>
                        <td>
                            <!-- <input type="text" name="Description" value=""> -->
                            <!-- {!!Form::text('description',null,['class'=>'form-control']);!!} -->
                            <input type="text" name="description" id="name" value="{{$user->description}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Latitude :
                        </td>
                        <td>
                            <input type="text" name="Latitudes" id="infoLat" value="{{$user->lat}}">
                            
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Longitude :
                        </td>
                        <td>
                            <input type="text" name="Longitudes" id="infoLng" value="{{$user->long}}">
                            
                        </td>
                    </tr>

                </table>

                <input type="submit" name="update" value="UPDATE">
                <input type="submit" name="delete" value="DELETE">

            
            </form>
            {!! Form::close() !!}
    @endif

 	</div>
    <div id="map"></div>
    <script>
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 6.901120, lng: 79.860532},
        zoom: 15,
      });
    }
    </script>

 	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
         async defer></script>
</div>
</body>
</html>
