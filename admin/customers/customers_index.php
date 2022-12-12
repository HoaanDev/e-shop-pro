<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shop Admin | Customers</title>

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
                        <h3 class="card-title">Customers Table</h3>
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
                                    <th style="width: 20%" class="text-center">
                                        Customer ID
                                    </th>
                                    <th style="width: 30%" class="text-center">
                                        Customer Name
                                    </th>
                                    <th style="width: 30%" class="text-center">
                                        Email
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $customer = new Customer;
                                $customers = $customer->getAllCustomers();
                                foreach ($customers as $customerValue) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $customerValue['id'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $customerValue['name'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $customerValue['email'] ?>
                                        </td>
                                        
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary btn-sm" href="customers_detail.php?id=<?php echo $customerValue['id'] ?>">
                                                <i class="fas fa-solid fa-info"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="customers_delete.php?id=<?php echo $customerValue['id'] ?>">
                                                <i class="fas fa-trash"></i>
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