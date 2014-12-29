<?php

$uid = $_POST["userid"];
echo hash('md5', $uid);

?>