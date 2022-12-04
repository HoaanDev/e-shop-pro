<?php
class Protype extends Db
{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAllPrototypeName()
    {
        $sql = self::$connection->prepare("SELECT type_name FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProtypeById($typeId)
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE `type_id` = ?");
        $sql->bind_param("i", $typeId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function insertProtype($protypeName)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_name`) 
        VALUES (?)");
        $sql->bind_param("s", $protypeName);
        $sql->execute();
    }

    public function editProtype($protypeId, $protypeName)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`= ? WHERE `type_id` = ?");
        $sql->bind_param("si", $protypeName, $protypeId);
        $sql->execute();
    }

    public function deleteProtype($protypeId)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id` = ?");
        $sql->bind_param("i", $protypeId);
        $sql->execute();
    }
}
