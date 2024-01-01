<?php
	session_start();
	include "../config/koneksi.php";

	$product_id = $_GET['product_id'];
	$user_id = $_SESSION['user_id'];

	$sql_check = "SELECT * FROM cart WHERE product_id='$product_id' AND user_id='$user_id'";
	$query_check = mysqli_query($conn, $sql_check);
	$row = mysqli_num_rows($query_check);

	$sql_get_produk = "SELECT * FROM product WHERE product_id='$product_id'";
	$query_produk = mysqli_query($conn, $sql_get_produk);
	$result_produk = mysqli_fetch_assoc($query_produk);

	$qty = 1;
	$price = $result_produk['price'];
	// echo $price;
	if($row == 0) {
		$sql_order = "INSERT INTO cart (user_id,product_id, qty, harga) VALUES ('$user_id', '$product_id', '$qty', '$price')";
		echo "Masuk Belum Ada";
	} else {
		$sql_order = "UPDATE cart SET qty= qty + 1 WHERE user_id ='$user_id' AND product_id='$product_id'";
		echo "Masuk Update";
	}

	$query = mysqli_query($conn, $sql_order);

	if($query) {
		print_r($query);
		echo "Berhasil";
	} else {
		print_r($query);
		echo "Gagal";
	}

	header('location: product.php');
?>