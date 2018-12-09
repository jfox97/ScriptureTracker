<?php
require_once(__DIR__ . '\..\models\app.php');

class day {
	private $name;
	private $goalStrings = [];
	
	function __contruct($name)
	{
		$this->name = $name;
	}
	
	function get_name()
	{
		return $this->name;
	}
	
	function set_name($name)
	{
		$this->name = $name;
	}
	
	function add_goal($goal)
	{
		array_push($this->goalStrings, $goal);
	}
	
	function get_goals()
	{
		return $this->goalStrings;
	}
	
	function get_goal_list()
	{
		$list = "<h3>$this->name</h3><ul>";
		foreach ($this->goalStrings as $goal)
		{
			$list .= "<li>$goal</li>";
		}
		$list .= "</ul>";
		return $list;
	}
}

class book {
	
	private $name;
	private $verses;
	private $chapters;
	
	function __construct($name, $verses, $chapters)
	{
		$this->name = $name;
		$this->verses = $verses;
		$this->chapters = $chapters;
	}
	
	function get_name()
	{
		return $this->name;
	}
	
	function get_verses()
	{
		return $this->verses;
	}
	
	function get_chapters()
	{
		return $this->chapters;
	}
	
	function get_verses_per_chapter()
	{
		return ceil($this->verses / $this->chapters);
	}
	
	function get_chapter($verses)
	{
		$versesPerChapter = $this->get_verses_per_chapter();
		if ($verses >= $this->verses)
			return $this->chapters;
		return ceil($verses / $versesPerChapter);
	}
}

function getWeeklyGoals()
{
	if ((isset($_SESSION["loggedin"]) === false ) || ($_SESSION["loggedin"] === false))
	{
		ob_start();
		header("Location: login.php");
		ob_end_flush();
		die();
	}
	
	$days = [];
	for ($i = 0; $i < 7; $i++)
	{
		$days[$i] = new day();
		$days[$i]->set_name("Day $i");
	}
	
	$accountId = $_SESSION["accountId"];
	$goals = getGoals($accountId);
	
	while ($goal = $goals->fetch_assoc())
	{
		if (strtotime(date("Y-m-d", time())) > strtotime($goal["EndDate"] . " + 1 days"))
			continue;
		if (strtotime(date("Y-m-d", time())) < strtotime($goal["StartDate"] . " - 8 days"))
			continue;
		
		$collectionName = $goal["StartScripture"];
		$totalVerses = numVerses($collectionName);
		
		$start = new DateTime(date("Y-m-d", strtotime($goal["StartDate"])));
		$end = new DateTime(date("Y-m-d", strtotime($goal["EndDate"])));
		$today = new DateTime(date("Y-m-d", time()));
		$goalDays = $end->diff($start)->format("%a") + 1;
		$daysPassed = $today->diff($start)->format("%a");
		if (strtotime(date("Y-m-d", time())) < strtotime($goal["StartDate"]))
			$daysPassed = -$daysPassed;
		$daysPassed--;
		$versesPerDay = ceil($totalVerses / $goalDays);
		
		$collection = getCollection($collectionName);
		
		$books = [];
		while ($row = $collection->fetch_assoc())
		{
			$book = new book($row["Book"], $row["Verses"], $row["Chapters"]);
			array_push($books, $book);
		}
		
		for ($i = 0; $i < 7; $i++)
		{
			$currentDay = $daysPassed + $i;
			$startVerse = $versesPerDay * $currentDay;
			$endVerse = $startVerse + $versesPerDay;
			if ($currentDay < 0)
				continue;
			if ($currentDay >= $goalDays)
				break;
			if ($endVerse > $totalVerses)
				$endVerse = $totalVerses;

			$verses = 0;
			$startBook = 0;
			$endBook = 0;
			while ($verses <= $startVerse)
			{
				$verses += $books[$startBook]->get_verses();
				$startBook++;
			}
			$startBook--;
			$passedVerses = $verses - $books[$startBook]->get_verses();
			$startVerse -= $passedVerses;

			$endBook = $startBook;
			while ($verses < $endVerse)
			{
				$endBook++;
				$verses += $books[$endBook]->get_verses();
			}
			$futurePassedVerses = $verses - $books[$endBook]->get_verses();
			$endVerse -= $futurePassedVerses;

			$startChapter = $books[$startBook]->get_chapter($startVerse) + 1;
			if ($startChapter > $books[$startBook]->get_chapters())
			{
				$startBook++;
				$startChapter = 1;
			}
			$endChapter = $books[$endBook]->get_chapter($endVerse);

			$goalString = $books[$startBook]->get_name() . ": $startChapter - ";
			$goalString .= $books[$endBook]->get_name() . ": $endChapter";
			$days[$i]->add_goal($goalString);
		}
	}
	
	return $days;
}
?>