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
    include "sources/header.php";
    // Import Sources
    require 'config.php';
    require 'models/db.php';
    require 'models/manufactures.php';
    require 'models/products.php';
    require 'models/protypes.php';
    ?>
    <!-- End Header -->

    <!-- Begin Cart Section -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Your cart</h1>
                    <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                        <table class="cart-table">
                            <div class="row">
                                <tr>
                                    <div class="col-md-3">
                                        <th class="cart-title">Image</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th class="cart-title">Product Name</th>
                                    </div>
                                    <div class="col-md-2">
                                        <th class="cart-title">Quantity</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th class="cart-title">Price</th>
                                    </div>
                                    <div class="col-md-1">
                                        <th class="cart-title">Action</th>
                                    </div>
                                </tr>
                            </div>
                            <?php $cart = $_SESSION['cart'];
                            $product = new Products;
                            $totalMoney = 0;
                            foreach ($cart as $cartID => $cartValue) {
                                $products = $product->getProductById($cartID);
                                foreach ($products as $productValue) {
                                    if ($productValue['id'] == $cartID) {
                            ?>
                                        <div class="row">
                                            <tr>
                                                <div class="col-md-3">
                                                    <td class="cart-info cart-img"><img class="img-fluid" src="./img/<?php echo $productValue['image'] ?>" alt=""></td>
                                                </div>
                                                <div class="col-md-3">
                                                    <td class="cart-info cart-product-name"><a href="product.php?id=<?php echo $productValue['id'] ?>"><?php echo $productValue['name'] ?></a></td>
                                                </div>
                                                <div class="col-md-2">
                                                    <td class="cart-info cart-product-quantity">
                                                        <div class="row updata-quantity">
                                                            <div class="col-md-12">
                                                                <a href="update_qty.php?id=<?php echo $productValue['id'] ?>&type=decrea"><i class="fa-solid fa-minus"></i></a>
                                                                <span> <?php echo $_SESSION['cart'][$cartID] ?> </span>
                                                                <?php if ($_SESSION['cart'][$cartID] >= $productValue['quantity']) { ?>
                                                                    <i class="fa-solid fa-plus"></i>
                                                                <?php } else { ?>
                                                                    <a href="update_qty.php?id=<?php echo $productValue['id'] ?>&type=increa"><i class="fa-solid fa-plus"></i></a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="row store-quantity">
                                                            <div class="col-md-12">
                                                                <p>Kho còn: <?php echo $productValue['quantity'] ?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </div>
                                                <div class="col-md-3">
                                                    <td class="cart-info cart-product-price"><?php
                                                                                                $price = 0;
                                                                                                $price = $_SESSION['cart'][$cartID] * $productValue['price'];
                                                                                                $totalMoney = $totalMoney + $_SESSION['cart'][$cartID] * $productValue['price'];
                                                                                                echo number_format($price);
                                                                                                ?>₫</td>
                                                </div>
                                                <div class="col-md-1">
                                                    <td class="cart-info cart-product-action"><a href="del.php?id=<?php echo $cartID ?>">Delete</a></td>
                                                </div>
                                            </tr>
                                        </div>
                                    <?php       } ?>
                            <?php    }
                            } ?>
                        </table>
                        <div class="total">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Total: <span><?php
                                                    echo number_format($totalMoney); ?>₫</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="cart-navigation">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="index.php" class="btn-continues-shopping"><i class="fa-solid fa-arrow-left"></i> Continues Shopping</a>
                                    <a href="checkout.php" class="btn-checkout">Check out <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <p>Bạn chưa có sản phẩm nào trong giỏ hàng! <span><u><a href="index.php">Đi mua sắm <i class="fa-solid fa-cart-plus"></i>.</a></u></span></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Section -->

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