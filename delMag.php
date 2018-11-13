<?php
require("magClass.php");
parse_str($_SERVER['QUERY_STRING']);
$mag=new magazines();
$mag->connect();
$mag->delMag($mag_id);
echo $mag_id;
$mag->close();
header("location:index.php");
?>