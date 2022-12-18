<?php
require "config.php";
require "./models/db.php";
require "./models/orders.php";
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $status = $_GET['status'];
    $order = new Order;
    $order->updateOrderStatus($orderId, $status);
    header("Location: user_profile.php");
} else {
    header("Location: user_profile.php");
}
