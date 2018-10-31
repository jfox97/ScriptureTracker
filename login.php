<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
	echo "You are already logged in.  Yay!";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ScriptureTracker - Login</title>
	</head>
	<body>
		<h1>
			Scripture Tracker
		</h1>
		<form action="controllers/login.php" method="post">
			<label>Username/Email:<br />
				<input type="text" name="username" />
			</label>
			<br />
			<label>Password:<br />
				<input type="password" name="password" />
			</label>
			<br /><br />
			<input type="submit" value="Sign in" />
		</form>
		<br />
		<em><a href="create_account.php">Not registered? Create an account</a></em>
	</body>
</html>