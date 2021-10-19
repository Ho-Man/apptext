<?php
    if (isset($_POST["btn_add"])) {
        $proid = $_POST["proid"];
        $proname = $_POST["proname"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        $brand = $_POST["BrandList"];
        $pic = $_FILES['img'];
        $desciption = $_POST['description'];

        if (trim($proid) == "") {
            echo "<script type='text/javascript'>alert('ProductID can't be empty');</script>";
        }
        else if (trim($proname) == "") {
            echo "<script type='text/javascript'>alert('ProductName can't be empty');</script>";
        }
        else if (trim($brand) == "") {
            echo "<script type='text/javascript'>alert('Brand can't be empty');</script>";
        }
        else if (trim($desciption) == "") {
            echo "<script type='text/javascript'>alert('Description can't be empty');</script>";
        }
        else if (!is_numeric($price)) {
            echo "<script type='text/javascript'>alert('Price must be a number);</script>";
        }
        else if (!is_numeric($stock)) {
            echo "<script type='text/javascript'>alert('Stock must be a number);</script>";
        } else {
            if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gif") {
                if ($pic['size'] < 614400) {
                    $sq = "select * from product where ProductID='$proid' or ProductName='$proname'";
                    $result = postgre_query($conn, $sq);
                    if (postgre_i_num_rows($result) == 0) {
                        copy($pic['tmp_name'], "product-imgs/" . $pic['name']);
                        $filePic = $pic['name'];
                        $sqlstring = "Insert into product(
                            `ProductID`, `ProductName`, `Price`, `Img`, `Stock`, `Description`, `BrandID`) values ('$proid','$proname',$price,'$filePic',$stock,'$description','$brand')";
                            postgre_query($conn, $sqlstring) or die(postgre_error($conn));
                        echo "<script type='text/javascript'>alert('Add Successful');</script>";
                        echo '<meta http-equiv="refresh" content="0;URL=#"/>';
                    } else {
                        echo "<li>Duplicate product ID or Name</li>";
                    }
                } else {
                    echo "Size of image too big";
                }
            } else {
                echo "Image format is not correct";
            }
        }
    }
    ?>


<?php
if(isset($_POST["btn_add"]))
{
    $us=$_POST["username"];
    $pass1=$_POST["pass1"];
    $pass2=$_POST["pass2"];
    $fname=$_POST["fullname"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $state=$_POST["state"];
    if (trim($us) == "") {
        echo "<script type='text/javascript'>alert('Username can not be empty');</script>";
    }
    else if (trim($pass1) == ""||trim($pass2) == "") {
        echo "<script type='text/javascript'>alert('Passoword can not be empty');</script>";
    }
    else if ($pass1!=$pass2) {
        echo "<script type='text/javascript'>alert('Passoword don't match');</script>";
    }
    else if (strlen($pass1)<6 ||strlen($pass1)>20) {
        echo "<script type='text/javascript'>alert('Passoword don't match');</script>";
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
    $pass=md5($pass1);
    include_once("connection.php");
    $sq="select * from customer where Username='$us' or Email='$email'";
    $res=postgre_query($conn,$sq);
    if(postgre_num_rows($res)==0){
        postgre_query($conn,"Insert into customer (Username, Password,CustomerName,Tel,Email,Address,State) 
        values('$us','$pass','$fname',$phone,'$email','$address',$state)")
        or die(postgre_error($conn));
        echo "<script type='text/javascript'>alert('Add Successful');</script>";
        echo "<script> location.href='add_customer.html'; </script>";
        exit;
    }
    else{
        echo "<script type='text/javascript'>alert('Add Failing');</script>";
        echo "<script> location.href='add_customer.html'; </script>";
        exit;
    }
}
}
 ?>

<header id="header" class="fixed-top d-flex align-items-center">
        <div class="container">
            <div class="header-container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="index.html"><span>T&M</span></a></h1>
                </div>
                <nav id="navbar" class="navbar">
                    <ul>
                      <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                      <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
                      <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
                      <li><a class="nav-link scrollto active" href="feedback.php">Feedback</a></li>
                      <li><a class="nav-link scrollto" href="admin_login.html" target="_blank">Admin</a></li>
                      <?php if(isset($_SESSION["us"])&&$_SESSION["us"]!=""){ ?>
                      <li><a class="nav-link scrollto" href="#"><?php echo "Hi ".$_SESSION["us"];?></a></li>
                      <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
                      <li>
                      <a class="nav-link scrollto active" href="cart.php"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }
                      else{
                      ?>
                      <li><a class="nav-link scrollto" href="login.php">Login</a></li>
                      <li>
                      <a class="nav-link scrollto active" href="cart.php"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }?>
                    </ul>
                    <i class="fas fa-bars mobile-nav-toggle"></i>
                  </nav>

            </div>
        </div>
    </header>