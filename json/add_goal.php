<?php
require_once "../models/database.php";

session_start();

if ((isset($_SESSION["loggedin"]) === false ) || ($_SESSION["loggedin"] === false))
{
	ob_start();
	header("Location: login.php");
	ob_end_flush();
	die();
}

$accountId = $_SESSION["accountId"];
$collection = $_POST["collection"];
$startDate = date("Y-m-d", strtotime($_POST["start_date"]));
$endDate = date("Y-m-d", strtotime($_POST["end_date"]));
$dateTime = date("Y-m-d h:i:s", time());
$name = "NoName";

try {
	$accountConnection = ConnectAccount($accountId);

	$queryString = "INSERT INTO Goals ";
	$queryString .= "(Created, Modified, Name, StartScripture, EndScripture, StartDate, EndDate) ";
	$queryString .= "VALUES (?, ?, ?, ?, ?, ?, ?)";

	$sql = $accountConnection->prepare($queryString);
	$sql->bind_param("sssssss",
					$dateTime,
					$dateTime,
					$name,
					$collection,
					$collection,
					$startDate,
					$endDate);
	$sql->execute();

	$accountConnection->close();
	
	ob_start();
	header("Location: ../app.php?added=true");
	ob_end_flush();
	die();
}
catch (Exception $e)
{
	ob_start();
	header("Location: ../app.php?added=false");
	ob_end_flush();
	die();
}
?>