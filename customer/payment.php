
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

  // Check if the cart is empty
  if ($cart === 0) {
  // Set a session variable to indicate checkout failure
  $_SESSION['checkout_failed'] = "Item in cart is empty!";
  // Redirect or handle the situation as needed
  header("Location: cart.php"); // Replace with the appropriate URL
  exit();
}
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
    
    <title>Payment</title>
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
        <div class="row">
      <div class="col-75">

          <form action="payment_process.php">

            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York">

                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY">
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                  </div>
                </div>
              </div>

              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">

                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div>

            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" value="Continue to checkout" class="btn">
          </form>
        </div>
      </div>

 
</div>
	</div>
        </div>
</body>
</html>