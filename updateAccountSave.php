<?php
require("securityClass.php");
$upd = new security();
$upd->connect();
$upd->updatePassword($_POST['user_Password'],$_POST['login_ID']);
$upd->close();
?>