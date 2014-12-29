<?php

include_once("dbconnect.inc.php");
$userid = $_POST["userid"];
$query = "select count(*) from UserProfile where UserID='".$userid."'";
$mysqli = new mysqli($host, $user, $password, $database);
$result = $mysqli->query($query);
$rowfetched = $result->fetch_row();

if($rowfetched[0]==0 || $rowfetched[0]=="0")
	echo "True";
else
	echo "False";

?>