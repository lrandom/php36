<?php

require_once 'IDAL.php';
require_once 'connection.php';
class Posts implements IDAL
{
    private $pdo;
    const TABLE_NAME = 'post';
    const COL_ID = 'id';
    const COL_TITLE = 'title';
    const COL_CONTENT = 'content';
    const COL_DESC = 'description';
    const COL_KEYWORD = 'keyword';
    const COL_ID_ADMIN = 'id_admin';
    const COL_ID_CATEGORY = 'id_category';

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

        $query = 'INSERT INTO ' . self::TABLE_NAME . '(' . self::COL_TITLE .
            ',' . self::COL_CONTENT . ',' . self::COL_DESC .
            ',' . self::COL_KEYWORD .
            ',' . self::COL_ID_ADMIN . ',' . self::COL_ID_CATEGORY . ') VALUES(?,?,?,?,?,?)';
        $stm = $this->pdo->prepare($query);
        $stm->execute($arr);
    }

    public function update($id, $arr)
    {
        $query = 'UPDATE ' . self::TABLE_NAME .
            ' SET ' . self::COL_TITLE .
            '=? AND '
            . self::COL_CONTENT . '=?' . ' AND '
            . self::COL_DESC . '=? AND ' . self::COL_KEYWORD . '=? 
            AND ' . self::COL_ID_ADMIN . '=? AND ' . self::COL_ID_CATEGORY . '=?
            WHERE ' . self::COL_ID . '=' . $id;
        $stm = $this->pdo->prepare($query);
        $stm->execute($arr);
    }

    public function delete($id)
    {
        $this->pdo->exec('DELETE ' . self::TABLE_NAME . ' WHERE id=' . $id);
    }
}