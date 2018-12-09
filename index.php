<?php
session_start();

if ((isset($_SESSION["loggedin"]) === false ) || ($_SESSION["loggedin"] === false))
{
	ob_start();
	header("Location: login.php");
	ob_end_flush();
	die();
}
else
{
	ob_start();
	header("Location: app.php");
	ob_end_flush();
	die();
}
?>