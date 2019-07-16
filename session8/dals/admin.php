<?php
require_once 'IDAL.php';
require_once 'connection.php';

class Admin implements IDAL
{
    private $pdo;
    const TABLE_NAME = 'admin';
    const COL_ID = 'id';
    const COL_USERNAME = 'username';
    const COL_PWD = 'pwd';
    const COL_EMAIL = 'email';
    const COL_FULLNAME = 'fullname';

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
            '(' . self::COL_USERNAME .
            ', ' . self::COL_PWD .
            ',' . self::COL_EMAIL .
            ',' . self::COL_FULLNAME . ') VALUES(?,?,?,?)';
        $stm = $this->pdo->prepare($query);
        $stm->execute($arr);
    }

    public function update($id, $arr)
    {
        $query = 'UPDATE ' . self::TABLE_NAME .
            ' SET ' . self::COL_USERNAME .
            '=? AND '
            . self::COL_EMAIL . '=?' . ' AND '
            . self::COL_FULLNAME . '=? WHERE ' . self::COL_ID . '=' . $id;
        $stm = $this->pdo->prepare($query);
        $stm->execute($arr);
    }

    public function delete($id)
    {
        $this->pdo->exec('DELETE ' . self::TABLE_NAME . ' WHERE id=' . $id);
    }
}