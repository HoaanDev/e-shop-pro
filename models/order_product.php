<?php 
class OrderProduct extends Db {
    public function insertOrderProduct($orderId, $productId, $quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO `order_product`(`order_id`, `product_id`, `quantity`) 
        VALUES (?, ?, ?)");
        $sql->bind_param("iii", $orderId, $productId, $quantity);
        $sql->execute();
    }

    public function getOrderProductById($orderId)
    {
        $sql = self::$connection->prepare("SELECT * FROM `order_product` WHERE `order_id` = ?");
        $sql->bind_param("i", $orderId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}