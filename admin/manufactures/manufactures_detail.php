<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shop Manage | Manufacture Detail</title>

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
            <h3 class="card-title">Manufacture <?php if (isset($_GET['manu_id'])) {
                                                  $manufacture = new Manufacture;
                                                  $manufactures = $manufacture->getManuById($_GET['manu_id']);
                                                  echo  $manufactures[0]['manu_name'];
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
                <div class="col-3 col-md-3"></div>
                <div class="col-6 col-md-6 text-center">
                  <h3 class="text-primary"><i class="fas fa-industry"></i> <?php echo $manufactures[0]['manu_name'] ?></h3>
                  <p class="text-muted"><?php echo $manufactures[0]['manu_desc'] ?></p>
                  <br>
                  <div class="text-muted">
                    <p class="text-lg">Manufacture Id
                      <b class="d-block"><?php echo $manufactures[0]['manu_id'] ?></b>
                    </p>
                    <p class="text-lg">Manufacture Name
                      <b class="d-block"><?php echo $manufactures[0]['manu_name'] ?></b>
                    </p>
                  </div>
                  <div class="text-center mt-5 mb-3">
                    <a href="./manufactures_index.php" class="btn btn-sm btn-secondary">Back</a>
                    <a href="./manufactures_edit.php?manu_id=<?php echo $manufactures[0]['manu_id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <a href="./manufactures_delete.php?manu_id=<?php echo $manufactures[0]['manu_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                  </div>
                </div>
                <div class="col-3 col-md-3"></div>
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