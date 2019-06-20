<?php
session_start();
if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
}

if (isset($_SESSION['mang'])) {
    $mang = $_SESSION['mang'];
    echo $mang[0];
    echo $mang[1];
}