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
	
	$masterConnection->close();
	$masterConnection = ConnectMaster();
	
	$selectQuery = "SELECT AccountID FROM Accounts WHERE Email = '$email'";
	$result = $masterConnection->query($selectQuery);
	
	if ($row = $result->fetch_assoc())
	{
		$accountId = $row["AccountID"];
		$masterConnection->close();
		CreateAccountDb($accountId);
	}
	else
	{
		$masterConnection->close();
		throw new Exception("Account db creation failed");
	}
}

?>