<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shop Manage | Products</title>

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
    <!-- Begin Content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products Table</h3>

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
                                        ID
                                    </th>
                                    <th style="width: 30%" class="text-center">
                                        Product Name
                                    </th>
                                    <th style="width: 30%" class="text-center">
                                        Price
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Quantity
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $product = new Products;
                                $products = $product->getAllProducts();
                                foreach ($products as $productValue) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $productValue['id'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $productValue['name'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $productValue['price'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $productValue['quantity'] ?>
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary btn-sm" href="products_detail.php?id=<?php echo $productValue['id'] ?>">
                                                <i class="fas fa-solid fa-info">
                                                </i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="products_edit.php?id=<?php echo $productValue['id'] ?>">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="products_delete.php?id=<?php echo $productValue['id'] ?>">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-success btn-sm float-right" href="products_insert.php">
                            <i class="fas fa-solid fa-plus"> Add Products</i>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- Begin Footer -->
        <?php include "../sources/footer_admin.php"; ?>
        <!-- End Footer -->
    </div>
    <!-- End Content -->

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