<?php 
// mengaktifkan session php
error_reporting(0);
 
session_start();

include('config/koneksi.php');

if(isset($_POST['btn_login'])) {
    // jika sudah ditekan
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql_user = "SELECT * FROM users where email = '$email' and password = '$password'";
    $result_user = mysqli_query($conn, $sql_user);

    if(mysqli_num_rows($result_user) > 0) {
        // jika data tersedia, simpan data user kedalam session
        while($data_user = mysqli_fetch_array($result_user)){
            $_SESSION['status'] = "login";
            $_SESSION['user_id'] = $data_user['user_id'];
            $_SESSION['nama'] = $data_user['nama'];
            $_SESSION['level'] = $data_user['level'];

            if($data_user['level'] == 'admin') {
                header('location:admin/dashboard.php');
            }else if($data_user['level']=='customer'){
                header('location:customer/home.php');
        }
    }
}
    else{
        $_SESSION['login_error'] = "Invalid email or password!";
        header('location:index.php');
        }
    }
?>

	