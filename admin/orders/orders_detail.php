<?php session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../adminlogin/login.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shop Manage | Orders Detail</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Begin Header -->
        <?php require '../sources/header_admin.php'; ?>
        <!-- End Header -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order <?php if (isset($_GET['id'])) {
                                                            $order = new Order;
                                                            $orders = $order->getOrderById($_GET['id']);
                                                            $orderProduct = new OrderProduct;
                                                            $orderProducts = $orderProduct->getOrderProductById($_GET['id']);
                                                            $product = new Products;
                                                            $customer = new Customer;
                                                            $customers = $customer->getCustomerById($orders[0]['customer_id']);
                                                            echo  $orders[0]['id'];
                                                        } ?> Detail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2 col-md-2"></div>
                                <div class="col-8 col-md-8 text-center">
                                    <h3 class="text-primary"><i class="fas fa-file-invoice-dollar"></i> <?php echo "Order " . $orders[0]['id'] ?></h3>
                                    <p class="text-muted"><?php if ($orders[0]['status'] == 0) { ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php } elseif ($orders[0]['status'] == 1) { ?>
                                            <span class="badge badge-info">Accepted</span>
                                        <?php } elseif ($orders[0]['status'] == 2) { ?>
                                            <span class="badge badge-danger">Rejected</span>
                                        <?php } elseif ($orders[0]['status'] == 3) { ?>
                                            <span class="badge badge-success">Received</span>
                                        <?php } ?>
                                    </p>
                                    <br>
                                    <div class="text-muted">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="text-lg">Order Id
                                                    <b class="d-block"><?php echo $orders[0]['id'] ?></b>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-lg">Customer Name
                                                    <b class="d-block"><?php echo $customers[0]['name'] ?></b>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-lg">Name Receiver
                                                    <b class="d-block"><?php echo $orders[0]['name_receive'] ?></b>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-lg">Phone Receiver
                                                    <b class="d-block"><?php echo $orders[0]['phone_receive'] ?></b>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-lg">Address Receiver
                                                    <b class="d-block"><?php echo $orders[0]['address_receive'] ?></b>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="text-lg">Product Name
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-lg">Quantity
                                                </p>
                                            </div>
                                        </div>
                                        <?php foreach ($orderProducts as $orderProductValue) { ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="text-lg">
                                                        <b class="d-block"><?php $products = $product->getProductById($orderProductValue['product_id']);
                                                                            if ($orderProductValue['product_id'] === $products[0]['id']) {
                                                                                echo $products[0]['name'];
                                                                            } ?>
                                                        </b>
                                                    </p>

                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-lg">
                                                        <b class="d-block"><?php echo $orderProductValue['quantity'] ?></b>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <p class="text-lg">Total Money
                                            <b class="d-block"><?php echo number_format($orders[0]['total_price']) ?>₫</b>
                                        </p>
                                        <p class="text-lg">Created at
                                            <b class="d-block"><?php echo $orders[0]['created_at'] ?></b>
                                        </p>
                                    </div>
                                    <div class="text-center mt-5 mb-3">
                                        <a href="./orders_index.php" class="btn btn-sm btn-secondary">Back</a>
                                        <a href="./order_update.php?id=<?php echo $orders[0]['id'] ?>&status=1" class="btn btn-sm btn-info"><i class="fas fa-solid fa-check"></i> Accept</a>
                                        <a href="./order_update.php?id=<?php echo $orders[0]['id'] ?>&status=2" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-x"></i> Reject</a>
                                    </div>
                                </div>
                                <div class="col-2 col-md-2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Begin Footer -->
        <?php include "../sources/footer_admin.php"; ?>
        <!-- End Footer -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>