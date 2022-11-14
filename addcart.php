<?php session_start();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if (empty($_SESSION['cart'])) {
		$_SESSION['cart'][$id] = 1;
	} else {
		if (!empty($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]++;
		} else {
			$_SESSION['cart'][$id] = 1;
		}
	}
}
header("Location: cart.php");
