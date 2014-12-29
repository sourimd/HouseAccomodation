<?php
include_once("dbconnect.inc.php");
$userid = $_POST["userid"];

$mysqli = new mysqli($host, $user, $password, $database);

$query = "select SecurityQuestion from UserProfile where UserID='".$userid."'";
$result = $mysqli->query($query);
$rowfetched = $result->fetch_row();

echo $rowfetched[0];


?>