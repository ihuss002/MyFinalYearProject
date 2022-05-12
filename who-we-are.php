<?php
session_start();
error_reporting(0);
include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>About Us</title>
	<?php include('includes/header-files-css.php');?>

</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include 'includes/top-header.php';?>
        <?php include 'includes/main-header.php';?>
        <?php include 'includes/menu-bar.php';?>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>who-we-are</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-bd">
        <div class="container">
        <div class="bg-light">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4">Who we are and the purpose</h1>
        <p class="lead text-muted mb-0">We are a team dedicated to bringing niche and rare car parts and aftermarket parts for consumers. As time goes on car manufacturers stop producing parts for older models of cars. We are trying to create a community of sellers to provide these parts for the public. A way for consumers to either buy or trade parts with sellers with ease. Over time these parts are left around collecting dust or thrown away. We want to recycle, use and get the most out of old parts. That is our goal.</p>
        <p class="lead text-muted">Here you can <a href="contact-us.php" class="text-muted"> 
                    <u>Contact Us</u></a>
        </p>
      </div>
      <div class="col-lg-6 d-none d-lg-block">
      <img src="img/who.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Sell Your Spare Car Parts</h2>
        <p class="font-italic text-muted mb-4">Simplicity is key on this platform. Register an account and effortlessly add items to your selling lists. Communicate with buyers with ease.</p></p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834139/img-1_e25nvh.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/img-2_vdgqgn.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Buy Spare Parts</h2>
        <p class="font-italic text-muted mb-4">To purchase any of the items available on this website you can directly contact each seller for more details. You may message any seller to enquire about any parts with a simple click.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
      </div>
    </div>
  </div>
</div>

<div class="bg-light py-5">
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <?php include 'includes/brands-slider.php';?>

        </div>
    </div>
    <?php include 'includes/footer.php';?>
	<?php include('includes/footer-files-script.php');?>

</body>

</html>
