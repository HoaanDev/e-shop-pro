<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/manufactures.php";
if (isset($_GET['manu_name']) && strlen(trim($_GET['manu_name'], " ")) > 0) {
    $manuName = $_GET['manu_name'];
    $manuDesc = $_GET['manu_desc'];
    $manufacture = new Manufacture;
    $manufactures = $manufacture->getAllManufactures();
    $insertAvailable = false;
    foreach ($manufactures as $manufactureValue) {
        if ($manuName == $manufactureValue['manu_name']) {
            $insertAvailable = false;
            header("Location: manufactures_insert.php?notice=Already has this Manufacture!");
            exit;
        } else {
            $insertAvailable = true;
        }
    }
    if ($insertAvailable == true) {
        $manufacture->insertManufacture($manuName, $manuDesc);
        header("Location: manufactures_insert.php?notice=Add Successed!");
    }
} else {
    header("Location: manufactures_insert.php?notice=Have some field empty!");
}
