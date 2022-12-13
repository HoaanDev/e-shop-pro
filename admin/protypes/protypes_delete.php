<?php
require "../../config.php";
require "../../models/db.php";
require "../../models/protypes.php";
if (isset($_GET['type_id'])) {
    $protypeId = $_GET['type_id'];
    $protype = new Protype;
    header("Location: protypes_index.php");
    $protype->deleteProtype($protypeId);
    exit;
}
