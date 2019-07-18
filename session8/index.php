<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=demophp36_1", "root", "koodinh");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction();
    $pdo->exec('INSERT INTO user(name,phone,address) VALUES("A","B","C")');
    $pdo->exec('INSERT INTO user(name,phone,address) VALUES("A","B","C")');
    $pdo->exec('INSERT INTO user(name,phone,address) VALUES("A","B","C")');
    $pdo->exec('INSERT INTO user(name,phone,address) VALUES("A","B","C")');
    $pdo->exec('INSERT INTO user(name,phone,address) VALUES("A","B","C")');
    $pdo->commit();
} catch (Exception $e) {
    echo $e->getMessage();
    $pdo->rollBack();
}

include 'A.php';
include 'Aa.php';

use MyA\A as Aa;
use MyAA\A as AB;

$a = new Aa();
$b = new AB();