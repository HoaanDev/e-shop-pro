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
    
}
