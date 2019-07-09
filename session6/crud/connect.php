<?php
$conn = mysqli_connect('localhost', 'root', 'koodinh', 'demo_session_8');
if (!$conn) {
    die('Connect error ' . mysqli_error($conn));
}