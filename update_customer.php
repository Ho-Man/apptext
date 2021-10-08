
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Update customer</title>
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
      <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
    </li>
  </ul>
</header>
<?php
	include_once('connection.php');
        if(isset($_GET["id"])){
			$id=$_GET["id"];
			$result=mysqli_query($conn,"select*from customer where CustomerID='$id'") or die(mysqli_error($conn)) ;
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$cusid=$row['CustomerID'];
			$cusname=$row['CustomerName'];
			$username=$row['UserName'];
            $password=$row['Password'];
            $tel=$row['Tel'];
            $email=$row['Email'];
            $address=$row['Address'];
            $state=$row['State'];	
?>
   <?php
if(isset($_POST["btn_update"]))
{
    $us=$_POST["username"];
    $pass1=$_POST["pass1"];
    $cusid=$_POST["cusid"];
    $fname=$_POST["fullname"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $state=$_POST["state"];
    if (trim($us) == "") {
        echo "<script type='text/javascript'>alert('Username can not be empty');</script>";
    }
    else if (trim($fname) == "") {
        echo "<script type='text/javascript'>alert('fullname can not be empty');</script>";
    }
    else if (trim($phone) == "") {
        echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
    }
    else if (!is_numeric($phone)) {
        echo "<script type='text/javascript'>alert('Phone must be a number');</script>";
    }
    else if (trim($email) == "") {
        echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
    }
    else if (trim($address) == "") {
        echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
    }
    else{
    include_once("connection.php");
    $sq="select * from customer where CustomerID!='$cusid' and Email='$email'";
    $res=mysqli_query($conn,$sq);
    if(mysqli_num_rows($res)==0){
        mysqli_query($conn,"UPDATE `customer` SET 
        `UserName`='$us',
        `CustomerName`='$fname',`Tel`='$tel',`Email`='$email',`Address`='$address',`State`='$state' WHERE CustomerID='$cusid'")
        or die(mysqli_error($conn));
        echo "<script type='text/javascript'>alert('Update Customer Successful');</script>";
        echo "<script> location.href='admin_customer.php'; </script>";
        exit;
    }
    else{
        echo "<script type='text/javascript'>alert('Update Customer Failing');</script>";
        echo "<script> location.href='admin_customer.php'; </script>";
        exit;
    }
}
}
 ?>
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
            <a class="nav-link active" href="admin_customer.php">
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
            <a class="nav-link" href="admin_brand.php">
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

      <h2>Update Customer</h2>
      <div class="btn-cancel">
      <a class="btn btn-danger" href="admin_customer.php" role="button"><i class="fas fa-times"></i><Span> Cancel</Span></a>
    </div>
        <form name="add_customer" method="post">
              <!-- Text input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="username">User Name</label>
                <input name="username" type="text" id="username" class="form-control" placeholder="UserName"  value='<?php echo $username ?>'/>
              </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="pass1">Password</label>
                  <input name="pass1" type="password" id="pass1" class="form-control" placeholder="Password"  value='<?php echo $password ?>' readonly/>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="cusid">CustomerID</label>
                  <input name="cusid" type="number" id="cusid" class="form-control" value='<?php echo $cusid ?>' readonly/>
                </div>
              </div>
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="fullname">Full Name</label>
              <input name="fullname" type="text" id="fullname" class="form-control" placeholder="FullName"  value='<?php echo $cusname ?>'/>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email</label>
              <input name="email" type="email" id="email" class="form-control" placeholder="Email"  value='<?php echo $email ?>'/>
            </div>
          
            <!-- Number input -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="phone">Phone</label>
                  <input name="phone" type="tel" id="phone" class="form-control" placeholder="Phone" value='<?php echo $tel ?>'/>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="state">State</label>
                  <input name="state" type="number" id="state" class="form-control" placeholder="State"  value='<?php echo $state ?>' />
                </div>
              </div>
            </div>
    
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="address">Address</label>
              <input name="address"  type="text" id="address" class="form-control" placeholder="Address" value='<?php echo $address ?>'/>
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
		echo '<meta http-equiv="refresh" content="0; URL=admin_customer.php"/>';
	}
	?>
