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

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<div class="checkbox-filter">
							<div class="input-checkbox">
								<input type="checkbox" id="category-1">
								<label for="category-1">
									<span></span>
									Laptops
									<!-- <small>(120)</small> -->
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-2">
								<label for="category-2">
									<span></span>
									Smartphones
									<!-- <small>(740)</small> -->
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-3">
								<label for="category-3">
									<span></span>
									Tablets
									<!-- <small>(1450)</small> -->
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-4">
								<label for="category-4">
									<span></span>
									Smartwatches
									<!-- <small>(578)</small> -->
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-5">
								<label for="category-5">
									<span></span>
									Earphones
									<!-- <small>(120)</small> -->
								</label>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Price</h3>
						<div class="price-filter">
							<div id="price-slider"></div>
							<div class="input-number price-min">
								<input id="price-min" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
							<span>-</span>
							<div class="input-number price-max">
								<input id="price-max" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Brand</h3>
						<div class="checkbox-filter">
							<div class="input-checkbox">
								<input type="checkbox" id="brand-1">
								<label for="brand-1">
									<span></span>
									Apple
									<!-- <small>(578)</small> -->
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-2">
								<label for="brand-2">
									<span></span>
									Samsung
									<!-- <small>(125)</small> -->
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-3">
								<label for="brand-3">
									<span></span>
									Oppo
									<!-- <small>(755)</small> -->
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-4">
								<label for="brand-4">
									<span></span>
									Xiaomi
									<!-- <small>(578)</small> -->
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-5">
								<label for="brand-5">
									<span></span>
									Huawei
									<!-- <small>(125)</small> -->
								</label>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<!-- <div class="aside">
						<h3 class="aside-title">Top selling</h3>
						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product01.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product02.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product03.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>
					</div> -->
					<!-- /aside Widget -->
				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="store-sort">
							<!-- <label>
								Sort By:
								<select class="input-select">
									<option value="0">Popular</option>
									<option value="1">Position</option>
								</select>
							</label> -->
						</div>
						<ul class="">
							<?php if (isset($_GET['keyword'])) : ?>
								<li class="active"><i class="fa-brands fa-searchengin"></i> Search results for <?php echo "'" . $_GET['keyword'] . "'"; ?></li>
						</ul>
					</div>
					<!-- /store top filter -->

					<!-- store products -->
					<div class="row">
						<!-- product -->
						<?php
								// hiển thị 5 sản phẩm trên 1 trang
								$perPage = 3;
								// Lấy số trang trên thanh địa chỉ
								$page;
								if (isset($_GET['page'])) {
									$page = $_GET['page'];
								} else {
									$page = 1;
								}
								// lấy đường dẫn đến file hiện hành
								$url = $_SERVER['PHP_SELF'];
								$product = new Products;
								$products = $product->searchLimit($_GET['keyword'], $page, $perPage);
								$productRating = new ProductRating;
								// Tính tổng số sản phẩm
								$total = count($product->search($_GET['keyword']));
								foreach ($products as $value) :
						?>
							<div class="col-md-4">
								<div class="product">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
										<div class="product-label">
										</div>
									</div>
									<div class="product-body">
										<h3 class="product-name"><a href="product.php?id=<?php echo $value['id'] ?>"><?php echo $value['name']; ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']); ?> VND</h4>
										<div class="product-rating">
										<?php
													$productsRating = $productRating->getProductRatingById($value['id']);
													if (count($productsRating) > 0) {
														$star5 = 0;
														$star4 = 0;
														$star3 = 0;
														$star2 = 0;
														$star1 = 0;
														foreach ($productsRating as $productRatingValue) {
															if ($productRatingValue['rating'] == 5) {
																$star5 += 1;
															} else if ($productRatingValue['rating'] == 4) {
																$star4 += 1;
															} else if ($productRatingValue['rating'] == 3) {
																$star3 += 1;
															} else if ($productRatingValue['rating'] == 2) {
																$star2 += 1;
															} else if ($productRatingValue['rating'] == 1) {
																$star1 += 1;
															}
														}
														$sumRating = $star5 + $star4 + $star3 + $star2 + $star1;
														$avgRating = $productRating->getProductRatingAVGById($value['id']);
														if (round($avgRating[0]['ROUND(AVG(`rating`), 1)']) == 5) {
															for ($i = 0; $i < round($avgRating[0]['ROUND(AVG(`rating`), 1)']); $i++) { ?>
																<i class="fa fa-star"></i>
															<?php }
														} else {
															for ($i = 0; $i < round($avgRating[0]['ROUND(AVG(`rating`), 1)']); $i++) { ?>
																<i class="fa fa-star"></i>
															<?php }
															for ($j = 0; $j < (5 - round($avgRating[0]['ROUND(AVG(`rating`), 1)'])); $j++) { ?>
																<i class="fa fa-star-o empty"></i>
															<?php } ?>
														<?php }
													} else { ?>
														<i class="fa fa-star-o empty"></i>
														<i class="fa fa-star-o empty"></i>
														<i class="fa fa-star-o empty"></i>
														<i class="fa fa-star-o empty"></i>
														<i class="fa fa-star-o empty"></i>
													<?php } ?>
										</div>
										<div class="product-btns">
											<button class="quick-view" onclick="window.location.href='product.php?id=<?php echo $value['id'] ?>'"><i class="fa fa-eye"></i><span class="tooltipp">Detail</span></button>
										</div>
									</div>
								</div>
							</div>
							<!-- /product -->
						<?php endforeach;
						?>
					</div>
					<!-- /store products -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<span class="store-qty">Showing 3</span>
						<ul class="store-pagination">
							<?php echo $product->paginate($url, $total, $perPage, $_GET['keyword']); ?>
						</ul>
					</div>
				<?php endif; ?>
				<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
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