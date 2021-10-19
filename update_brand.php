<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Update Brand</title>
     <!-- WebIcon -->
  <link rel="icon" href="assets/img/Logo_T&M.png">
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <?php
	include_once('connection.php');
        if(isset($_GET["id"])){
			$id=$_GET["id"];
			$result=postgre_query($conn,"select*from brand where BrandID='$id'") or die(postgre_error($conn)) ;
			$row=postgre_fetch_array($result,POSTGRE_ASSOC);
			$brandid=$row['BrandID'];
			$brandname=$row['BrandName'];
?>
    <?php
if(isset($_POST["btn_update"]))
{
    $brandid=$_POST["brandid"];
    $brandname=$_POST["brandname"];
    if (trim($brandid) == "") {
        echo "<script type='text/javascript'>alert('BrandID can not be empty');</script>";
    }
    else if (trim($brandname) == "") {
        echo "<script type='text/javascript'>alert('BrandName can not be empty');</script>";
    }
    else{
    include_once("connection.php");
    $sq="select * from brand where BrandName='$brandname' and BrandID!='$brandid'";
    $res=postgre_query($conn,$sq);
    if(postgre_num_rows($res)==0){
      postgre_query($conn,"UPDATE `brand` SET `BrandName`='$brandname' WHERE BrandID='$brandid'")
        or die(postgre_error($conn));
        echo "<script type='text/javascript'>alert('Update Brand Successful');</script>";
        echo "<script> location.href='admin_brand.php'; </script>";
        exit;
    }
    else{
        echo "<script type='text/javascript'>alert('Update BrandID or BrandName');</script>";
        echo "<script> location.href='update_brand.php'; </script>";
        exit;
    }
}
}
 ?>
    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
    <link rel="stylesheet" href="btn.css">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow nav-color">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">T&M Store</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="admin_login.html"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="admin_order.php">
              <i class="fas fa-list-alt">&nbsp;</i>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin_Product.php">
              <i class="fas fa-box-open"></i>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_customer.php">
              <i class="fas fa-user-friends"></i>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_feedback.php">
              <i class="fas fa-comment">&nbsp;</i>
              Feedback
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_brand.php">
            <i class="fas fa-cubes">&nbsp;</i>
              Brand
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_orderdetail.php">
            <i class="fas fa-list-alt"></i>
              OrderDetail
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <h2>Update Brand</h2>
      <div class="btn-cancel">
      <a class="btn btn-danger" href="admin_brand.php" role="button"><i class="fas fa-times"></i><Span> Cancel</Span></a>
    </div>
        <form name="add_customer" method="post" action="">
              <!-- Text input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="brandid">BrandID</label>
                <input name="brandid" type="text" id="brandid" class="form-control" placeholder="BrandID" value="<?php echo $brandid;?>" readonly/>
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="brandname">BrandName</label>
                <input name="brandname" type="text" id="brandname" class="form-control" placeholder="BrandName"value="<?php echo $brandname;?>"/>
              </div>
            
            <!-- Submit button -->
            <div class="btn-func">
                <button name="btn_update"  type="submit" class="btn btn-primary">Update</button>
                <button  type="reset" class="btn btn-primary">RESET</button>
            </div>
          </form>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>

<?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=admin_brand.php"/>';
	}
	?>