<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Product Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   <!-- Timer -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- WebIcon -->
   <link rel="icon" href="assets/img/Logo_T&M.png">
  <!-- Favicons -->
  <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<script>
          function check(){
            alert("You must log in to send Feedback")
            location.href="login.php"
          }
        </script>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="index.html"><span>T&M</span></a></h1>
        </div>
        <?php
session_start();

?>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
            <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
            <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
            <?php if(isset($_SESSION["us"])&&$_SESSION["us"]!=""){ ?>
            <li><a class="nav-link scrollto" href="feedback.php">Feedback</a></li>
            <li><a class="nav-link scrollto" href="admin_login.html" target="_blank">Admin</a></li>
  
                      <li><a class="nav-link scrollto" href="#"><?php echo "Hi ".$_SESSION["us"];?></a></li>
                      <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
                      <li>
                      <a class="nav-link scrollto" href="cart.php"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }
                      else{
                      ?>
                      <li><a onclick="check()" class="nav-link scrollto" href="#">Feedback</a></li>
                      <li><a class="nav-link scrollto" href="admin_login.html" target="_blank">Admin</a></li>
                      <li><a class="nav-link scrollto" href="login.php">Login</a></li>
                      <li>
                      <a class="nav-link scrollto" href="cart.php"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }?>
          </ul>
          <i class="fas fa-bars mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Product Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Product Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <?php
	include_once('connection.php');
        if(isset($_GET["id"])){
			$id=$_GET["id"];
			$result=mysqli_query($conn,"select*from product where ProductID='$id'") or die(mysqli_error($conn)) ;
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$proid=$row['ProductID'];
			$proname=$row['ProductName'];
            $price=$row['Price'];
            $brandid=$row['BrandID'];
            $desc=$row['Description'];
            $result1=mysqli_query($conn,"select*from brand where BrandID='$brandid'") or die(mysqli_error($conn)) ;
            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
            $brandname=$row1['BrandName'];
            
      }
?>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src='product-imgs/<?php echo $row["Img"]; ?>' alt="laptop">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?php echo $proname;?></h3>
              <ul>
                <li><strong>ProducID</strong>: <?php echo $proid;?></li>
                <li><strong>Price</strong>:<?php echo $price;?> $</li>
                <li><strong>Brand</strong>: <?php echo $brandname;?></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Description</h2>
              <p>
              <?php echo $desc;?>
              </p>
            </div>
            <div class="portfolio-description">

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>T&M</h3>
            <p>
              An Khanh ward, <br>
              Ninh Kieu district,<br>
              Can Tho city <br><br>
              <strong>Phone:</strong> 0346370333<br>
              <strong>Email:</strong> T&Mcompany@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
          <h4>Content</h4>
            <ul>
              <li><a href="index.php#services">Service</a></li>
              <li><a href="feedback.php">Feedback</a></li>
              <li><a href="index.php#contact">Contact</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="cart.php">Cart</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Opening Hours</h4>
            <ul>
              <li> Mon - Fri: 8am - 8pm</li>
              <li>  Saturday: 9am - 7pm</li>
              <li>Sunday: 9am - 8pm</li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-newsletter">
            <h4> Store Location</h4>
            <p>500 Terry Francois <br>
              Street San Francisco,<br>
              CA 94158</p>
          </div>
          <div class="col-lg-2 col-md-6">
            <img src="assets/img/Logo_T&M.png" alt="">
          </div>
        </div>
      </div>
    </div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>