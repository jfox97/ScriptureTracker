<?php
require_once "database.php";

function getGoals($accountId)
{
	$accountConnection = ConnectAccount($accountId);
	
	$sql = "SELECT * FROM Goals";
	$rows = $accountConnection->query($sql);
	
	$accountConnection->close();
	
	return $rows;
}

function getCollection($collectionName)
{
	$masterConnection = ConnectMaster();
	
	$sql = "SELECT * FROM $collectionName";
	$rows = $masterConnection->query($sql);
	
	$masterConnection->close();
	
	return $rows;
}

function numVerses($collection)
{
	$collectionName = "";
	if ($collection === "OldTestament")
		$collectionName = "Old Testament";
	elseif ($collection === "NewTestament")
		$collectionName = "New Testament";
	elseif ($collection === "BookOfMormon")
		$collectionName = "Book of Mormon";
	elseif ($collection === "DoctrineAndCovenants")
		$collectionName = "Doctrine and Covenants";
	elseif ($collection === "PearlOfGreatPrice")
		$collectionName = "Pearl of Great Price";
	else
		throw new Exception("$collection is not a valid collection");
	
	$masterConnection = ConnectMaster();
	
	$sql = "SELECT Verses FROM Collections ";
	$sql .= "WHERE Collection = N'$collectionName'";
	$rows = $masterConnection->query($sql);
	
	if ($row = $rows->fetch_assoc())
	{
		return $row["Verses"];
	}
	else
		throw new Exception("Collection $collection not found");
	
	$masterConnection->close();
}
?>