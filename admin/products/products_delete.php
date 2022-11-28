<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/products.php";
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = new Products;
    $product->deleteProduct($productId);
    header("Location: products_index.php");
    exit;
}