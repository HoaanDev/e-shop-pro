<?php
session_start();
 require "config.php";
 require "./models/db.php";
 require "./models/customers.php";
if (isset($_POST['user-name'])) {
    $customerId = $_SESSION['customer'];
    $customerName = $_POST['user-name'];
    $customerEmail = $_POST['email'];
    $customer = new Customer;
    $customer->updateCustomerById($customerId, $customerName, $customerEmail);
    header("Location: user_profile.php?notice=Change Successed!");
} else {
    header("Location: user_profile.php?notice=Error!");
}
