
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Product</title>
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

	<h1 class="page-header text-center">Shopping Cart</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

            if(isset($_SESSION['checkout_failed'])) { ?>

                <div class="alert alert-danger">
                    <?= $_SESSION['checkout_failed'] ?>
                </div>
                <?php 
				unset($_SESSION['checkout_failed']);
		} 

			?>
			<form method="POST" action="save_cart.php">
			<table class="table table-bordered table-striped">
				<thead>
					<th></th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if($cart != 0){
						//connection
						// $conn = new mysqli('localhost', 'root', '', 'orderbarang');
            
						//create array of initail qty which is 1
 						$index = 0 ;
 	
             $sql = "SELECT cart.*, product.product_name, product.price FROM cart JOIN product ON product.product_id=cart.product_id WHERE user_id = '$_SESSION[user_id]'";
              
						$query = mysqli_query($conn, $sql);
            // $r = mysqli_fetch_array($query);
            // print_r($r);
							while($row = mysqli_fetch_array($query)){
                // print_r($row);
								?>
								<tr>
									<td>
                    <?= $index+1 ?>
									</td>
									<td><?php echo $row['product_name']; ?></td>
									<td><?php echo number_format($row['price'], 0,',','.'); ?></td>
									<td><?php echo $row['qty'] ?></td>
									<td><?php echo number_format($row['qty']*$row['price'],0,',','.') ?></td>
									<?php $total += $row['qty']*$row['price']; ?>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2,',','.'); ?></b></td>
					</tr>
				</tbody>
			</table>
      
			<a href="product.php" id="1" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			<button type="submit" id="2" class="btn btn-success" name="save">Save Changes</button>
			<a href="clear_cart.php" id="1" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
			<a href="payment.php" id="2" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
			</form>
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