<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-Shop Checkout</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="./css/slick.css" />
	<link type="text/css" rel="stylesheet" href="./css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="./css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="./css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="./css/style.css" />
</head>

<body>
	<!-- Begin Header -->
	<?php
	// Import Header
	require "sources/header.php";
	?>
	<!-- End Header -->

	<!-- SECTION -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
						<form action="process_checkout.php" method="post">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name_receive" placeholder="Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="phone_number" placeholder="Phone Number">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address_receive" placeholder="Address">
							</div>
						</div>
						<!-- /Billing Details -->
						<!-- Order Details -->
						<?php
						if (isset($_SESSION['cart'])) :
							$totalPayMoney = 0;
							$totalPrice = 0;
							$totalQty = 0;
							$cart = $_SESSION['cart'];
							$product = new Products;

						?>
							<div class="section-title text-center">
								<h3 class="title">Your Order</h3>
							</div>
							<div class="order-summary">
								<div class="order-col">
									<div><strong>PRODUCT</strong></div>
									<div><strong>TOTAL</strong></div>
								</div>
								<div class="order-products">
									<?php foreach ($cart as $cartID => $cartValue) {
										$products = $product->getProductById($cartID);
										foreach ($products as $productValue) {
											if ($productValue['id'] == $cartID) { ?>
												<div class="order-col">
													<div><?php $totalQty += $_SESSION['cart'][$cartID];
															echo $_SESSION['cart'][$cartID] ?>x <?php echo $productValue['name'] ?></div>
													<div><?php
															$price = 0;
															$price = $_SESSION['cart'][$cartID] * $productValue['price'];
															$totalPrice = $totalPrice + $_SESSION['cart'][$cartID] * $productValue['price'];
															echo number_format($price);
															?>₫</div>
												</div>
									<?php }
										}
									} ?>
								</div>
								<div class="order-col">
									<div>Shiping</div>
									<div><strong><?php $shippingFee = 0;
													$shippingFee = $totalQty * 20000;
													echo number_format($shippingFee) ?>₫ </strong></div>
								</div>
								<div class="order-col">
									<div><strong>TOTAL</strong></div>
									<div><strong class="order-total"><?php $totalPayMoney = $totalPrice + $shippingFee;
																		echo number_format($totalPayMoney) ?></strong></div>
								</div>
							</div>
							<button type="submit" class="primary-btn order-submit">Place order</a>
							<?php endif; ?>
						</form>
					</div>
			</div>
			<!-- /Order Details -->
		</div>
	</div>
	</div>
	<!-- /SECTION -->

	<!-- Begin Footer -->
	<?php
	// Import Footer
	include "./sources/footer.php";
	?>
	<!-- End Footer -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>