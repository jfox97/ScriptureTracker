<?php
session_start();

if ((isset($_SESSION["loggedin"]) === false ) || ($_SESSION["loggedin"] === false))
{
	ob_start();
	header("Location: login.php");
	ob_end_flush();
	die();
}

require_once "controllers/app.php";
$days = getWeeklyGoals();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Scripture Tracker</title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,500">
		<link rel="stylesheet" type="text/css" href="css/app.css">
	</head>
	<body>
		<h1>Scripture Tracker</h1>
		<div id="goal_track">
			<?php
				foreach ($days as $day)
				{
					echo "<div class='dayList'>";
					echo $day->get_goal_list();
					echo "</div>";
				}
			?>
			<div id="new_goal_container">
				<button id="new_goal_button">New Goal</button>
			</div>
		</div>
		<div id="add_goal_modal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<h2>New Goal</h2>
				<form action="json/add_goal.php" onsubmit="return validate()" method="post">
					Standard Work:<br />
					<input type="radio" name="collection" value="OldTestament" checked /> Old Testament<br />
					<input type="radio" name="collection" value="NewTestament" /> New Testament<br />
					<input type="radio" name="collection" value="BookOfMormon" /> Book of Mormon<br />
					<input type="radio" name="collection" value="DoctrineAndCovenants" /> Doctrine and Covenants<br />
					<input type="radio" name="collection" value="PearlOfGreatPrice" /> Pearl of Great Price<br /><br />
					Start reading on:<br /><input type="date" name="start_date" /><br />
					Finish on:<br /><input type="date" name="end_date" /><br /><br />
					<input type="submit" value="Add Goal" />
				</form>
			</div>
		</div>
		<script type="text/javascript" src="javascript/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="javascript/app.js"></script>
	</body>
</html>