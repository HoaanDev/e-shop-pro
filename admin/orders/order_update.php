<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/orders.php";
if(isset($_GET['status']) && isset($_GET['id'])) {
    $orderId = $_GET['id'];
    $statusValue = $_GET['status'];
    $order = new Order;
    $order->updateOrderStatus($orderId, $statusValue);
    header("Location: ./orders_index.php");
}