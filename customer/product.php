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

	//unset qunatity
	unset($_SESSION['qty_array']);
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
    
        <div class="container justify-content-center" style="border-radius: 5px;">
            <div class="row" style="width:95%" >
            <?php
                include "../config/koneksi.php";
                $no =1;
                $sql = "SELECT * FROM product";
                $query = mysqli_query($conn, $sql);
                                
                while($result = mysqli_fetch_array($query)){
                ?>

            <div class="col-md-3">
    
                <div class="card">          
                <div class="card-body">     
                    <?php 
                            if ($result['product_img'] == "") { ?>
                                <img src="https://images.app.goo.gl/CztrSHiVs76rPZGy6">
                            <?php }else{ ?>
                                <img src="../img/<?php echo $result['product_img']; ?>" style="width:100%;height:100%; border-radius: 0;">
                            <?php } ?> <br>
                            <b><?= $result['product_name'] ?> </b><br>
                            <?= $result['category'] ?> <br>
                            <?= $result['price'] ?> <br><br>
                    <a href="review.php?product_id=<?php echo $result['product_id']; ?>" class="btn btn-danger">Review</a>&nbsp; 
                    <a href="add_cart.php?product_id=<?php echo $result['product_id']; ?>" class="btn btn-primary">Add to Cart</a>
                    
                </div>
                </div>
                </div>  
                <?php } ?>
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
    <script  src="../js/scripts.js"></script>
</body>
</html>