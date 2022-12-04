<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/products.php";
if (isset($_POST['name']) && strlen(trim($_POST['name'], " ")) > 0) {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productManuId = $_POST['manu_id'];
    $productTypeId = $_POST['type_id'];
    $productPrice = $_POST['price'];
    $productImgLink = $_FILES['image']['name'];
    $productDesc = $_POST['description'];
    $productFeature = $_POST['feature'];
    $productRating = 0;
    $productQty = $_POST['quantity'];
    $product = new Products;
    $products = $product->getAllProducts();
    $insertAvailable = false;
    foreach ($products as $productValue) {
        if ($productName == $productValue['name']) {
            $insertAvailable = false;
            header("Location: products_insert.php?notice=Already has this Product!");
            exit;
        } else {
            $insertAvailable = true;
        }
    }
    if ($insertAvailable == true) {
        $product->insertProduct($productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productRating, $productQty);
        $targetDir = "../../img/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        header("Location: products_insert.php?notice=Add Successed!");
        exit;
    }
} else {
    header("Location: products_insert.php?notice=Have some field empty!");
}
