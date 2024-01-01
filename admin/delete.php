<?php
include "../config/koneksi.php"
?>
<?php 
$id = $_GET['product_id'];
$sql = "DELETE FROM product WHERE product_id='$id'";

$query = mysqli_query($conn, $sql);

if(!$query){
	echo "Gagal";
}else {
	header("location:product.php");
}

?>