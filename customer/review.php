
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Product</title>

    <style>
        /* Style for star icons */
        .rating-container {
            display: flex;
            align-items: center;
        }

        .rating-container i {
            color: #ffd700;
            font-size: 24px;
            cursor: pointer;
        }

        .rating-container i:hover {
            color: #ffcc00;
        }

        .filled {
            color: #ffd700;
        }
    </style>
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

        <div class="container d-flex ">
            <div class="row mx-auto">
                <div class="col-md-6">
                    <?php
                    $sql = "SELECT * FROM product WHERE product_id='$_GET[product_id]' LIMIT 1";
                    $query = mysqli_query($conn, $sql);
                    
                    $result = mysqli_fetch_array($query);
                    
                    if ($result['product_img'] == "") { ?>
				        <img src="https://images.app.goo.gl/CztrSHiVs76rPZGy6">
			        <?php }else{ ?>
				        <img src="../img/<?php echo $result['product_img']; ?>" style="width:100%;height:100%; border-radius: 0;">
			        <?php } ?> 
                </div>

                <div class="col-md-6">
                    <label for="rating">Rating:</label>
                        <div class="rating-container justify-content-center" onclick="updateRating(event)">
                            <i class="fa-regular fa-star" data-rating="1"></i>
                            <i class="fa-regular fa-star" data-rating="2"></i>
                            <i class="fa-regular fa-star" data-rating="3"></i>
                            <i class="fa-regular fa-star" data-rating="4"></i>
                            <i class="fa-regular fa-star" data-rating="5"></i>
                        </div>
                        <h5 class="mt-3" id="rate"></h5>
                        <form action="post_review.php?product_id=<?= $_GET['product_id'] ?>" method="POST" id="review">
                            <div class="form-group">
                                <input type="hidden" name="rating" id="rating" class="form-control">
                                <textarea name="review" class="form-control" cols="30" rows="3" placeholder="Type your review here" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                </div>
                <div class="col-md-12">
                    <thead>
                        <th><h3>User Review</h3></th>
                    </thead>
                    <tbody>
                        <?php
                        $sql_review = "SELECT tb_review.*, users.nama FROM `tb_review` JOIN users ON users.user_id = tb_review.user_id WHERE tb_review.product_id='$_GET[product_id]'";
                        $query = mysqli_query($conn, $sql_review);

                        while ($result = mysqli_fetch_array($query)) { ?>
                        
                        <td><h6><?= $result['nama'] ?></h6>
                        <div class="rating-container justify-content-center">
                        <?php
                            $rating = $result['rating'];

                            // Output stars based on the rating
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fa-solid fa-star"></i>';
                                } else {
                                    echo '<i class="fa-regular fa-star"></i>';
                                }
                            } ?>
                        </div>
                        <p><?= $result['review'] ?></p>
                        <?php 
                        }
                        ?>
                        </td>
                    </div>
                    </tbody>
                </div>

          
        
        </div>
    </div>

<script>
    document.getElementById('review').hidden = true
    function updateRating(event) {
    if (event.target.tagName === 'I') {
        document.getElementById('review').hidden = false
        // Get the rating of the clicked star
        var rating = event.target.getAttribute('data-rating');

        let msg = ""
        if(rating == 1){
            msg = `"I don’t like this product"`
        } else if(rating == 2){
            msg = `"It doesn’t work on me"`
        } else if(rating == 3) {
            msg = `"Could be better"`
        } else if(rating == 4) {
            msg = `"It’s a good product"`
        } else if (rating == 5) {
            msg = `"A must-have product!"`
        }

        document.getElementById('rate').innerText = msg
        document.getElementById('rating').value = rating

        // Set fa-solid class up to the clicked star
        for (var i = 1; i <= rating; i++) {
            var star = document.querySelector('.rating-container [data-rating="' + i + '"]');
            star.classList.add('fa-solid');
            star.classList.remove('fa-regular');
        }

        // Set fa-regular class for stars to the right of the clicked star
        for (var j = Number(rating) + 1; j <= 5; j++) {
            var star = document.querySelector('.rating-container [data-rating="' + j + '"]');
            star.classList.remove('fa-solid');
            star.classList.add('fa-regular');
        }
    }
}
</script>
</body>
</html>