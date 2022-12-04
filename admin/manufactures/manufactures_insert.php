<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shop Manage | Manufacture Add</title>

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
    <?php require '../sources/header_admin.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <form action="process_manufatures_insert.php" method="get">
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
                    <label for="inputName">Manufacture Name</label>
                    <input type="text" id="inputName" class="form-control" name="manu_name">
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Manufacture Description</label>
                    <textarea id="inputDescription" class="form-control" rows="4" cols="50" name="manu_desc"></textarea>
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
              <a href="./manufactures_index.php" class="btn btn-secondary">Cancel</a>
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