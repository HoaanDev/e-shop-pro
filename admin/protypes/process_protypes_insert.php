<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/protypes.php";
if (isset($_GET['type_name']) && strlen(trim($_GET['type_name'], " ")) > 0) {
    $typeName = $_GET['type_name'];
    $protype = new Protype;
    $protypes = $protype->getAllProtypes();
    $insertAvailable = false;
    foreach ($protypes as $protypeValue) {
        if ($typeName == $protypeValue['type_name']) {
            $insertAvailable = false;
            header("Location: protypes_insert.php?notice=Already has this Manufacture!");
            exit;
        } else {
            $insertAvailable = true;
        }
    }
    if ($insertAvailable == true) {
        $protype->insertProtype($typeName);
        header("Location: protypes_insert.php?notice=Add Successed!");
    }
} else {
    header("Location: protypes_insert.php?notice=Have some field empty!");
}