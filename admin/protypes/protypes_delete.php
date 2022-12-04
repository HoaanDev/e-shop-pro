<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/protypes.php";
if (isset($_GET['type_id'])) {
    $protypeId = $_GET['type_id'];
    $protype = new Protype;
    $protype->deleteProtype($protypeId);
    header("Location: protypes_index.php");
    exit;
}