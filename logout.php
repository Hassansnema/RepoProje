<?php
session_start();

    include_once('conn.php');
    session_unset();
    session_destroy();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}




?>