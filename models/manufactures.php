<?php
class Manufacture extends Db
{
    public function getAllManuName()
    {
        $sql = self::$connection->prepare("SELECT manu_name FROM manufactures");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
