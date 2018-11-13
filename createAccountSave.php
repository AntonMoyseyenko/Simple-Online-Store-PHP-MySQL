<?php
require("master.html");
require("securityClass.php");
$sec = new security();
$sec->connect();
$sec->addLogin($_POST['login_ID'],$_POST['user_Password'],$_POST['access']);
$sec->close();
?>