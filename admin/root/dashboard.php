<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shop Admin | Dashboard</title>

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

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Begin Header -->
    <?php require '../sources/header_admin.php'; ?>
    <!-- End Header -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">
                    <?php
                    $customer = new Customer;
                    echo count($customer->getAllCustomers());
                    ?>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-powerpoint"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Products</span>
                  <span class="info-box-number"><?php
                                                $product = new Products;
                                                echo count($product->getAllProducts());
                                                ?></span>
                </div>
              </div>
            </div>
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Orders</span>
                  <span class="info-box-number"><?php
                                                $order = new Order;
                                                echo count($order->getAllOrders());
                                                ?></span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-solid fa-hand-holding-dollar"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Earn</span>
                  <span class="info-box-number"><?php
                                                $orders = $order->getAllOrders();
                                                $totalEarn = 0;
                                                foreach ($orders as $orderValue) {
                                                  $totalEarn += $orderValue['total_price'];
                                                }
                                                echo number_format($totalEarn) . " ₫";
                                                ?></span>
                </div>
              </div>
            </div>
          </div>
          <!-- Main row -->
          <div class="row">
            <!-- TABLE: LATEST ORDERS -->
            <div class="col-md-8">
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Orders</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th class="text-center">Order ID</th>
                          <th class="text-center">Customer Name</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Total Money</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $order = new Order;
                        $orders = $order->getNewOrders(10);
                        $customer = new Customer;
                        foreach ($orders as $orderValue) {
                        ?>
                          <tr>
                            <td class="text-center"><a href="../orders/orders_detail.php?id=<?php echo $orderValue['id'] ?>"><?php echo $orderValue['id'] ?></a></td>
                            <td class="text-center"><?php $customers = $customer->getCustomerById($orderValue['customer_id']);
                                                    echo $customers[0]['name'];
                                                    ?></td>
                            <td class="text-center"><?php if ($orderValue['status'] == 0) { ?>
                                <span class="badge badge-warning">Pending</span>
                              <?php } elseif ($orderValue['status'] == 1) { ?>
                                <span class="badge badge-info">Accepted</span>
                              <?php } elseif ($orderValue['status'] == 2) { ?>
                                <span class="badge badge-danger">Rejected</span>
                              <?php } ?>
                            </td>
                            <td class="text-center">
                              <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo number_format($orderValue['total_price']) ?>₫</div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="../orders/orders_index.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
              </div>
            </div>

            <!-- /.card -->

            <!-- /.col -->

            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Added Products</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php $product = new Products;
                    $products = $product->getNewProducts(4);
                    foreach ($products as $productValue) {
                    ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="../../img/<?php echo $productValue['image'] ?>" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="../products/products_detail.php?id=<?php echo $productValue['id'] ?>" class="product-title"><?php echo $productValue['name'] ?>
                            <span class="badge badge-warning float-right"><?php echo number_format($productValue['price']) ?>₫</span></a>
                          <span class="product-description">
                            <?php echo substr($productValue['description'], 0, 50) ?>...
                          </span>
                        </div>
                      </li>
                    <?php } ?>
                    <!-- /.item -->
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="../products/products_index.php" class="uppercase">View All Products</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Members</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    <?php
                    $customer = new Customer;
                    $customers = $customer->getNewCustomers(6);
                    foreach ($customers as $customerValue) {
                    ?>
                      <li>
                        <a class="users-list-name" href="../customers/customers_detail.php?id=<?php echo $customerValue['id']?>"><?php echo $customerValue['name'] ?></a>
                        <span class="users-list-date"><?php echo substr($customerValue['created_at'], 0, -8) ?></span>
                      </li>
                    <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="../customers/customers_index.php">View All Users</a>
                </div>
                <!-- /.card-footer -->
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Begin Footer -->
  <?php include '../sources/footer_admin.php'; ?>
  <!-- End Footer -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../plugins/raphael/raphael.min.js"></script>
  <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard2.js"></script>
</body>

</html>