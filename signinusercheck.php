<?php
include_once("dbconnect.inc.php");
$useridpwd = $_POST["useridpwd"];
$useridpwdsplit = explode("|",$useridpwd);
//echo $useridpwdsplit[0]."  ".$useridpwdsplit[1];
//echo "true";

$mysqli = new mysqli($host, $user, $password, $database);

$queryforuser =  "select count(*) from UserProfile where UserID='".$useridpwdsplit[0]."'";
$resultforuser = $mysqli->query($queryforuser);
$rowfetchedforuser = $resultforuser->fetch_row();

if($rowfetchedforuser[0]==0 || $rowfetchedforuser[0]=="0")
	$flagforuser=0;
else
	$flagforuser=1;

$query = "select count(*) from UserProfile where UserID='".$useridpwdsplit[0]."' and Password='".$useridpwdsplit[1]."'";
$result = $mysqli->query($query);
$rowfetched = $result->fetch_row();

if($rowfetched[0]==0 || $rowfetched[0]=="0")
	$flag=0;
else
	$flag=1;

if($flagforuser == 0)
	echo "UserNotExists";
elseif($flag == 0)
	echo "PasswordWrong";
else
	echo "true";

?>