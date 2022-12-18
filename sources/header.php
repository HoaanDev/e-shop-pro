   <!-- HEADER -->
   <header>
       <!-- TOP HEADER -->
       <div id="top-header">
           <div class="container">
               <ul class="header-links pull-left">
                   <li><a href="#"><i class="fa fa-phone"></i> 0974443***</a></li>
                   <li><a href="#"><i class="fa fa-envelope-o"></i> 21211tt****@mail.tdc.edu.vn</a></li>
                   <li><a href="#"><i class="fa fa-map-marker"></i> Thu Duc College</a></li>
               </ul>
               <ul class="header-links pull-right">
                   <?php require './config.php';
                    require './models/db.php';
                    require './models/admins.php';
                    require './models/customers.php';
                    require './models/manufactures.php';
                    require './models/products.php';
                    require './models/orders.php';
                    require './models/protypes.php';
                    require './models/product_rating.php';
                    $name;
                    $customer = new Customer;
                    if (!empty($_SESSION['customer'])) { ?>
                       <li><a href="user_profile.php"><i class="fa fa-user-o"></i> <?php $customers = $customer->getAllCustomers();
                                                                    foreach ($customers as $customerId => $value) {
                                                                        if ($value['id'] == $_SESSION['customer']) {
                                                                            $name = $value['name'];
                                                                        }
                                                                    }
                                                                    echo $name; ?></a></li>
                       <li><a href="signout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a></li>
                   <?php } else { ?>
                       <li><a href="signin.php"><i class="fa-solid fa-right-to-bracket"></i> Sign In</a></li>
                   <?php } ?>
               </ul>
           </div>
       </div>
       <!-- /TOP HEADER -->

       <!-- MAIN HEADER -->
       <div id="header">
           <!-- container -->
           <div class="container">
               <!-- row -->
               <div class="row">
                   <!-- LOGO -->
                   <div class="col-md-3">
                       <div class="header-logo">
                           <a href="index.php" class="logo">
                               <img src="./img/logo.png" alt="">
                           </a>
                       </div>
                   </div>
                   <!-- /LOGO -->

                   <!-- SEARCH BAR -->
                   <div class="col-md-6">
                       <div class="header-search">
                           <form action="store.php" method="get">
                               <input class="input" type="text" name="keyword" placeholder="Type to search">
                               <button class="search-btn" type="submit">Search</button>
                           </form>
                       </div>
                   </div>
                   <!-- /SEARCH BAR -->

                   <!-- ACCOUNT -->
                   <div class="col-md-3 clearfix">
                       <div class="header-ctn">
                           <!-- Cart -->
                           <a class="your-cart" href="addcart.php">
                               <i class="fa fa-shopping-cart"></i>
                               <br>
                               <span>Your Cart</span>
                           </a>
                           <!-- /Cart -->

                           <!-- Menu Toogle -->
                           <div class="menu-toggle">
                               <a href="#">
                                   <i class="fa fa-bars"></i>
                                   <span>Menu</span>
                               </a>
                           </div>
                           <!-- /Menu Toogle -->
                       </div>
                   </div>
                   <!-- /ACCOUNT -->
               </div>
               <!-- row -->
           </div>
           <!-- container -->
       </div>
       <!-- /MAIN HEADER -->
   </header>
   <!-- /HEADER -->

   <!-- NAVIGATION -->
   <nav id="navigation">
       <!-- container -->
       <div class="container">
           <!-- responsive-nav -->
           <div id="responsive-nav">
               <!-- NAV -->
               <ul class="main-nav nav navbar-nav">
                   <li><a href="index.php">Home</a></li>
                   <li class="sub-item-nav"><a href="laptop.php">Laptops</a></li>
                   <li class="sub-item-nav"><a href="phone.php">Smartphones</a></li>
                   <li class="sub-item-nav"><a href="tablet.php">Tablets</a></li>
                   <li class="sub-item-nav"><a href="smartwatch.php">Smartwatches</a></li>
                   <li class="sub-item-nav"><a href="earphone.php">Earphones</a></li>
               </ul>
               <!-- /NAV -->
           </div>
           <!-- /responsive-nav -->
       </div>
       <!-- /container -->
   </nav>
   <!-- /NAVIGATION -->