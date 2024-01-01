<?php
session_start();

session_destroy();

session_start();
$_SESSION['login_error'];

header('location:index.php');
?>