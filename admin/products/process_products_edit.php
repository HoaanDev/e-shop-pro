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
    $newImg = $_FILES['image'];
    $productImgLink = "";
    if ($newImg['size'] > 0) {
        $productImgLink = $_FILES['image']['name'];
    } else {
        $productImgLink = $_POST['image_old'];
    }
    $productDesc = $_POST['description'];
    $productFeature = $_POST['feature'];
    $productQty = $_POST['quantity'];
    $product = new Products;
    $products = $product->getAllProducts();
    foreach ($products as $productValue) {
        if ($productId == $productValue['id']) {
            if ($productImgLink == $_POST['image_old']) {
                $product->editProduct($productId, $productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productQty);
                header("Location: products_edit.php?notice=Save Successed!");
                exit;
            } else if ($productImgLink == $_FILES['image']['name']) {
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
                        $product->editProduct($productId, $productName, $productManuId, $productTypeId, $productPrice, $productImgLink, $productDesc, $productFeature, $productQty);
                        header("Location: products_insert.php?notice=Edit Successed!");
                        exit;
                    } else {
                        header("Location: products_insert.php?notice=Error:" . $fileExists . ", " . $fileSize . ", " . $fileFormat . "," . $fileFake . ".");
                    }
                }
            }
        }
    }
} else {
    header("Location: products_edit.php?notice=Have some field empty!&id=" . $_GET['id']);
}
