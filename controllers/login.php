<?php
require_once "../models/login.php";

$username = $_POST["username"];
$password = $_POST["password"];
$isEmail = (strpos($username, "@") !== false);

login($username, $password, $isEmail);
?>