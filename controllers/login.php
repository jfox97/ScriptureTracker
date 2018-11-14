<?php
require_once "../models/login.php";

$username = $_POST["username"];
$password = $_POST["password"];
$isEmail = (strpos($username, "@") !== false);

login($username, $password, $isEmail);

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
	ob_start();
	header("Location: ../app.php");
	ob_end_flush();
	die();
}
else
{
	ob_start();
	header("Location: ../login.php?error=unexpected");
	ob_end_flush();
	die();
}
?>