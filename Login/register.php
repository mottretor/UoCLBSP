
<?php include('server.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<style>
body  {
    background-image: url("map.jpg");
    /*background-color: #cccccc;*/
}
</style>
	<title>User registration  </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h3>UoC Location Base Web Application</h3>
	<h2>Register</h2>
</div>

<form method="post" action="register.php">
<!-- display validation errors here-->
	<?php include('errors.php'); ?>

	<div class="input-group">
		<label>User Name : </label>
		<input type="text" name="username">
	</div>

	<div class="input-group">
		<label>Email : </label>
		<input type="text" name="email">
	</div>

	<div class="input-group">
		<label>Password : </label>
		<input type="password" name="password_1">
	</div>

	<div class="input-group">
		<label>Confirm password : </label>
		<input type="password" name="password_2">
	</div>

	<div class="input-group"> 
		<button type="submit" name="register" class="btn">Register</button>
	</div>
	<p>
		Already  a member? <a href="login.php">Sign in</a>
	</p>
</form>

</body>
