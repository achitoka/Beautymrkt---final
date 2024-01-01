
<?php
include "../config/koneksi.php";
	session_start();
	//initialize cart if not set or is unset
  if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

  $sql_cart = "SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'";
  $query = mysqli_query($conn, $sql_cart);
  $cart = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/payment.css">
    
    <title>Checkout Invoice</title>
</head>
<body>
    <div class="grid-container">
        <div class="header">
            <h2>BeautyMarkt</h2>
            <ul class="nav-links">
                <li class="nav-link">
                    <li><a href="home.php">Home</a></li>
                </li>
                <li class="nav-link">
                    <li><a href="product.php">Product</a></li>
                </li>
                <li class="nav-link-ctg">
                </li>
                <li class="nav-link">
                    <a href="Cart.php"><span class="badge"><?php echo $cart; ?></span> <i class='bx bxs-shopping-bag' ></i></a>
                </li>
                <li class="nav-link">
                <a href="../logout.php"><i class='bx bx-log-out'></i></a>
                </li>
            </ul>
        </div>

        <div class="producs">
        <div class="container">
        <section class="about_section layout_padding">
             <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="order_complete_message text-center">
                    <div class="icon bgc-thm"><span class="fa fa-check-circle fa-5x text-primary"></span></div>
                    <h2>Your Order Is Completed !</h2>
                    <p>Thank you. Your order has been received.</p>
                </div>
            </div>
        </div>
      </div>
    </section>

    </div>
  </div>

 
</div>
	</div>
        </div>

        <!-- <div class="footer">
            <div class="row">
                <div class="col">
                    <a href="#">ABOUT</a>
                    <a href="#"><i class='bx bxl-instagram-alt' ></i></a>
                    <a href="#"><i class='bx bxl-twitter' ></i></a>
                    <a href="#">FAQ</i></a>
                </div>
                <div class="tag"><p>© 2023 BeautyMarkt. All Right Reserved</p></div>
            </div>
        </div>
    </div> -->
</body>
</html>