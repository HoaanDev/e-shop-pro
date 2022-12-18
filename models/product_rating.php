<?php 
class ProductRating extends Db {
    public function insertProductRating($productId, $customerId, $rating, $review)
    {
        $sql = self::$connection->prepare("INSERT INTO `product_rating`(`product_id`, `customer_id`, `rating`, `review`) 
        VALUES (?, ?, ?, ?)");
        $sql->bind_param("iiis", $productId, $customerId, $rating, $review);
        $sql->execute();
    }

    public function getProductRatingById($productId)
    {
        $sql = self::$connection->prepare("SELECT * FROM `product_rating` WHERE `product_id` = ? ORDER BY created_at DESC");
        $sql->bind_param("i", $productId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductRatingAVGById($productId)
    {
        $sql = self::$connection->prepare("SELECT ROUND(AVG(`rating`), 1) FROM `product_rating` WHERE `product_id` = ?");
        $sql->bind_param("i", $productId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}