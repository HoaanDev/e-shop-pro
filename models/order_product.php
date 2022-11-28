<?php 
class OrderProduct extends Db {
    public function insertOrderProduct($orderId, $productId, $quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO `order_product`(`order_id`, `product_id`, `quantity`) 
        VALUES (?, ?, ?)");
        $sql->bind_param("iii", $orderId, $productId, $quantity);
        $sql->execute();
    }
}