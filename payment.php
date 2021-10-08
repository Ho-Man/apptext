<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Feedback</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Timer -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- WebIcon -->
    <link rel="icon" href="assets/img/Logo_T&M.png">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<?php
session_start();
?>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <!-- ======= Header ======= -->
<?php 
    if(isset($_POST["btn_payment"])){
        include_once("connection.php");
        $username=$_SESSION['us'];
        $sq="select CustomerID from customer where UserName='$username'";
        $res=mysqli_query($conn,$sq) or die(mysqli_error($conn));
        $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $cusid=$row["CustomerID"];
        $query="INSERT INTO `order`(`CustomerID`) VALUES ('$cusid')";
        $res=mysqli_query($conn,$query)or die(mysqli_error($conn));
        $orderid=mysqli_insert_id($conn);
        foreach($_SESSION["cart"] as $key =>$row){
           $query1="INSERT INTO `orderdetail`(`OrderID`,`ProductID`, `Quality`) VALUES (".$orderid.",'".$key."',".$row['quanlity'].")";
           $res1=mysqli_query($conn,$query1)or die(mysqli_error($conn));
           $query1="UPDATE `product` SET `Stock`=`Stock`-".$row['quanlity']." WHERE ProductID='".$key."'";
           $res1=mysqli_query($conn,$query1)or die(mysqli_error($conn));
        }
        unset($_SESSION["cart"]);
        echo "<script type='text/javascript'>alert('Payment success');</script>";
        echo "<script> location.href='index.php'; </script>";
        exit;
    }
?>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol>
                        <li><a href="cart.php">Cart</a></li>
                        <li>Payment</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="section-title">
                            <h2>Payment</h2>
                            <p></p>
                        </div>
                    </div>
                    <form action="" method="post" role="form" class="php-email-form mt-4">
                        <div class="form-group mt-3">
                        <label class="form-check-label" for="flexCheckChecked">
                                Order Date
                            </label>
                            <input type="text" class="form-control" name="email" id="email" readonly value="<?php echo date("Y/m/d");?>"
                                required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Payment on delivery
                            </label>
                        </div>
                        <div class="my-3">
                        </div>
                        <div class="text-center"><button name="btn_payment" type="submit">Payment</button></div>
                    </form>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>T&M</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> 0346370333<br>
                            <strong>Email:</strong> T&Mcompany@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Content</h4>
                        <ul>
                        <li><a href="logout.php#services">Service</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="logout.php#contact">Contact</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Opening Hours</h4>
                        <ul>
                            <li> Mon - Fri: 8am - 8pm</li>
                            <li> Saturday: 9am - 7pm</li>
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
                        <img src="/assets/img/Logo_T&M.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="fas fa-arrow-up"></i></a>

        <!-- Vendor JS Files -->

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>


</body>

</html>