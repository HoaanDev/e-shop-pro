<?php
class Admin extends Db
{
    public function checkLoginAdmin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM admins WHERE `username` = ? AND `password`= ?");
        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        } else {
            return false;
        }
    }
}
