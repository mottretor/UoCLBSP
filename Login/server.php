<?php 
	session_start();

	$username = "";
	$email = "";
	$errors = array();

	//connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

/*if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($db) . PHP_EOL;

mysqli_close($db); */


	//if the register button is clicked
	if (isset($_POST['register'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password_1 = mysql_real_escape_string($_POST['password_1']);
		$password_2 = mysql_real_escape_string($_POST['password_2']);

		//ensure that form fields are filled propely
		if (empty($username)){
			array_push($errors, "Username is required"); //add error to error array
		}  
		if (empty($email)){
			array_push($errors, "Email is required"); //add error to error array
		}
		if (empty($password_1)){
			array_push($errors, "Password is required"); //add error to error array
		}
		if ($password_1 != $password_2){
			array_push($errors, "The two passwords do not match"); //add error to error array
		}
		//if there are no errors, save user to database
		if (count($errors)==0) {
			$password = md5($password_1); // encrypt password before storing
			$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

			mysqli_query($db, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php'); //redirect to home page
		}
	}
		//log user from login page
		if (isset($_POST['login'])) {
			$username = mysql_real_escape_string($_POST['username']);
			$password = mysql_real_escape_string($_POST['password']);

			//ensure that form fields are filled propely
			if (empty($username)){
				array_push($errors, "Username is required"); //add error to error array
			}  
			if (empty($password)){
				array_push($errors, "Password is required"); //add error to error array
			}
			if (count($errors)==0) {
				$password = md5($password); // encrypt password before comparing with that from database
				$query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
				$result = mysqli_query($db, $query );
				if (mysqli_num_rows($result)==1) {
					//log user in
					$_SESSION['username'] = $username;
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php'); //redirect to home page
				}else{
					array_push($errors, "Wrong Username/Password combination...!!!");
				}
			}

		}

		
		// logout
		if (isset($_GET['logout'])) {
			session_destroy();
			unset($_SESSION['username']);
			header('location: login.php');
		}
		
	


 ?> 