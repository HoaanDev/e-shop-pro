<?php
class Manufacture extends Db
{
    public function getAllManufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
    public function getAllManuName()
    {
        $sql = self::$connection->prepare("SELECT manu_name FROM manufactures");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getManuById($manuId)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id = ?");
        $sql->bind_param("i", $manuId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function insertManufacture($manuName, $manuDesc)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`, `manu_desc`) 
        VALUES (?, ?)");
        $sql->bind_param("ss", $manuName, $manuDesc);
        $sql->execute();
    }

    public function editManufacture($manuId, $manuName, $manuDesc)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`= ?, `manu_desc`= ? WHERE `manu_id` = ?");
        $sql->bind_param("ssi", $manuName, $manuDesc, $manuId);
        $sql->execute();
    }

    public function deleteManufacture($manuId)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id` = ?");
        $sql->bind_param("i", $manuId);
        $sql->execute();
    }
}
