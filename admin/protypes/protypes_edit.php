<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shop Manage | Protypes Edit</title>

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
        <section class="content">
          <form action="process_protypes_edit.php" method="get">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
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
                      <label for="inputId">Protype Id</label>
                      <input type="number" id="inputId" value="<?php if (isset($_GET['type_id'])) {
                                                                  $protype = new Protype;
                                                                  $protypes = $protype->getProtypeById($_GET['type_id']);
                                                                  echo $protypes[0]['type_id'];
                                                                } ?>" class="form-control" name="type_id">
                    </div>
                    <div class="form-group">
                      <label for="inputName">Protype Name</label>
                      <input type="text" id="inputName" class="form-control" value="<?php if (isset($_GET['type_id'])) {
                                                                                      $protype = new Protype;
                                                                                      $protypes = $protype->getProtypeById($_GET['type_id']);
                                                                                      echo $protypes[0]['type_name'];
                                                                                    } ?>" name="type_name">
                    </div>
                    <?php if (isset($_GET['notice'])) { ?>
                      <p><?php echo $_GET['notice'] ?></p>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-8">
                <a href="./protypes_index.php" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Save Changes" class="btn btn-success float-right">
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