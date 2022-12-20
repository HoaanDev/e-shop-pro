<?php session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../adminlogin/login.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shop Admin | Manufactures</title>

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
                        <h3 class="card-title">Manufactures Table</h3>
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
                                    <th style="width: 30%" class="text-center">
                                        Manufacture ID
                                    </th>
                                    <th style="width: 50%" class="text-center">
                                        Manufacture Name
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $manufacture = new Manufacture;
                                $manufactures = $manufacture->getAllManufactures();
                                foreach ($manufactures as $manuValue) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $manuValue['manu_id'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $manuValue['manu_name'] ?>
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary btn-sm" href="manufactures_detail.php?manu_id=<?php echo $manuValue['manu_id'] ?>">
                                                <i class="fas fa-solid fa-info"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="manufactures_edit.php?manu_id=<?php echo $manuValue['manu_id'] ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="manufactures_delete.php?manu_id=<?php echo $manuValue['manu_id'] ?>">
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
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-success btn-sm float-right" href="manufactures_insert.php">
                            <i class="fas fa-solid fa-plus"> Add Manufacture</i>
                        </a>
                    </div>
                </div>
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