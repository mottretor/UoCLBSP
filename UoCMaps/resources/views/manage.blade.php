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
    <form action="/buildingSearch" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"placeholder="Search Buildings"> 
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
    </div>
    </form>
   </div>
   <br />
   <div id="result"></div>
  </div>
  <div>	

        <div class="btn-group" role="group" aria-label="...">
			<div class="btn-group" role="group" aria-label="...">
  		<button type="button" class="btn btn-default"> <a href="/addbuilding">Add Building</a></button>
      <button type="button" class="btn btn-default"> <a href="/users">Back</a></button>

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
    


 


<?php
  // foreach ($coordsObj as $point) {
  //   echo ($point['lat']);
  //   echo ($point['lng']);
  //   # code...
    
  // }
  
?>

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

	
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    //$('#result').html(data);
    alert('data');
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>




  <!-- <button type="button" class="btn btn-default"><a href="">Search Building</a></button> -->
  <!-- <button type="button" class="btn btn-default"><a href="">Update Building</a></button> -->
  <!-- <button type="button" class="btn btn-default"><a href="">Delete Building</a></button> -->

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>