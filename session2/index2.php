<?php
session_start();
$_SESSION['a'] = 'a';
echo $_SESSION['a'];