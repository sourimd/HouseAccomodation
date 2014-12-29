<?php
$to="sourimd@clemson.edu";
$subject="Test mail";
$body="Test mail";
if(mail($to,$subject,$body))
	echo "Mail Send";
else
	echo "Error";

?>