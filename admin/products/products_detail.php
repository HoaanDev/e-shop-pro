<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shop Manage | Products Detail</title>

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
            <h3 class="card-title">Product <?php if (isset($_GET['id'])) {
                                              $product = new Products;
                                              $products = $product->getProductById($_GET['id']);
                                              $manufacture = new Manufacture;
                                              $manufactures = $manufacture->getManuById($products[0]['manu_id']);
                                              $protype = new Protype;
                                              $protypes = $protype->getProtypeById($products[0]['type_id']);
                                              echo  $products[0]['name'];
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
                  <h3 class="text-primary"><i class="fas fa-file-powerpoint"></i> <?php echo $products[0]['name'] ?></h3>
                  <p class="text-muted"><?php echo $products[0]['description'] ?></p>
                  <br>
                  <div class="text-muted">
                    <div class="row">
                      <div class="col-md-6">
                        <p class="text-lg">Product Id
                          <b class="d-block"><?php echo $products[0]['id'] ?></b>
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p class="text-lg">Product Name
                          <b class="d-block"><?php echo $products[0]['name'] ?></b>
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p class="text-lg">Manufacture Name
                          <b class="d-block"><?php echo $manufactures[0]['manu_name'] ?></b>
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p class="text-lg">Protype Name
                          <b class="d-block"><?php echo $protypes[0]['type_name'] ?></b>
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p class="text-lg">Price
                          <b class="d-block"><?php echo $products[0]['price'] ?></b>
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p class="text-lg">Image Link
                          <b class="d-block"><?php echo $products[0]['image'] ?></b>
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p class="text-lg">Feature
                          <b class="d-block"><?php if ($products[0]['feature'] == 1) {
                                                echo "Trending";
                                              } else {
                                                echo "Not Trending";
                                              } ?></b>
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p class="text-lg">Rating
                          <b class="d-block"><?php $productRating = new ProductRating;
                                              $productsRating = $productRating->getProductRatingAVGById($products[0]['id']);
                                              if ($productsRating[0]['ROUND(AVG(`rating`), 1)'] != null) {
                                                echo $productsRating[0]['ROUND(AVG(`rating`), 1)'];
                                              } else {
                                                echo "0";
                                              } ?> <i class="fa fa-star"></i></b>
                        </p>
                      </div>
                    </div>

                    <p class="text-lg">Quantity
                      <b class="d-block"><?php echo $products[0]['quantity'] ?></b>
                    </p>
                    <p class="text-lg">Created at
                      <b class="d-block"><?php echo $products[0]['created_at'] ?></b>
                    </p>
                  </div>
                  <div class="text-center mt-5 mb-3">
                    <a href="./products_index.php" class="btn btn-sm btn-secondary">Back</a>
                    <a href="./products_edit.php?id=<?php echo $products[0]['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <a href="./products_delete.php?id=<?php echo $products[0]['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
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