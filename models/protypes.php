<?php
class Prototype extends Db
{
    public function getAllPrototypeName()
    {
        $sql = self::$connection->prepare("SELECT type_name FROM prototypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
