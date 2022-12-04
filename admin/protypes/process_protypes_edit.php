<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/protypes.php";
if (isset($_GET['type_id']) && isset($_GET['type_name']) && strlen(trim($_GET['type_id'], " ")) > 0 && strlen(trim($_GET['type_name'], " ")) > 0) {
    $protypeId = $_GET['type_id'];
    $protypeName = $_GET['type_name'];
    $protype = new Protype;
    $protypes = $protype->getAllProtypes();
    foreach ($protypes as $protypeValue) {
        if ($protypeId == $protypeValue['type_id']) {
            $protype->editProtype($protypeId, $protypeName);
            header("Location: protypes_edit.php?notice=Save Successed!");
            exit;
        }
    }
    
} else {
    header("Location: protypes_edit.php?notice=Have some field empty!&type_id=" . $_GET['type_id']);
}
