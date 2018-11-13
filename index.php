<html>
<title>Magazines</title>
<head>
<body>
     <?php
        require("master.html");
        require("magClass.php");
        $mag=new magazines();
        $mag->readMag();
        ?>
</body>
</html>