<?php
include "../config/koneksi.php"
?>
<?php
$product_id = $_POST['product_id'];
$product_img = $_GET['product_img'];
$product_name   = $_POST['product_name'];
$category     = $_POST['category'];
$price    = $_POST['price'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE product SET product_id = '$product_id',
product_img = '$product_img', 
product_name = '$product_name', 
category = '$category',
price = '$price'
WHERE product_id = '$product_id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($conn->query($query)) {
    //redirect ke halaman index.php 
    header("location: product.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}