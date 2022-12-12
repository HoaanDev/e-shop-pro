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
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
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
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
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
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
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
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Monthly Recap Report</h5>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                        <a class="dropdown-divider"></a>
                        <a href="#" class="dropdown-item">Separated link</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Sales: 1 Jan, 2022 - 30 Jul, 2022</strong>
                      </p>

                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                      </div>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Goal Completion</strong>
                      </p>

                      <div class="progress-group">
                        Add Products to Cart
                        <span class="float-right"><b>160</b>/200</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->

                      <div class="progress-group">
                        Complete Purchase
                        <span class="float-right"><b>310</b>/400</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" style="width: 75%"></div>
                        </div>
                      </div>

                      <!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Visit Premium Page</span>
                        <span class="float-right"><b>480</b>/800</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-success" style="width: 60%"></div>
                        </div>
                      </div>

                      <!-- /.progress-group -->
                      <div class="progress-group">
                        Send Inquiries
                        <span class="float-right"><b>250</b>/500</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-warning" style="width: 50%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">$35,210.43</h5>
                        <span class="description-text">TOTAL REVENUE</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">$10,390.90</h5>
                        <span class="description-text">TOTAL COST</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">US-Visitors Report</h3>

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
                  <div class="d-md-flex">
                    <div class="p-1 flex-fill" style="overflow: hidden">
                      <!-- Map will be created here -->
                      <div id="world-map-markers" style="height: 325px; overflow: hidden">
                        <div class="map"></div>
                      </div>
                    </div>
                    <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                      <div class="description-block mb-4">
                        <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                        <h5 class="description-header">8390</h5>
                        <span class="description-text">Visits</span>
                      </div>
                      <!-- /.description-block -->
                      <div class="description-block mb-4">
                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                        <h5 class="description-header">30%</h5>
                        <span class="description-text">Referrals</span>
                      </div>
                      <!-- /.description-block -->
                      <div class="description-block">
                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                        <h5 class="description-header">70%</h5>
                        <span class="description-text">Organic</span>
                      </div>
                      <!-- /.description-block -->
                    </div><!-- /.card-pane-right -->
                  </div><!-- /.d-md-flex -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="row">
                <div class="col-md-6">
                  <!-- DIRECT CHAT -->
                  <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                      <h3 class="card-title">Direct Chat</h3>

                      <div class="card-tools">
                        <span title="3 New Messages" class="badge badge-warning">3</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                          <i class="fas fa-comments"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <!-- Conversations are loaded here -->
                      <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            You better believe it!
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            Working with AdminLTE on a great new app! Wanna join?
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            I would love to.
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                      </div>
                      <!--/.direct-chat-messages-->

                      <!-- Contacts are loaded here -->
                      <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Count Dracula
                                  <small class="contacts-list-date float-right">2/28/2015</small>
                                </span>
                                <span class="contacts-list-msg">How have you been? I was...</span>
                              </div>
                              <!-- /.contacts-list-info -->
                            </a>
                          </li>
                          <!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Sarah Doe
                                  <small class="contacts-list-date float-right">2/23/2015</small>
                                </span>
                                <span class="contacts-list-msg">I will be waiting for...</span>
                              </div>
                              <!-- /.contacts-list-info -->
                            </a>
                          </li>
                          <!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nadia Jolie
                                  <small class="contacts-list-date float-right">2/20/2015</small>
                                </span>
                                <span class="contacts-list-msg">I'll call you back at...</span>
                              </div>
                              <!-- /.contacts-list-info -->
                            </a>
                          </li>
                          <!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nora S. Vans
                                  <small class="contacts-list-date float-right">2/10/2015</small>
                                </span>
                                <span class="contacts-list-msg">Where is your new...</span>
                              </div>
                              <!-- /.contacts-list-info -->
                            </a>
                          </li>
                          <!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  John K.
                                  <small class="contacts-list-date float-right">1/27/2015</small>
                                </span>
                                <span class="contacts-list-msg">Can I take a look at...</span>
                              </div>
                              <!-- /.contacts-list-info -->
                            </a>
                          </li>
                          <!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date float-right">1/4/2015</small>
                                </span>
                                <span class="contacts-list-msg">Never mind I found...</span>
                              </div>
                              <!-- /.contacts-list-info -->
                            </a>
                          </li>
                          <!-- End Contact Item -->
                        </ul>
                        <!-- /.contacts-list -->
                      </div>
                      <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <form action="#" method="post">
                        <div class="input-group">
                          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                          <span class="input-group-append">
                            <button type="button" class="btn btn-warning">Send</button>
                          </span>
                        </div>
                      </form>
                    </div>
                    <!-- /.card-footer-->
                  </div>
                  <!--/.direct-chat -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                  <!-- USERS LIST -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Latest Members</h3>

                      <div class="card-tools">
                        <span class="badge badge-danger">8 New Members</span>
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
                        <li>
                          <img src="dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander Pierce</a>
                          <span class="users-list-date">Today</span>
                        </li>
                        <li>
                          <img src="dist/img/user8-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Norman</a>
                          <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                          <img src="dist/img/user7-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Jane</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user6-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">John</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user2-160x160.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander</a>
                          <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user5-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Sarah</a>
                          <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user4-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nora</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user3-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                      </ul>
                      <!-- /.users-list -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                      <a href="javascript:">View All Users</a>
                    </div>
                    <!-- /.card-footer -->
                  </div>
                  <!--/.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
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
                        $orders = $order->getNewOrders(8);
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
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Inventory</span>
                  <span class="info-box-number">5,200</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Mentions</span>
                  <span class="info-box-number">92,050</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Downloads</span>
                  <span class="info-box-number">114,381</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="far fa-comment"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Direct Messages</span>
                  <span class="info-box-number">163,921</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Browser Usage</h3>

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
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="chart-responsive">
                        <canvas id="pieChart" height="150"></canvas>
                      </div>
                      <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <ul class="chart-legend clearfix">
                        <li><i class="far fa-circle text-danger"></i> Chrome</li>
                        <li><i class="far fa-circle text-success"></i> IE</li>
                        <li><i class="far fa-circle text-warning"></i> FireFox</li>
                        <li><i class="far fa-circle text-info"></i> Safari</li>
                        <li><i class="far fa-circle text-primary"></i> Opera</li>
                        <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                      </ul>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-light p-0">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        United States of America
                        <span class="float-right text-danger">
                          <i class="fas fa-arrow-down text-sm"></i>
                          12%</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        India
                        <span class="float-right text-success">
                          <i class="fas fa-arrow-up text-sm"></i> 4%
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        China
                        <span class="float-right text-warning">
                          <i class="fas fa-arrow-left text-sm"></i> 0%
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /.footer -->
              </div>
              <!-- /.card -->

              <!-- PRODUCT LIST -->
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
                          <a href="../products/products_detail.php?id=<?php echo $productValue['id']?>" class="product-title"><?php echo $productValue['name'] ?>
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
              <!-- /.card -->
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