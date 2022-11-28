<?php
session_start();
require "config.php";
require "models/db.php";
require "models/customers.php";
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$customer = new Customer;
$emailExisteds = $customer->checkEmailExisted($email);
if (count($emailExisteds) > 0) {
    header("Location: signup.php?error=Email was existed!");
} else {
    $customer->signUpAccount($name, $email, $password);
    header("Location: signin.php");
}