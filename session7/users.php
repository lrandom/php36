<?php
class Users
{

    private $conn;
    public function __construct()
    {
        //parent::__construct();
        //Do your magic here
    }

    public function getConnect()
    {
        $this->conn = mysqli_connect('localhost', 'root', 'koodinh', 'demo_php36_2') or die('Chui dong' . mysqli_connect_error($this->conn));
        return $this->conn;
    }

    public function getUser($username, $password)
    {
        $sql = 'SELECT * from `users` WHERE `username` = "' . $username . '" AND `pwd`="' . $password . '"';
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }

    public function updateUser($id, $phone, $password)
    {
        $sql = 'UPDATE users SET 
        `phone`="' . $phone . '" AND `pwd`="' . $password . '" 
        WHERE id=' . $id;
        mysql_query($this->conn, $sql);
        if (mysqli_affected_rows($this->conn) > 0) {
            // update success
            return 1;
        }
        // update failed
        return 0;
    }

    public function disconnect()
    {
        if ($this->conn != null)
            mysqli_close($this->conn);
    }

    public function logout()
    { }
}