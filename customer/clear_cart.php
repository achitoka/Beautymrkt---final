<?php
include "../config/koneksi.php";
	session_start();
	$user_id = $_SESSION['user_id'];
	$_SESSION['message'] = 'Cart cleared successfully';
	$query = mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");
	header('location: cart.php');
?>