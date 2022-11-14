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
    include "sources/header.php";
    // Import Sources
    require 'config.php';
    require 'models/db.php';
    require 'models/manufactures.php';
    require 'models/products.php';
    require 'models/protypes.php';
    ?>
    <!-- End Header -->

    <!-- Begin New Product Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">All EarPhones</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <?php
                            $product = new Products;
                            $products = $product->getProductByType_ID(5);
                            foreach ($products as $value) :
                            ?>
                                <div class="col-md-3">
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
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- End New Product Section -->
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