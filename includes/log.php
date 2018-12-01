<?php 
include 'includes/conexion.php';
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];

		// To protect MySQL injection for Security purpose
		// $username = stripslashes($username);
		// $password = stripslashes($password);
		// $username = mysql_real_escape_string($username);
		// $password = mysql_real_escape_string($password);
		// SQL query to fetch information of registerd users and finds user match.
		
		$query = "SELECT * FROM login WHERE username = '".$username."' AND password = '".$password"'";
		$result = mysqli_query( $connection, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		echo "" . $result;
		$rows = mysqli_param_count($result);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: index.php"); // Redirecting To Other Page
		} else {
			$error =  "Username or Password is invalid";
		}
	}
}

 ?>