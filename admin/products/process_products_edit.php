<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/products.php";
if (isset($_POST['id']) && isset($_POST['name']) && strlen(trim($_POST['id'], " ")) > 0 && strlen(trim($_POST['name'], " ")) > 0) {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productManuId = $_POST['manu_id'];
    $productTypeId = $_POST['type_id'];
    $productPrice = $_POST['price'];
    $productImgLink = $_FILES['image']['name'];
    $productDesc = $_POST['description'];
    $productFeature = $_POST['feature'];
    $productQty = $_POST['quantity'];
    $product = new Products;
    $products = $product->getAllProducts();
    foreach ($products as $productValue) {
        if ($productId == $productValue['id']) {
            $product->editProduct($productId, $productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productQty);
            $targetDir = "../../img/";
            $targetFile = $targetDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            header("Location: products_edit.php?notice=Save Successed!");
            exit;
        }
    }
} else {
    header("Location: products_edit.php?notice=Have some field empty!&id=" . $_GET['id']);
}
