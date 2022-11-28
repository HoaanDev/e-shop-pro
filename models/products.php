<?php
class Products extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductByType_ID($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getNewProducts($quantity)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `created_at` ORDER BY `created_at` DESC LIMIT ?");
        $sql->bind_param("i", $quantity);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTopSellingProducts($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = ? AND `feature` = 1");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function search($keywords)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `name` LIKE ?");
        $keywords = "%$keywords%";
        $sql->bind_param("s", $keywords);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function searchLimit($keywords, $page, $perPage)
    {
        $firstPage = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `name` LIKE ? LIMIT $firstPage, $perPage");
        $keywords = "%$keywords%";
        $sql->bind_param("s", $keywords);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function paginate($url, $total, $perPage, $keywords)
    {
        $totalPages = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalPages; $j++) {
            $link = $link . "<a href='$url?page=$j&keyword=$keywords'> $j </a>";
        }
        return $link;
    }

    public function insertProduct($productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productRating, $productQty)
    {
        $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `rating`, `quantity`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("siiissiii", $productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productRating, $productQty);
        $sql->execute();
    }

    public function editProduct($productId, $productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productRating, $productQty)
    {
        $sql = self::$connection->prepare("UPDATE `products` SET `name`= ?,`manu_id`= ?,`type_id`= ?,`price`= ?,`image`= ?,`description`= ?,`feature`= ?,`rating`= ?,`quantity`= ? WHERE `id` = ?");
        $sql->bind_param("siiissiiii", $productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productRating, $productQty, $productId);
        $sql->execute();
    }

    public function deleteProduct($productId)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id` = ?");
        $sql->bind_param("i", $productId);
        $sql->execute();
    }
}
