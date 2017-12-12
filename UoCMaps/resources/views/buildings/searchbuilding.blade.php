<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf"/>
    <title>MANAGING BUILDINGS AND PEOPLE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script src="css/boostrap.js"></script>
    <link herf="css/boostrap.css" rel="stylesheet"/>
</head>

<body>
<div style="width: 100%; height: 10%; float: top; background-color: black">
    <p style="color: white; font-size: 30px"> UoC Location Based Services Platform</p>
</div>
<div style="width: 100%; height: 90%; float: bottom">
    <div style="width: 25%; float: left">
       
         <div class="container">
  <br>
  <div  style=" width: 300px">
    
   </div>
   <br />
   <div id="result"></div>
  </div>
  <div> 
  <div>
    <div class="container">
    @if(isset($details))
        <p>Search results <b> {{ $query }} </b> are</p>
    
    {!! Form::open(['url' => '/update','method' => 'post']) !!}
            <form action="/update" method="post">
               
                <table>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <!-- {!!Form::text('name',null,['class'=>'form-control']);!!} -->
                            <!-- @foreach($details as $user) -->
                            
                                <!-- <td>{{$user->name}}</td> -->
                                
                            
                            <!-- @endforeach -->
                            <input type="hidden" name="id" value=" {{$user->id}}">
                            <input type="text" name="name" id="name" value="{{$user->name}}">
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
                <!-- <a type="button" href="/delete/{{$user->id}}">Delete</a> -->
                <button type="button" class="btn btn-default"> <a href="/delete/{{$user->id}}">Delete</a></button>
                <!-- <input type="submit" name="delete" value="DELETE"> -->
                <button type="button" class="btn btn-default"> <a href="/buildingShow">Back</a></button>

            
            </form>
            {!! Form::close() !!}
    @endif
    </div>

    
</div>

       
</div>
</div>
    <div style="width: 75%; float:right">
        <div>
            

  <head>
    <style>
       #map {
        height: 700px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <!-- <h3>My Google Maps Demo</h3> -->
  <!--  <div id="map"></div> -->
    <div>
    

    </div>
    


 



    <div id="map"></div>
    
    <script>
    

      function initMap() {
        var uluru = {lat: 6.902215976621638, lng: 79.86069999999995};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 19,
          center: uluru
        });

        // var marker;
        // for(var i=0;i<coordsObj.length;i++){
        //   marker = new google.maps.Marker({
        //     position: new google.maps.LatLng(coordsObj[i]['lat'],coordsObj[i]['lng']),
        //     map: map
        //   });
        //   marker.setMap(map);
        // }
        
        
      }
      </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf_UNZ4XLYq1wPHkvOVF6zkrvVOzG3eE&callback=initMap"
    async defer></script>
    


        </div>
    </div>
</div>

    





  <!-- <button type="button" class="btn btn-default"><a href="">Search Building</a></button> -->
  <!-- <button type="button" class="btn btn-default"><a href="">Update Building</a></button> -->
  <!-- <button type="button" class="btn btn-default"><a href="">Delete Building</a></button> -->

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>