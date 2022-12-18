<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shop Manage | Orders</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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
                        <h3 class="card-title">Orders Table</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 10%" class="text-center">
                                        Order Id
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Customer Name
                                    </th>
                                    <th style="width: 30%" class="text-center">
                                        Delivery Info
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Status
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Total Money
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $order = new Order;
                                $orders = $order->getAllOrders();
                                $customer = new Customer;
                                foreach ($orders as $orderValue) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $orderValue['id'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php $customers = $customer->getCustomerById($orderValue['customer_id']);
                                            echo $customers[0]['name'];
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $orderValue['name_receive'] . "<br>" . $orderValue['phone_receive'] . "<br>" . $orderValue['address_receive'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($orderValue['status'] == 0) { ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php } elseif ($orderValue['status'] == 1) { ?>
                                                <span class="badge badge-info">Accepted</span>
                                            <?php } elseif ($orderValue['status'] == 2) { ?>
                                                <span class="badge badge-danger">Rejected</span>
                                            <?php } elseif ($orderValue['status'] == 3) { ?>
                                                <span class="badge badge-success">Received</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo number_format($orderValue['total_price']) ?>₫
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary btn-sm" href="orders_detail.php?id=<?php echo $orderValue['id'] ?>">
                                                <i class="fas fa-solid fa-info"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="order_update.php?id=<?php echo $orderValue['id'] ?>&status=1">
                                                <i class="fas fa-solid fa-check"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="order_update.php?id=<?php echo $orderValue['id'] ?>&status=2">
                                                <i class="fas fa-solid fa-x">X</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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