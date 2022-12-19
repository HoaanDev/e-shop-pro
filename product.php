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
				$productRating = new ProductRating;
				$productsRating = $productRating->getProductRatingById($_GET['id']);
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
					$avgRating = $productRating->getProductRatingAVGById($_GET['id']);
				}
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
								if (count($productsRating) > 0) {
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
							<li><a data-toggle="tab" href="#tab3">Reviews</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p><?php echo $products[0]['description'] ?></p>
									</div>
								</div>
							</div>
							<div id="tab3" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<div class="col-md-3">
										<div id="rating">
											<?php
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
												$avgRating = $productRating->getProductRatingAVGById($_GET['id']);
											?>
												<div class="rating-avg">
													<span><?php echo $avgRating[0]['ROUND(AVG(`rating`), 1)']; ?></span>
													<div class="rating-stars">
														<?php
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
														<?php } ?>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo round(($star5 / $sumRating) * 100); ?>%;"></div>
														</div>
														<span class="sum"><?php echo $star5 ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo round(($star4 / $sumRating) * 100); ?>%;"></div>
														</div>
														<span class="sum"><?php echo $star4 ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo round(($star3 / $sumRating) * 100); ?>%;"></div>
														</div>
														<span class="sum"><?php echo $star3 ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo round(($star2 / $sumRating) * 100); ?>%;"></div>
														</div>
														<span class="sum"><?php echo $star2 ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo round(($star1 / $sumRating) * 100); ?>%;"></div>
														</div>
														<span class="sum"><?php echo $star1 ?></span>
													</li>
												</ul>
										</div>
									</div>
									<!-- /Rating -->

									<!-- Reviews -->
									<div class="col-md-6">
										<h4>Người dùng đã đánh giá:</h4>
										<div id="reviews">
											<ul class="reviews">
												<?php
												$customer = new Customer;
												foreach ($productsRating as $productRatingValue) { ?>
													<li>
														<div class="review-heading">
															<h5 class="name"><?php echo $customer->getCustomerById($productRatingValue['customer_id'])[0]['name']; ?></h5>
															<p class="date"><?php echo $productRatingValue['created_at']; ?></p>
															<div class="review-rating">
																<?php
																if ($productRatingValue['rating'] == 5) {
																	for ($i = 0; $i < $productRatingValue['rating']; $i++) { ?>
																		<i class="fa fa-star"></i>
																	<?php }
																} else {
																	for ($i = 0; $i < $productRatingValue['rating']; $i++) { ?>
																		<i class="fa fa-star"></i>
																	<?php }
																	for ($j = 0; $j < (5 - $productRatingValue['rating']); $j++) { ?>
																		<i class="fa fa-star-o empty"></i>
																	<?php
																	}
																	?>
																<?php } ?>
															</div>
														</div>
														<div class="review-body">
															<p><?php echo $productRatingValue['review']; ?></p>
														</div>
													</li>
												<?php } ?>
											</ul>
										</div>
									</div>
								<?php } else { ?>
									<div class="rating-avg">
										<span>0</span>
										<div class="rating-stars">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</div>
									<ul class="rating">
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-progress">
												<div></div>
											</div>
											<span class="sum">0</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div></div>
											</div>
											<span class="sum">0</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div></div>
											</div>
											<span class="sum">0</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div></div>
											</div>
											<span class="sum">0</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div></div>
											</div>
											<span class="sum">0</span>
										</li>
									</ul>
								</div>
							</div>
							<!-- /Rating -->

							<!-- Reviews -->
							<div class="col-md-6">
								<h4>Người dùng đánh giá:</h4>
								<div id="reviews">
									<ul class="reviews">
										<p>Chưa có đánh giá!</p>
									</ul>
								</div>
							</div>
						<?php }
						?>
						<!-- /Reviews -->

						<!-- Review Form -->
						<div class="col-md-3">
							<h4>Đánh giá sản phẩm:</h4>
							<div id="review-form">
								<?php if (!empty($_SESSION['customer'])) {
									$order = new Order;
									$orders = $order->getOrderByCustomerId($_SESSION['customer'], $_GET['id']);
									if (count($orders) > 0) { ?>
										<form class="review-form" action="process_rating.php" method="post">
											<input class="input" type="text" name="product_id" value="<?php echo $_GET['id']; ?>" hidden>
											<input class="input" type="text" name="customer_id" value="<?php echo $_SESSION['customer']; ?>" hidden>
											<textarea class="input" placeholder="Your Review" name="review"></textarea>
											<div class="input-rating">
												<span>Your Rating: </span>
												<div class="stars">
													<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
													<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
													<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
													<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
													<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
												</div>
											</div>
											<button class="primary-btn">Submit</button>
										</form>
									<?php } else { ?>
										<p>Bạn chưa mua sản phẩm này nên không thể đánh giá!</p>
									<?php } ?>
									<p><?php if (isset($_GET['notice'])) echo $_GET['notice'] ?></p>
								<?php } else { ?>
									<p>Đăng nhập để đánh giá sản phẩm!</p>
								<?php } ?>
							</div>
						</div>
						<!-- /Review Form -->
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
									$productRating = new ProductRating;
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