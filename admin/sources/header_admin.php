<?php
session_start();
if (empty($_SESSION['admin'])) {
    header("Location: ../adminlogin/login.php");
}
require '../../config.php';
require "../../models/db.php";
require "../../models/manufactures.php";
require "../../models/products.php";
require "../../models/protypes.php";
require "../../models/customers.php";
require "../../models/orders.php";
require "../../models/order_product.php";
require "../../models/product_rating.php";
?>
<!-- Begin Header -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../root/dashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index.php" class="nav-link">E-Shop</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../root/dashboard.php" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Shop Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p  class="d-block text-lg">Administrator</p>
                <a href="../adminlogin/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- Begin Dashboard -->
                <li class="nav-item">
                    <a href="../root/dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Begin Tables Manage -->
                <li class="nav-item">
                    <a href="../manufactures/manufactures_index.php" class="nav-link">
                        <i class="fas fa-table nav-icon"></i>
                        <p>Manufactures Manage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../products/products_index.php" class="nav-link">
                        <i class="fas fa-table nav-icon"></i>
                        <p>Products Manage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../protypes/protypes_index.php" class="nav-link">
                        <i class="fas fa-table nav-icon"></i>
                        <p>Protypes Manage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../orders/orders_index.php" class="nav-link">
                        <i class="fas fa-table nav-icon"></i>
                        <p>Orders Manage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../customers/customers_index.php" class="nav-link">
                        <i class="fas fa-table nav-icon"></i>
                        <p>Customers Manage</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- End Header -->