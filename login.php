<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
     <!-- WebIcon -->
     <link rel="icon" href="assets/img/Logo_T&M.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--===============================================================================================-->
</head>
<script>
          function check(){
            alert("You must log in to send Feedback")
          }
        </script>
<?php
session_start();
?>
<?php
include_once("connection.php");
    if(isset($_GET['btn_login']))
    {
		$_SESSION["us"]="";
        $us=$_GET['username'];
		$us=htmlspecialchars(pg_real_escape_string($conn,$us));
        $pa=$_GET['pass'];
			include_once("connection.php");
			$pass=md5($pa);
			$res=pg_query($conn,"select * from customer where Username='$us' and Password='$pass'")
			or die(pg_error($conn));
			if(pg_num_rows($res)==1){
                echo "<script type='text/javascript'>alert('Login Successful');</script>";
				$_SESSION["us"]= "$us";
                echo "<script> location.href='index.php' </script>";
                exit;
			}
			else{
				echo "<script type='text/javascript'>alert('You loged in fail');</script>";
				echo "<script> location.href='login.php'; </script>";
                exit;
			}
	}
?>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Login
					</span>
					<span class="remind">New to this site? <a href="signin.html">Sign Up</a></span>
				</div>

				<form name="login" class="login100-form validate-form" method="GET">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							
						</div>
						<div>
							<a href="index.php" class="txt1">
								<i class="fas fa-home"></i>
								Home
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<link rel="stylesheet" href=" https://code.jquery.com/jquery-3.6.0.min.js">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="assets/js/login.js"></script>
</body>
</html>