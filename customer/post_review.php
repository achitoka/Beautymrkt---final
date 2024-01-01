<?php
	session_start();
	include "../config/koneksi.php";

    $product_id = $_GET['product_id'];
	$user_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $sql_check = "SELECT * FROM tb_review WHERE user_id='$user_id' && product_id='$product_id'";
    $query_check = mysqli_query($conn, $sql_check);
	$row = mysqli_num_rows($query_check);

    if ($row > 0) {
        echo "<script>alert('Your review already submitted');";
        echo "window.location.href = 'review.php?product_id=$product_id';</script>";
        exit;
    }

    $sql_review = "INSERT INTO tb_review (user_id,product_id,rating, review) VALUES ('$user_id', '$product_id', '$rating', '$review')";

    $query = mysqli_query($conn, $sql_review);

	if($query) {
		print_r($query);
		echo "Berhasil";
	} else {
		print_r($query);
		echo "Gagal";
	}

	header('location: review.php?product_id='.$product_id);
?>