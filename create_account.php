<?php
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ScriptureTracker - Create Account</title>
	</head>
	<body>
		<h1>Create Account</h1>
		<form action="controllers/create_account.php" method="post">
			<label>First Name:<br />
				<input type="text" name="firstname" />
			</label>
			<br />
			<label>Last Name:<br />
				<input type="text" name="lastname" />
			</label>
			<br />
			<label>Email:<br />
				<input type="text" name="email" />
			</label>
			<br />
			<label>Username (optional):<br />
				<input type="text" name="username" />
			</label>
			<br />
			<label>Create Password:<br />
				<input type="password" name="password" />
			</label>
			<br />
			<label>Confirm Password:<br />
				<input type="password" name="confirm_password" />
			</label>
			<br /><br />
			<input type="submit" value="Create Account" />
		</form>
		<p>
			Back to <a href='login.php'>login</a>.
		</p>
	</body>
</html>