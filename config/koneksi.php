<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "db_ascf";

$conn = mysqli_connect($host, $username, $password, $database, 8111);

if($conn->connect_error){
    echo "Koneksi database gagal: ". mysqli_connect_error();
    die;
} else {
    // echo "Koneksi database berhasil";
}

?>