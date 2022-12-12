<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/customers.php";
if (isset($_GET['id'])) {
    $customer = new Customer;
    $customer->delCustomerById($_GET['id']);
    header("Location: customers_index.php");
}