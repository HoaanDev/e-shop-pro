<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Edit</title>

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
        <form action="process_products_edit.php" method="get">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Edit</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputId">Product Id</label>
                    <input type="text" id="inputId" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['id'];
                                                            } ?>" class="form-control" name="id">
                    <label for="inputName">Product Name</label>
                    <input type="text" id="inputName" value="<?php if (isset($_GET['id'])) {
                                                                $product = new Products;
                                                                $products = $product->getProductById($_GET['id']);
                                                                echo $products[0]['name'];
                                                              } ?>" class="form-control" name="name">
                    <label for="inputManuId">Manu Id</label>
                    <input type="text" id="inputManuId" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['manu_id'];
                                                            } ?>" class="form-control" name="manu_id">
                    <label for="inputTypeId">Type Id</label>
                    <input type="text" id="inputTypeId" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['type_id'];
                                                            } ?>" class="form-control" name="type_id">
                    <label for="inputPrice">Price</label>
                    <input type="text" id="inputPrice" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['price'];
                                                            } ?>" class="form-control" name="price">
                    <label for="inputImageLink">Image Link</label>
                    <input type="text" id="inputImageLink" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['image'];
                                                            } ?>" class="form-control" name="image">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" class="form-control" rows="4" cols="50" name="description"><?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['description'];
                                                            } ?></textarea>
                    <label for="inputFeature">Feature</label>
                    <input type="text" id="inputFeature" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['feature'];
                                                            } ?>" class="form-control" name="feature">
                    <label for="inputRating">Rating</label>
                    <input type="text" id="inputRating" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['rating'];
                                                            } ?>" class="form-control" name="rating">
                    <label for="inputQuantity">Quantity</label>
                    <input type="text" id="inputQuantity" value="<?php if (isset($_GET['id'])) {
                                                              $product = new Products;
                                                              $products = $product->getProductById($_GET['id']);
                                                              echo $products[0]['quantity'];
                                                            } ?>" class="form-control" name="quantity">
                    <?php if (isset($_GET['notice'])) { ?>
                      <p><?php echo $_GET['notice'] ?></p>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="./products_index.php" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Save Changes" class="btn btn-success float-right">
            </div>
          </div>
        </form>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>