<?php

include('config/koneksi.php');
session_start();

if(isset($_POST['register'])) {
    // print_r($_POST);

	$nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
	$password2 = md5($_POST['password2']);
    $level = $_POST['user_type'];

    if($password != $password2) {
        echo "Passwords do not match";
        echo "<br><br> <button type='button' onclick='history.back();'> Back </button>";
        die;
    }

    // Insert tabel user
    // $sql_user = "INSERT INTO users () values ('')";
    $sql_user = "INSERT INTO users (nama, email, password, level) values ('$nama', '$email', '$password', '$level')";
    $result_user = mysqli_query($conn, $sql_user);

    if($result_user){
        $data_user = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
        while($u = mysqli_fetch_array($data_user)){
            $id_user = $u[0];
        }
        header('location:index.php');

    } else {
        // jika query users gagal
        echo "Error insert users: ". mysqli_error($conn);
        echo "<br><br> <button type='button' onclick='history.back();'> Back </button>";
        die;
    }

} else {
    header('location:signup.php');
}

?>