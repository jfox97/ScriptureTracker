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
	</head>
	<body>
		<h1>Scripture Tracker</h1>
		<?php
			foreach ($days as $day)
			{
				echo $day->get_goal_list();
			}
		?>
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
	</body>
</html>