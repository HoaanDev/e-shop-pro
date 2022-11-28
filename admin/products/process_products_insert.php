<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/products.php";
if (isset($_GET['name']) && strlen(trim($_GET['name'], " ")) > 0) {
    $productId = $_GET['id'];
    $productName = $_GET['name'];
    $productManuId = $_GET['manu_id'];
    $productTypeId = $_GET['type_id'];
    $productPrice = $_GET['price'];
    $productImgLink = $_GET['image'];
    $productDesc = $_GET['description'];
    $productFeature = $_GET['feature'];
    $productRating = $_GET['rating'];
    $productQty = $_GET['quantity'];
    $product = new Products;
    $products = $product->getAllProducts();
    $insertAvaible = false;
    foreach ($products as $productValue) {
        if ($productName == $productValue['name']) {
            $insertAvaible = false;
            header("Location: products_insert.php?notice=Already has this Product!");
            exit;
        } else {
            $insertAvaible = true;
        }
    }
    if ($insertAvaible == true) {
        $product->insertProduct($productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productRating, $productQty);
        header("Location: products_insert.php?notice=Add Successed!");
        exit;
    }
} else {
    header("Location: products_insert.php?notice=Have some field empty!");
}
