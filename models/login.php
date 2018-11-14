<?php
require_once "database.php";

function redirectToLogin($errorCode)
{
	ob_start();
	header("Location: ../login.php?error=$errorCode");
	ob_end_flush();
	die();
}

function login($username, $password, $isEmail)
{
	$masterConnection = ConnectMaster();
	
	$queryString = "SELECT * FROM Accounts WHERE ";
	if ($isEmail)
		$queryString .= "Email = ?";
	else
		$queryString .= "Username = ?";
	
	$sql = $masterConnection->prepare($queryString);
	$sql->bind_param("s", $username);
	
	if ($sql->execute())
	{
		$sql->store_result();
		
		if ($sql->num_rows == 1)
		{
			$sql->bind_result($accountId, $created, $nameLast, $nameFirst, $nameFull, $email, $tableUsername, $hashedPassword);
			if ($sql->fetch())
			{
				if (password_verify($password, $hashedPassword))
				{
					session_start();
					
					$_SESSION["loggedin"] = true;
					$_SESSION["accountId"] = $accountId;
					$_SESSION["created"] = $created;
					$_SESSION["nameLast"] = $nameLast;
					$_SESSION["nameFirst"] = $nameFirst;
					$_SESSION["nameFull"] = $nameFull;
					$_SESSION["email"] = $email;
					$_SESSION["username"] = $tableUsername;
					
					$masterConnection->close();
					return;
				}
				else
				{
					$masterConnection->close();
					redirectToLogin("incorrect_password");
				}
			}
		}
		else
		{
			$masterConnection->close();
			redirectToLogin("no_account_found");
		}
	}
	else
	{
		$masterConnection->close();
		redirectToLogin("connection_failed");
	}
	
	$masterConnection->close();
	redirectToLogin("connection_failed");
}
?>