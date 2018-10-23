<?php
require_once "../models/database.php";
require_once "../models/create_account.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

try {

	$masterConnection = ConnectMaster();

	$sql = "SELECT Email, Username FROM Accounts";
	$rows = $masterConnection->query($sql);

	while ($row = $rows->fetch_assoc())
	{
		if ($row["Email"] == $email || $row["Username"] == $username)
		{
			ob_start();
			header("Location: ../create_account.php?user_exists=true");
			ob_end_flush();
			die();
		}
	}

	createAccount($firstname, $lastname, $email, $username, $password);
	
	ob_start();
	header("Location: ../accounts/creation_success.php");
	ob_end_flush();
	die();
}
catch (Exception $e)
{
	ob_start();
	header("Location: ../accounts/creation_failure.php");
	ob_end_flush();
	die();
}
?>