<?php
interface IDAL
{
    public function getAll();
    public function insert($arr);
    public function update($id, $arr);
    public function delete($id);
}