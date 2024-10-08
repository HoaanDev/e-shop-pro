<?php
class Order extends Db
{
    public function insertOrder($customerId, $nameReceive, $phoneNumber, $addressReceive, $status, $totalPrice)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`customer_id`, `name_receive`, `phone_receive`, `address_receive`, `status`, `total_price`) 
        VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("isssid", $customerId, $nameReceive, $phoneNumber, $addressReceive, $status, $totalPrice);
        $sql->execute();
    }

    public function getMaxOrderById($customerId)
    {
        $sql = self::$connection->prepare("SELECT MAX(`id`) FROM `orders` WHERE `customer_id` = ?");
        $sql->bind_param("i", $customerId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAllOrders()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getOrderById($orderId)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `id` = ?");
        $sql->bind_param("i", $orderId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function editOrder($customerId, $nameReceive, $phoneNumber, $addressReceive, $status, $totalPrice)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`customer_id`, `name_receive`, `phone_receive`, `address_receive`, `status`, `total_price`) 
        VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("isssid", $customerId, $nameReceive, $phoneNumber, $addressReceive, $status, $totalPrice);
        $sql->execute();
    }

    public function deleteOrder($customerId, $nameReceive, $phoneNumber, $addressReceive, $status, $totalPrice)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`customer_id`, `name_receive`, `phone_receive`, `address_receive`, `status`, `total_price`) 
        VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("isssid", $customerId, $nameReceive, $phoneNumber, $addressReceive, $status, $totalPrice);
        $sql->execute();
    }

    public function updateOrderStatus($orderId, $statusValue)
    {
        $sql = self::$connection->prepare("UPDATE `orders` SET `status` = ? WHERE `id` = ? ");
        $sql->bind_param("ii", $statusValue, $orderId);
        $sql->execute();
    }

    public function getNewOrders($quantity)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `created_at` ORDER BY `created_at` DESC LIMIT ?");
        $sql->bind_param("i", $quantity);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getOrderByCustomerId($customerId, $productId) {
        $sql = self::$connection->prepare("SELECT * FROM `orders`, `order_product` WHERE `orders`.`id` = `order_product`.`order_id` AND `customer_id` = ? AND `product_id` = ?");
        $sql->bind_param("ii", $customerId, $productId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getOrderByCustomerId2($customerId) {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `customer_id` = ?");
        $sql->bind_param("i", $customerId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

}
