<?php
require("master.html");
require("magClass.php");
$target_directory = "Pictures/";
$target_file = $target_directory . basename($_FILES["path"]["name"]);
echo $target_file;
$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["path"]["tmp_name"],$target_file))
        {
            echo "File Uploaded";
            $mag=new magazines();
            $mag->connect();
            $mag->addMag($_POST['MagName'],$_POST['MagDescription'],$_POST["MagPrice"],$target_file);
            $mag->close();
            header("location:index.php");
        }
        else
        {
            echo "Adding Failed";
        }
?>