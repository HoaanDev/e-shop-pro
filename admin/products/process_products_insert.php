<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/products.php";
if (isset($_POST['name']) && strlen(trim($_POST['name'], " ")) > 0) {
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
        $targetDir = "../../img/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $uploadOk = 1;
        $fileFake = "";
        $fileExists = "";
        $fileSize = "";
        $fileFormat = "";
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $fileFake = "Fake image";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            $fileExists = "File already exists";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $fileSize = "File is too large(>500KB)";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png") {
            $fileFormat = "Only JPG, PNG files are allowed";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            header("Location: products_insert.php?notice=Cannot upload image!" . $fileExists . ", " . $fileSize . ", " . $fileFormat . "," . $fileFake . ".");
        } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $product->insertProduct($productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productQty);
                header("Location: products_insert.php?notice=Add Successed!");
                exit;
            } else {
                header("Location: products_insert.php?notice=Error:" . $fileExists . ", " . $fileSize . ", " . $fileFormat . "," . $fileFake . ".");
            }
        }
    }
} else {
    header("Location: products_insert.php?notice=Have some field empty!");
}