<?php 
session_start();
                    
if(isset($_SESSION['pesan_registrasi'])) { ?>

<div class="alert alert-success">
    <?= $_SESSION['pesan_registrasi'] ?>
</div>
 
<?php } 
                    
if(isset($_SESSION['login_error'])) { ?>

<div class="alert alert-danger">
    <?= $_SESSION['login_error'] ?>
</div>
<?php } 
                    
session_destroy();
                    
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
    <link rel="stylesheet" href="css/index.css">
    <title>Register</title>
    <style>
		label {
			display: block;
		}
	</style>
</head>
<body>
    <div class="grid-container">
        <div class="title"><h2>BeautyMrkt</h2></div>
        
        <div class="form-regis">
            <form action="signup_control.php" method="post">
                <h2>Register</h2>

                    <div class="input-box">
                        <input type="text" name="nama" placeholder="nama" required>
                    </div>

                    <div class="input-box">
                        <input type="email" name="email" placeholder="email" required>
                    </div>

                    <div class="input-box">
                        <input type="password" name="password" placeholder="password" required>
                    </div>

                    <div class="input-box">
                        <input type="password" name="password2" placeholder="confirm password" required>
                    </div>
                    
                    <div class="input-box">
                        <select class="category" name="user_type">
                            <option value="customer">customer</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>

                    <button type="submit" name="register" class="btn-signup">Sign Up</button>
                    
                    <div class="login">
                        <p>Already have an account? <a href="index.php">Log In</a></p>
                    </div>
        </div>

        <div class="termofcondition"><p>By login, you agree to our Terms and conditions & Privacy Policy</p></div>  
    </div>
</body>
</html>