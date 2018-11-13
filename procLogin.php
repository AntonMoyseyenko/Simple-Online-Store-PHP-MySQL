<?php
require("master.html");
require("securityClass.php");
$log = new security();
$log->connect();
$log->login($_POST['login_ID'],$_POST['user_Password']);
$log->close();
?>

