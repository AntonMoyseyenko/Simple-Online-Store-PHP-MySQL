<?php

class magazines
{
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "rmao8888";
    private $database = "dbMagazines";
    private $conn;

    public $mag_id;
    public $mag_name;
    public $mag_description;
    public $mag_price;
    public $path;
    public $cart_id;
   
    function addMag($mag_name,$mag_description,$mag_price,$path)
    {
    $sql = "call spMagAdd ('".$mag_name."',
                        '".$mag_description."',
                        '".$mag_price."',
                        '".$path."');";
    $this->conn->query($sql);

    }


    function readMag()
    {
        $sql="call spMagRead;";
        $this->connect();
        $result=$this->conn->query($sql);
        while($row=$result->fetch_assoc())
        {
            
            echo '<div class="pictures">';
            echo '<img src="'.$row["MagPicture"].'">';
            echo '<br /><a href="delMag.php?mag_id='.$row["MagID"].'">delete<a/>';
            echo '<br /><a href="upMag.php?mag_id='.$row["MagID"].
            '&mag_name='.$row["MagName"].'&mag_description='.$row["MagDescription"].'&mag_price='.$row["MagPrice"].'">update<a/>';
            echo "<br/>".$row["MagName"];
            echo "<br/>".$row["MagDescription"];
            echo "<br/>".$row["MagPrice"];
              
            echo "</div>";
        }
        $this->close();
    }

    function delMag($mag_id)
    {
        $sql="call spMagDelete(".$mag_id.");";
        $this->conn->query($sql);
    }

    function upMag($mag_name,$mag_description,$mag_price,$path,$mag_id)
    {
        $sql="call spMagUpdate('".$mag_name."',
                            '".$mag_description."',
                            '".$mag_price."',
                            '".$path ."',
                            ".$mag_id.");";
        $this->conn->query($sql);
    }

    
    function connect()
    {
        $this->conn=new mysqli($this->serverName,
                            $this->userName,
                            $this->password,
                            $this->database);

        if ($this->conn->connect_error)
        {
            die ("Connection failed. ".$conn->connect_error);
        }
    }

    function close()
    {
        $this->conn->close();
    }

}
?>
