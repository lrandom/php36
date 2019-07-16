<?php
class Connection
{

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host = 'localhost', $dbname = 'blogs', $username = 'root', $password = 'koodinh')
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
            return $this->pdo;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}