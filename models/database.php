<?php

//require_once "../../config.ini";

function ConnectMaster()
{
	$config = parse_ini_file("../../config.ini", true);
	$connection = new mysqli(
		"localhost", 
		$config["database"]["username"],
		$config["database"]["password"],
		$config["master"]["name"]);
	
	if ($connection->connect_errno)
	{
		exit("Database Connection Failed. Reason: ".$connection->connect_error);
	}
	
	return $connection;
}

function ConnectAccount($accountId)
{
	
}

?>