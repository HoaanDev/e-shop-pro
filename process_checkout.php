<?php
session_start();
require "config.php";
require "models/db.php";
require "models/products.php";
require "models/customers.php";
require "models/orders.php";
require "models/order_product.php";
if (!empty($_SESSION['customer'])) {
$nameReceive = $_POST['name_receive'];
$phoneNumber = $_POST['phone_number'];
$addressReceive = $_POST['address_receive'];

$cart = $_SESSION['cart'];
$product = new Products;
$products = $product->getAllProducts();
$totalPayMoney = 0;
$totalShippingFee = 0;
foreach ($cart as $cartID => $cartValue) {
    foreach ($products as $productId => $productValue) {
        if ($productValue['id'] == $cartID) {
            $totalShippingFee += ($cartValue * 20000);
            $totalPayMoney += ($cartValue * $productValue['price']);
        }
    }
}
$totalPayMoney += $totalShippingFee;
$customerId = $_SESSION['customer'];
$status = 0;
$order = new Order;
$order->insertOrder($customerId, $nameReceive, $phoneNumber, $addressReceive, $status, $totalPayMoney);

$order = new Order;
$orders = $order->getMaxOrderById($customerId);
$quantity = 0;
$orderProduct = new OrderProduct;
foreach ($cart as $cartID => $cartValue) {
    foreach ($orders as $key => $orderId) {
        $quantity += $cartValue;
        $orderProduct->insertOrderProduct($orderId['MAX(`id`)'], $cartID, $quantity);
    }
}
unset($_SESSION['cart']);
header("Location: cart.php");
} else {
    header("Location: signin.php?error=Sign In to checkout!");
}