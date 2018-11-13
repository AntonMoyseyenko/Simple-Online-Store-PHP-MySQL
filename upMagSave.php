<?php
$mag_name = $_POST['MagName'];
$mag_description = $_POST['MagDescription'];
$mag_price = $_POST['MagPrice'];
$mag_id = $_POST['MagID'];
require("master.html");
require("magClass.php");
$target_directory = "Pictures/";
$target_file = $target_directory . basename($_FILES["path"]["name"]);
echo $target_file;
$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["path"]["tmp_name"],$target_file))
         {
             $mag=new magazines();
             $mag->connect();
             $mag->upMag($mag_name,$mag_description,$mag_price,$target_file,$mag_id);
             $mag->close();
             header("location:index.php");
         }
         else
         {
             echo "Update Failed";
         }
?>