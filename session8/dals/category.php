<?php

require_once 'IDAL.php';
require_once 'connection.php';
class Category implements IDAL
{
    private $pdo;
    const TABLE_NAME = 'category';
    const COL_ID = 'id';
    const COL_NAME = 'name';


    public function __construct()
    {
        $conn = new Connection();
        $this->pdo = $conn->connect();
    }


    public function getAll()
    {

        $rs = $this->pdo->query('SELECT * from ' . self::TABLE_NAME);
        return $rs;
    }

    public function insert($arr)
    {

        $query = 'INSERT INTO ' . self::TABLE_NAME .
            '(' . self::COL_NAME . ') VALUES(?)';
        $stm = $this->pdo->prepare($query);
        $stm->execute($arr);
    }

    public function update($id, $arr)
    {
        $query = 'UPDATE ' . self::TABLE_NAME .
            ' SET ' . self::COL_NAME .
            'WHERE ' . self::COL_ID . '=' . $id;
        $stm = $this->pdo->prepare($query);
        $stm->execute($arr);
    }

    public function delete($id)
    {
        $this->pdo->exec('DELETE ' . self::TABLE_NAME . ' WHERE id=' . $id);
    }
}