<?php
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Scripture Tracker - Create Account</title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,500">
		<link rel="stylesheet" type="text/css" href="css/create_account.css">
	</head>
	<body>
		<div id="create_account_widget">
			<h1>Create Account</h1>
			<form action="controllers/create_account.php" method="post">
				<input type="text" 
					   name="firstname"
					   placeholder="First Name"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='First Name'"/>
				<input type="text" 
					   name="lastname"
					   placeholder="Last Name"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Last Name'"/>
				<input type="text" 
					   name="email"
					   placeholder="Email"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Email'"/>
				<input type="text" 
					   name="username"
					   placeholder="Username (optional)"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Username (optional)'"/>
				<input type="password" 
					   name="password"
					   placeholder="Password"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Password'"/>
				<input type="password" 
					   name="confirm_password"
					   placeholder="Confirm Password"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Confirm Password'"/>
				<input type="submit" 
					   value="Create Account" />
			</form>
			<p>
				<a href='login.php'>Back to login</a>
			</p>
		</div>
	</body>
</html>