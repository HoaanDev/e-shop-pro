<?php
session_start();
$id = $_GET['id'];
$type = $_GET['type'];
if ($type === 'decrea') {
    if ($_SESSION['cart'][$id] > 1) {
        $_SESSION['cart'][$id]--;
    } else {
        unset($_SESSION['cart'][$id]);
    }
} else {
    $_SESSION['cart'][$id]++;
}
header("Location: cart.php");
