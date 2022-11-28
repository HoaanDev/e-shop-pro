<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/manufactures.php";
if (isset($_GET['manu_id']) && isset($_GET['manu_name']) && strlen(trim($_GET['manu_id'], " ")) > 0 && strlen(trim($_GET['manu_name'], " ")) > 0) {
    $manuId = $_GET['manu_id'];
    $manuName = $_GET['manu_name'];
    $manuDesc = $_GET['manu_desc'];
    $manufacture = new Manufacture;
    $manufactures = $manufacture->getAllManufactures();
    foreach ($manufactures as $manufactureValue) {
        if ($manuId == $manufactureValue['manu_id']) {
            $manufacture->editManufacture($manuId, $manuName, $manuDesc);
            header("Location: manufactures_edit.php?notice=Save Successed!");
            exit;
        }
    }
    
} else {
    header("Location: manufactures_edit.php?notice=Have some field empty!&manu_id=" . $_GET['manu_id']);
}
