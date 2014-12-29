<?php

include_once("dbconnect.inc.php");
$mysqli = new mysqli($host, $user, $password, $database);
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$uid = $_POST["uid"];
$email = $_POST["email"];

$ans = $_POST["answer"];

//echo $fname.$lname.$email.$ans;

$query = "select count(*) from UserProfile where FirstName='".$fname."' and LastName='".$lname."' and EmailID='".$email."' and Answer='".$ans."' and UserID='".$uid."'";
//echo $query;
$result = $mysqli->query($query);
$rowfetched = $result->fetch_row();
if($rowfetched[0]==0){
	echo "Sorry your credentials don't match. ";
	echo '<button onclick="window.history.back()">Try again</button>';
}
elseif($rowfetched[0]==1){
	$password = 
	$passwordretrievalquery = "select Password from UserProfile where UserID='".$uid."'";
	$resultpasswordretrieval = $mysqli->query($passwordretrievalquery);
	$pwdrowfetch = $resultpasswordretrieval->fetch_row();
	//echo "Your userid and pass word are ".$uid." ".$pwdrowfetch[0];
	//mail these password $pwdrowfetch[0] and userid $uid to the $email
	echo "Your password has been mailed to you. <a href='index.html'>Login Again</a>";
}


?>