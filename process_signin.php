<?php
session_start();
require 'config.php';
require 'models/db.php';
require 'models/customers.php';
$customer = new Customer;
if (isset($_POST['email'])) {
    $id;
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($customer->checkLoginCustomer($email, $password)) {
        $customers = $customer->getAllCustomers();
        foreach ($customers as $customerId => $value) {
            if ($value['email'] == $email) {
                $id = $value['id'];
            }
        }
        $_SESSION['customer'] = $id;
        header("Location: index.php");
    } else {
        header("Location: signin.php?error=Incorret Email or Password!");
    }
}
