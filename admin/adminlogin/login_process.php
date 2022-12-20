<?php
session_start();
require '../../config.php';
require '../../models/db.php';
require '../../models/admins.php';
$user = new Admin;
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($user->checkLoginAdmin($username, $password)) {
        $_SESSION['admin'] = $username;
        header("Location: ../root/dashboard.php");
    } else {
        header("Location: login.php");
    }
}
