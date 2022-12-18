<?php session_start(); ?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="my-account">
                    <?php $customer = new Customer;
                    $customers = $customer->getCustomerById($_SESSION['customer']); ?>
                    <img class="my-account-img" src="./img/user-img.png" alt="User Image">
                    <form action="update_user_info.php" method="post">
                        <label for="username">Your Name:</label>
                        <input type="text" id="username" name="user-name" value="<?php echo $customers[0]['name'] ?>">
                        <br>
                        <label for="useremail">Your Email:</label>
                        <input type="text" id="useremail" name="email" value="<?php echo $customers[0]['email'] ?>">
                        <input class="btn-save-changes-user-info" type="submit" value="Save Changes">
                    </form>
                    <?php if (isset($_GET['notice'])) { ?>
                        <p>Notice: <?php echo $_GET['notice'] ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="my-order">
                    <h1>Your Orders</h1>
                    <?php if (isset($_SESSION['customer'])) {
                        $customerId = $_SESSION['customer'];
                        $order = new Order;
                        $orders = $order->getOrderByCustomerId2($customerId);
                        if (count($orders) > 0) {
                            foreach ($orders as $orderValue) { ?>
                                <div class="order-info">
                                    <table class="order-table">
                                        <tr>
                                            <p><b>Personal Receive:</b> <i><?php echo $orderValue['name_receive'] ?></i></p>
                                            <p><b>Phone Receive:</b> <i><?php echo $orderValue['phone_receive'] ?></i></p>
                                            <p><b>Address Receive:</b> <i><?php echo $orderValue['address_receive'] ?></i></p>
                                            <p><b>Status:</b> <i><?php if ($orderValue['status'] == 0) {
                                                                        echo "Pending";
                                                                    } else if ($orderValue['status'] == 1) {
                                                                        echo "Accepted";
                                                                    } else if ($orderValue['status'] == 2) {
                                                                        echo "Cancelled";
                                                                    } else if ($orderValue['status'] == 3) {
                                                                        echo "Received";
                                                                    } ?></i></p>
                                            <p><b>Total Money:</b> <i><?php echo number_format($orderValue['total_price']) ?></i> VNĐ</p>
                                            <p><b>Order Time:</b> <i><?php echo $orderValue['created_at'] ?></i></p>
                                        </tr>
                                        <tr>
                                            <?php if ($orderValue['status'] == 0) { ?>
                                            <a class="btn-cancel" href="update_status_order.php?order_id=<?php echo $orderValue['id']?>&status=2">Cancel</a>
                                            <?php } ?>
                                            <?php if ($orderValue['status'] != 0 && $orderValue['status'] != 2 && $orderValue['status'] != 3) { ?>
                                            <a class="btn-received" href="update_status_order.php?order_id=<?php echo $orderValue['id']?>&status=3">Received</a>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                </div>
                            <?php }
                        } else { ?>
                            <p>Bạn chưa có đơn hàng nào! <span><u><a href="index.php">Đi mua sắm <i class="fa-solid fa-cart-plus"></i>.</a></u></span></p>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
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