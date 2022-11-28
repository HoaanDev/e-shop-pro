<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/products.php";
if (isset($_GET['id']) && isset($_GET['name']) && strlen(trim($_GET['id'], " ")) > 0 && strlen(trim($_GET['name'], " ")) > 0) {
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
    foreach ($products as $productValue) {
        if ($productId == $productValue['id']) {
            $product->editProduct($productId, $productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productRating, $productQty);
            header("Location: products_edit.php?notice=Save Successed!");
            exit;
        }
    }
    
} else {
    header("Location: products_edit.php?notice=Have some field empty!&id=" . $_GET['id']);
}