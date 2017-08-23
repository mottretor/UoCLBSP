<?php include('server.php'); ?>
<!DOCTYPE html>
<html>

<head>
<style>
body  {
    background-image: url("Capture.jpg");
    background-color: #cccccc;
}
</style>
	<title>User registration  </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h3>UoC Location Base Web Application</h3>
	<h2>Login</h2>
</div>

<form method="post" action="login.php">
<!-- display validation errors here-->
	<?php include('errors.php'); ?>
	<div class="input-group">
		<label>User Name : </label>
		<input type="text" name="username">
	</div>
	<div class="input-group">
		<label>Password : </label>
		<input type="password" name="password">
	</div>
	<div class="input-group">
		<button type="submit" name="login" class="btn" >Login</button>
	</div>
	<p>
		Not yet a member? <a href="register.php">Sign up</a>
	</p>
</form>

</body>
</html>