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
			<?php
				if (isset($_GET["user_exists"]))
				{
					echo "<span id='error'>User already exists</span>";
				}
			?>
			<form action="controllers/create_account.php" onsubmit="return validate()" method="post">
				<input type="text" 
					   name="firstname"
					   placeholder="First Name"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='First Name'"/>
				<div class="error hidden" id="firstname">
					*First Name is required
				</div>
				<input type="text" 
					   name="lastname"
					   placeholder="Last Name"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Last Name'"/>
				<div class="error hidden" id="lastname">
					*Last Name is required
				</div>
				<input type="text" 
					   name="email"
					   placeholder="Email"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Email'"/>
				<div class="error hidden" id="email">
					*Please input valid email
				</div>
				<input type="text" 
					   name="username"
					   placeholder="Username (optional)"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Username (optional)'"/>
				<div class="error hidden" id="username">
					Username is taken
				</div>
				<div class="confirmation hidden">
					Username is good!
				</div>
				<input type="password" 
					   name="password"
					   placeholder="Password"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Password'"/>
				<div class="error hidden" id="password">
					*Password is required
				</div>
				<input type="password" 
					   name="confirm_password"
					   placeholder="Confirm Password"
					   onfocus="this.placeholder=''"
					   onblur="this.placeholder='Confirm Password'"/>
				<div class="error hidden" id="confirm_password">
					*Passwords must match
				</div>
				<input type="submit" 
					   value="Create Account" />
			</form>
			<p>
				<a href='login.php'>Back to login</a>
			</p>
		</div>
		<script type="text/javascript" src="javascript/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="javascript/create_account.js"></script>
	</body>
</html>