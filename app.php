<?php

session_start();

if ((isset($_SESSION["loggedin"]) === false ) || ($_SESSION["loggedin"] === false))
{
	ob_start();
	header("Location: login.php");
	ob_end_flush();
	die();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Scripture Tracker</title>
	</head>
	<body>
		<h1>Scripture Tracker</h1>
		<div id="addGoalModal" class="modal">
		<h2>New Goal</h2>
			<form action="json/add_goal.php" method="post">
				Standard Work:<br />
				<input type="radio" name="collection" value="OldTestament" checked /> Old Testament<br />
				<input type="radio" name="collection" value="NewTestament" /> New Testament<br />
				<input type="radio" name="collection" value="BookOfMormon" /> Book of Mormon<br />
				<input type="radio" name="collection" value="DoctrineAndCovenants" /> Doctrine and Covenants<br />
				<input type="radio" name="collection" value="PearlOfGreatPrice" /> Pearl of Great Price<br />
				Start reading on <input type="date" name="start_date" /><br />
				Finish on <input type="date" name="end_date" /><br />
				<input type="submit" value="Add Goal" />
			</form>
		</div>
		<br />
		<?php 
		echo $_SESSION["loggedin"]."<br />";
		echo $_SESSION["accountId"]."<br />";
		echo $_SESSION["created"]."<br />";
		echo $_SESSION["nameLast"]."<br />";
		echo $_SESSION["nameFirst"]."<br />";
		echo $_SESSION["nameFull"]."<br />";
		echo $_SESSION["email"]."<br />";
		echo $_SESSION["username"]."<br />";
		?>
	</body>
</html>