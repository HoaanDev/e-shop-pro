<?php session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../adminlogin/login.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shop Manage | Products Add</title>

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
        <form action="process_products_insert.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                  </div>
                  <div class="form-group">
                    <label for="inputManuId">Manufacture Name</label>
                    <select id="inputManuId" class="form-control custom-select" name="manu_id">
                      <?php
                      $manufacture = new Manufacture;
                      $manufactures = $manufacture->getAllManufactures();
                      foreach ($manufactures as $manufactureValue) { ?>
                        <option value="<?php echo $manufactureValue['manu_id'] ?>"><?php echo $manufactureValue['manu_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputTypeId">Protype Name</label>
                    <select id="inputTypeId" class="form-control custom-select" name="type_id">
                      <?php
                      $protype = new Protype;
                      $protypes = $protype->getAllProtypes();
                      foreach ($protypes as $protypeValue) { ?>
                        <option value="<?php echo $protypeValue['type_id'] ?>"><?php echo $protypeValue['type_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputPrice">Price</label>
                    <input type="text" id="inputPrice" class="form-control" name="price">
                  </div>
                  <div class="form-group">
                    <label for="inputImageLink">Image Link</label>
                    <input type="file" id="inputImageLink" class="form-control" name="image">
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" class="form-control" rows="4" cols="50" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputFeature">Feature</label>
                    <input type="text" id="inputFeature" class="form-control" name="feature">
                  </div>
                  <div class="form-group">
                    <label for="inputQuantity">Quantity</label>
                    <input type="text" id="inputQuantity" class="form-control" name="quantity">
                  </div>
                  <?php if (isset($_GET['notice'])) { ?>
                    <p><?php echo $_GET['notice'] ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
    </div>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <a href="./products_index.php" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Create" class="btn btn-success float-right">
      </div>
      <div class="col-2"></div>
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