<?php

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
		throw new Exception("Database connection failed");
	}
	
	return $connection;
}

function ConnectAccount($accountId)
{
	$config = parse_ini_file("../../config.ini", true);
	$connection = new mysqli(
		"localhost", 
		$config["database"]["username"],
		$config["database"]["password"],
		"Account_$accountId");
	
	if ($connection->connect_errno)
	{
		exit("Database Connection Failed. Reason: ".$connection->connect_error);
		throw new Exception("Database connection failed");
	}
	
	return $connection;
}

function CreateAccountDb($accountId)
{
	$config = parse_ini_file("../../config.ini", true);
	$connection = new mysqli(
		"localhost",
		$config["database"]["username"],
		$config["database"]["password"]);
	
	if ($connection->connect_errno)
	{
		exit("Database Connection Failed. Reason: ".$connection->connect_error);
		throw new Exception("Database connection failed");
	}
	
	$sql = "CREATE DATABASE Account_$accountId";
	
	if ($connection->query($sql))
	{
		$connection->close();
		AddTables($accountId);
		return true;
	}
	else
	{
		$connection->close();
		throw new Exception("Account db creation failed");
		return false;
	}
}

function AddTables($accountId)
{
	$connection = ConnectAccount($accountId);
	
	$sql  = "CREATE TABLE `goals` (";
	$sql .= "	`ItemID` bigint(20) NOT NULL AUTO_INCREMENT,";
	$sql .= "	PRIMARY KEY(`ItemID`),";
	$sql .= "	`Created` datetime NOT NULL,";
	$sql .= "	`Modified` datetime NOT NULL,";
	$sql .= "	`Name` varchar(510) NOT NULL,";
	$sql .= "	`StartScripture` varchar(255) NOT NULL,";
	$sql .= "	`EndScripture` varchar(255) NOT NULL,";
	$sql .= "	`StartDate` date NOT NULL,";
	$sql .= "	`EndDate` date NOT NULL";
	$sql .= ")";
	
	if ($connection->query($sql))
	{
		$connection->close();
		return true;
	}
	else
	{
		$connection->close();
		throw new Exception("Account table addition failed");
		return false;
	}
}

?>