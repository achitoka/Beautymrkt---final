
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
    <title>Login</title>
</head>
<body>
    <div class="grid-container">
        <div class="title"><h2>BeautyMrkt</h2></div>
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
        <div class="form-login">
            <form action="login_control.php" method="POST">
                <h2>Login</h2>

                <div class="Signup">
                  <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </div>

                <div class="input-box1">
                  <input type="text" name="email" placeholder="email" required>
                  <i class='bx bxs-envelope' ></i>
                </div>

                <div class="input-box1">
                  <input type="password" name="password" placeholder="password" required>
                  <i class='bx bxs-lock-alt' ></i>
                </div>

                <button type="submit" name="btn_login" class="btn-login">Login</button>
              </form>
        </div>

        <div class="termofcondition"><p>By login, you agree to our Terms and conditions & Privacy Policy</p></div>  
    </div>
</body>
</html>