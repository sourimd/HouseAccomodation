<?php

include_once("dbconnect.inc.php");

$userid = $_POST["userid"];
$pwd = $_POST["pwd"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$phno = $_POST["phno"];
$email = $_POST["email"];
$secqstn = $_POST["secqstn"];
$ans = $_POST["answer"];
//echo $userid.$pwd.$fname.$lname.$phno.$email.$secqstn.$ans;
$mysqli = new mysqli($host, $user, $password, $database);
$insertstmnt = "insert into UserProfile values('".$userid."','".$pwd."','".$email."','".$phno."','".$fname."','".$lname."','".$secqstn."','".$ans."')";
//echo $insertstmnt;
$mysqli->query($insertstmnt);
echo $mysqli->error;

$hashvalofuid = hash("md5",$userid);
$inserttohashtab = "insert into HashTab values('".$userid."','".$hashvalofuid."')";
$mysqli->query($inserttohashtab);
echo $mysqli->error;


//mail to new user
mail($email,"New User Welcome","Your user name->".$userid." and your password->".$pwd);

echo 'Your account has been created. To login with your new credentials
	  <a href="index.html">click here</a>';

?>