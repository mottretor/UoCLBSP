<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body>
	<center>
		<form action="/formlogic" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			Name: <input type="text" name="name"></br>
			Description: <input type="text" name="description"></br>
			Latitude: <input type="double" name="Latitude"></br>
			Longitude: <input type="double" name="longitude"></br>
			<input type="submit" name="submit" value="Submit">
		</form>
	</center>
</body>
</html>