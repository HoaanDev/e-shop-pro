<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/manufactures.php";
if (isset($_GET['manu_id'])) {
    $manuId = $_GET['manu_id'];
    $manufacture = new Manufacture;
    $manufacture->deleteManufacture($manuId);
    header("Location: manufactures_index.php");
    exit;
}