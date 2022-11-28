<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shop Manage | Products Add</title>

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
        <form action="process_products_insert.php" method="get">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Insert</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Product Name</label>
                    <input type="text" id="inputName" class="form-control" name="name">
                    <label for="inputManuId">Manu Id</label>
                    <input type="text" id="inputManuId" class="form-control" name="manu_id">
                    <label for="inputTypeId">Type Id</label>
                    <input type="text" id="inputTypeId" class="form-control" name="type_id">
                    <label for="inputPrice">Price</label>
                    <input type="text" id="inputPrice" class="form-control" name="price">
                    <label for="inputImageLink">Image Link</label>
                    <input type="text" id="inputImageLink" class="form-control" name="image">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" class="form-control" rows="4" cols="50" name="description"></textarea>
                    <label for="inputFeature">Feature</label>
                    <input type="text" id="inputFeature" class="form-control" name="feature">
                    <label for="inputRating">Rating</label>
                    <input type="text" id="inputRating" class="form-control" name="rating">
                    <label for="inputQuantity">Quantity</label>
                    <input type="text" id="inputQuantity" class="form-control" name="quantity">
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
              <input type="submit" value="Create" class="btn btn-success float-right">
            </div>
          </div>
        </form>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Begin Footer -->
    <?php include "../sources/footer_admin.php"; ?>
    <!-- End Footer -->
    <!-- /.control-sidebar -->
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