<?php
require_once "database.php";

function createAccount($firstname, $lastname, $email, $username, $password)
{
	$masterConnection = ConnectMaster();
	
	$date = date("Y-m-d h:i:s", time());
	$fullname = $firstname." ".$lastname;
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	$queryString =  "INSERT INTO Accounts ";
	$queryString .= "(Created, NameLast, NameFirst, NameFull, Email, Username, Password) ";
	$queryString .= "VALUES (?, ?, ?, ?, ?, ?, ?)";
	
	$sql = $masterConnection->prepare($queryString);
	$sql->bind_param("sssssss",
					 $date,
					 $lastname,
					 $firstname,
					 $fullname,
					 $email,
					 $username,
					 $hashed_password);
	$sql->execute();
	
	$accountId = $masterConnection->insert_id;
	$masterConnection->close();
	CreateAccountDb($accountId);
}

?>