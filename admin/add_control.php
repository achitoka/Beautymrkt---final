<?php

include '../config/koneksi.php';
$product_img = $_FILES['product_img']['name'];
$foto_size = $_FILES['product_img']['size'];
$product_name   = $_POST['product_name'];
$category     = $_POST['category'];
$price    = $_POST['price'];

if ($foto_size > 9097152) {

	header("location:add_product.php?pesan=size");
}else{

	if ($product_img != "") {

		$ekstensi_izin = array('png','jpg','jepg');
		$pisahkan_ekstensi = explode('.', $product_img); 
		$ekstensi = strtolower(end($pisahkan_ekstensi));
		$file_tmp = $_FILES['product_img']['tmp_name'];   
		$tanggal = md5(date('Y-m-d h:i:s'));
		$product_img_new = $tanggal.'-'.$product_img; 

		if(in_array($ekstensi, $ekstensi_izin) === true)  {
	        move_uploaded_file($file_tmp, '../img/'.$product_img_new);
				  
							
				  $sql = "INSERT INTO product (product_img, product_name, category, price)
				  VALUES ('$product_img_new', '$product_name','$category','$price')";
      
				  $query = mysqli_query($conn, $sql);
  
                  // periska query apakah ada error
                  if($query){
					header("location:product.php?pesan=berhasil");
				} else {
					header("location:product.php?pesan=gagal");
				}
			
			} else { 
				// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
				header("location:product.php?pesan=ekstensi");        }
			}
		}	
	
?>
