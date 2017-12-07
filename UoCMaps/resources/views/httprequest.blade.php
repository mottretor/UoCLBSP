<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>http request</title>
    
  </head>
  <?php header('Access-Control-Allow-Origin: *'); ?>
  <body>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 -->
  <script >
  
	var srcdst =  {'source':
	                         {'latitude':'3', 
	                          'longitude':'3', 
	                          'inside':'2'}
	                        , 
	                      'destination': 
	                         {'latitude':'fd', 
	                          'longitude':'f', 
	                          'inside':'fdd'}
	                        
	                      };

	var json = JSON.stringify(srcdst);
	//window.alert(json);
	
	var url = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
	var method = "POST";
	var postData = json;

	// want shouldBeAsync = true.
	// Otherwise, it'll block ALL execution waiting for server response.
	var shouldBeAsync = true;

	var request = new XMLHttpRequest();

	// request.onreadystatechange = function(){
	// 	if(request.readyState == XMLHttpRequest.DONE && request.status ==200){
	// 		alert('request.responseXML');
	// 	}
	// }
	request.onload = function () {
		var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
	   	var data = request.response;
	   	alert(data); // Returned data, e.g., an HTML document.
	}

	request.open(method, url, shouldBeAsync);

	//request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
	//request.setRequestHeader("Authorization");
	//request.setRequestHeader("Authorization", null);
	// Or... whatever

	// Actually sends the request to the server.
	request.send(postData);

	



</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</body>
</html>