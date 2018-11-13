<?php
class security
{
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "rmao8888";
    private $database = "dbMagazines";
    private $conn;

    public $login_ID;
    public $user_Password;
    public $access;


    function login($login_ID,$user_Password)
    {
        $sql="call spLogin('".$login_ID."','".$user_Password."');";
        $result=$this->conn->query($sql);
        $row=$result->fetch_assoc();
        if ($row["LoginStatus"]=='Invalid login')
        {
            session_start();
            session_destroy();
            echo "Invalid login";
            exit;
        }
        else
        {
            session_start();
            $_SESSION["login_ID"] = $login_ID;
            echo "Login OK";
            echo $_SESSION["login_ID"];
            exit;

        }
       
        $this->conn->query($sql);
        }

    function addLogin($login_ID,$user_Password,$access)
        {
        $sql = "call spCreateLogin ('".$login_ID."',
                            '".$user_Password."',
                            '".'u'."');";
        $result=$this->conn->query($sql);
        $row=$result->fetch_assoc();
        if ($row["LoginExists"]=='Exists')
            {
                echo "Exists";
            }
        else
            {
                echo "User Created";
            }
        $this->conn->query($sql);
       }

    function updatePassword($user_Password,$login_ID)
    {
        
        session_start();
        $sql = "call spUpdatePassword('".$user_Password."','".$_SESSION["login_ID"]."');";
        $this->connect();
        $result=$this->conn->query($sql);
        echo "Password updated"; 
          
        $this->close();
        
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