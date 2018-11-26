<?php
require_once "../models/database.php";

$username = $_GET["username"];
$userNameExists = false;


$masterConnection = ConnectMaster();
	
$queryString = "SELECT AccountID FROM Accounts WHERE Username = ?";
$sql = $masterConnection->prepare($queryString);
$sql->bind_param("s", $username);
if ($sql->execute())
{
	$sql->store_result();

	if ($sql->num_rows == 1)
		$userNameExists = true;
}

$masterConnection->close();
header('Content-Type: application/json');
echo json_encode($userNameExists);
?>