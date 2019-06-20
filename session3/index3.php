<?php
session_start();
if (isset($_SESSION['username'])) {
    //xoa theo key
    unset($_SESSION['username']);

    //xoa toan bo session
    session_destroy();
}