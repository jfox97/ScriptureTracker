<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
	ob_start();
	header("Location: app.php");
	ob_end_flush();
	die();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Scripture Tracker - Login</title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,500">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<div id="login_widget">
			<h1>
				Scripture Tracker
			</h1>
			<?php
				if (isset($_GET["error"]))
				{
					echo "<span id='error'>Incorrect user or password</span>";
				}
			?>
			<form action="controllers/login.php" method="post">
				<input type="text" 
					   name="username"
					   placeholder="Email/Username"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Email/Username'"/>
				<input type="password" 
					   name="password" 
					   placeholder="Password"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Password'"/>
				<input type="submit" value="Sign in" />
			</form>
			<p>
				<em><a href="create_account.php">Not registered? Create an account</a></em>
			</p>
		</div>
	</body>
</html>