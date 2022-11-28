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

	<title>E-Shop</title>

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

	<!-- Begin Product Info Section -->
	<div class="section">
		<div class="container">
			<div class="row">
				<?php
				$id = $_GET['id'];
				$product = new Products;
				$products = $product->getProductById($id);
				?>
				<div class="col-md-6">
					<div id="product-main-img">
						<img src="./img/<?php echo $products[0]['image'] ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-details">
						<h2 class="product-name"><?php echo $products[0]['name'] ?></h2>
						<div>
							<div class="product-rating">
								<?php
								if ($products[0]['rating'] == 5) {
									for ($i = 0; $i < $products[0]['rating']; $i++) { ?>
										<i class="fa fa-star"></i>
									<?php }
								} else {
									for ($i = 0; $i < $products[0]['rating']; $i++) { ?>
										<i class="fa fa-star"></i>
									<?php }
									for ($j = 0; $j < (5 - $products[0]['rating']); $j++) { ?>
										<i class="fa-regular fa-star"></i>
									<?php
									}
									?>
								<?php } ?>
							</div>
						</div>
						<div>
							<h3 class="product-price"><?php echo number_format($products[0]['price']) ?> </h3>
							<?php if ($products[0]['quantity'] > 0) { ?>
								<span class="product-available">In Stock</span>
							<?php } else { ?>
								<span class="product-available">Sold Out</span>
							<?php } ?>
						</div>
						<p>Chế độ bảo hành "1 đổi 1" trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng. </p>

						<div class="add-to-cart">
							<?php if ($products[0]['quantity'] > 0) { ?>
								<button class="add-to-cart-btn" onclick="window.location.href='addcart.php?id=<?php echo $products[0]['id'] ?>'"><i class="fa fa-shopping-cart"></i> add to cart</button>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div id="product-tab">
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p><?php echo $products[0]['description'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Product Info Section -->

	<!-- Begin Related Products Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Related Products</h3>
					</div>
				</div>
				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab2" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-2">
									<!-- product -->
									<!-- product -->
									<?php
									$productRelated = new Products;
									$productsRelated = $productRelated->getProductByType_ID($products[0]['type_id']);
									foreach ($productsRelated as $value) :
									?>
										<div class="product">
											<div class="product-img">
												<img src="./img/<?php echo $value['image'] ?>" alt="">
												<div class="product-label">
												</div>
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="product.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
												<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
												<div class="product-rating">
													<?php
													if ($value['rating'] == 5) {
														for ($i = 0; $i < $value['rating']; $i++) { ?>
															<i class="fa fa-star"></i>
														<?php }
													} else {
														for ($i = 0; $i < $value['rating']; $i++) { ?>
															<i class="fa fa-star"></i>
														<?php }
														for ($j = 0; $j < (5 - $value['rating']); $j++) { ?>
															<i class="fa-regular fa-star"></i>
														<?php
														}
														?>
													<?php } ?>
												</div>
												<div class="product-btns">
													<button class="quick-view" onclick="window.location.href='product.php?id=<?php echo $value['id'] ?>'"><i class="fa fa-eye"></i><span class="tooltipp">Detail</span></button>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
									<!-- /product -->
								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- End Related Products Section -->

	<!-- Begin Footer -->
	<?php
	// Import Footer
	include "./sources/footer.php";
	?>
	<!-- End Footer -->

	<!-- jQuery Plugins -->
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/slick.min.js"></script>
	<script src="./js/nouislider.min.js"></script>
	<script src="./js/jquery.zoom.min.js"></script>
	<script src="./js/main.js"></script>

</body>

</html>