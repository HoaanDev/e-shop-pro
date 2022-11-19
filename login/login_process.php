<?php 
session_start();
require '../config.php';
require '../models/db.php';
require '../models/users.php';
$user = new User;
    if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($user->checkLogin($username,$password)) {
        $_SESSION['user'] = $username;
        header("Location: ../admin");
    } else {
        header("Location: login.php");
    }
}