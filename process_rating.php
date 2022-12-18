<?php
require "config.php";
require "./models/db.php";
require "./models/product_rating.php";
if (isset($_POST['rating'])) {
    $productId = $_POST['product_id'];
    $customerId = $_POST['customer_id'];
    $radioVal = $_POST['rating'];
    $review = $_POST['review'];
    $productRating = new ProductRating;
    $productsRating = $productRating->getProductRatingById($productId);
    if (count($productsRating) > 0) {
        foreach ($productsRating as $productRatingValue) {
            if ($productRatingValue['customer_id'] == $customerId) {
                header("Location: product.php?id=$productId&notice=You already review this product!");
                exit;
            } else {
                $productRating->insertProductRating($productId, $customerId, $radioVal, $review);
                header("Location: product.php?id=$productId&notice=Review successed!");
                exit;
            }
        }
    } else {
        $productRating->insertProductRating($productId, $customerId, $radioVal, $review);
        header("Location: product.php?id=$productId&notice=Review successed!");
    }
}
