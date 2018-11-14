<?php
session_start();

if ((isset($_SESSION["loggedin"]) === false ) || ($_SESSION["loggedin"] === false))
{
	ob_start();
	header("Location: login.php");
	ob_end_flush();
	die();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Scripture Tracker</title>
	</head>
	<body>
		<h1>Scripture Tracker</h1>
		<br />
		<?php 
		echo $_SESSION["loggedin"]."<br />";
		echo $_SESSION["accountId"]."<br />";
		echo $_SESSION["created"]."<br />";
		echo $_SESSION["nameLast"]."<br />";
		echo $_SESSION["nameFirst"]."<br />";
		echo $_SESSION["nameFull"]."<br />";
		echo $_SESSION["email"]."<br />";
		echo $_SESSION["username"]."<br />";
		?>
	</body>
</html>