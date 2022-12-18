<?php
class Customer extends Db
{
    public function checkLoginCustomer($email, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM customers WHERE `email` = ? AND `password`= ?");
        $password = md5($password);
        $sql->bind_param("ss", $email, $password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailExisted($email)
    {
        $sql = self::$connection->prepare("SELECT * FROM `customers` WHERE `email` LIKE ?");
        $email = "%$email%";
        $sql->bind_param("s", $email);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function signUpAccount($name, $email, $password)
    {
        $sql = self::$connection->prepare("INSERT INTO `customers`(`name`, `email`, `password`) 
        VALUES (? , ? , ? )");
        $password = md5($password);
        $sql->bind_param("sss", $name, $email, $password);
        $sql->execute();
    }

    public function getAllCustomers()
    {
        $sql = self::$connection->prepare("SELECT * FROM `customers`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getCustomerById($customerId)
    {
        $sql = self::$connection->prepare("SELECT * FROM `customers` WHERE `id` = ?");
        $sql->bind_param("i", $customerId);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getNewCustomers($quantity)
    {
        $sql = self::$connection->prepare("SELECT * FROM `customers` WHERE `created_at` ORDER BY `created_at` DESC LIMIT ?");
        $sql->bind_param("i", $quantity);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function delCustomerById($customerId)
    {
        $sql = self::$connection->prepare("DELETE FROM `customers` WHERE `id` = ?");
        $sql->bind_param("i", $customerId);
        $sql->execute();
    }

    public function updateCustomerById($customerId, $customerName, $customerEmail)
    {
        $sql = self::$connection->prepare("UPDATE `customers` SET `name`= ?,`email`= ? WHERE `id` = ?");
        $sql->bind_param("ssi", $customerName, $customerEmail, $customerId);
        $sql->execute();
    }
}
