<?php
require_once "../models/database.php";
require_once "../models/create_account.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$masterConnection = ConnectMaster();

$sql = "SELECT Email FROM Accounts";
$rows = $masterConnection->query($sql);

while ($row = $rows->fetch_assoc())
{
	if ($row["Email"] == $email)
	{
		ob_start();
		header("Location: ../create_account.php?email_exists=true");
		ob_end_flush();
		die();
	}
}

createAccount($firstname, $lastname, $email, $username, $password);
?>