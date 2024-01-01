<?php
    session_start();
    if (!isset($_SESSION['status'])){
        header("Location: ../index.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
<head>  
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Beautymrkt | Admin</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/index.css">


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat Brush">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text" >
                    Beautymrkt
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="product.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Product</p>
                    </a>
                </li>
             
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                        <div id="layoutSidenav_content">
                 <main>
                    <div class="container-fluid">
                        <h2 class="mt-4">Add Product</h2>
                        <?php 
  
  include('../config/koneksi.php');
  
  $product_id = $_GET['product_id'];
  
  $query = "SELECT * FROM product WHERE product_id = '$product_id'";

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  ?>
            <form action="proses_update.php" method="POST" enctype="multipart/form-data">
             <div class="form-group">
                    <label for="product_id">Product ID</label>
                    <input type="text" name="product_id" class="form-control" id="product_id" value="<?php echo $row ['product_id'] ?>"  placeholder="Product Name" readonly/>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo $row ['product_name'] ?>"  placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" value="<?php echo $row ['category'] ?>" class="form-control">
                              <option selected>Choose Category</option>
                                <option>Haircare</option>
                                <option>Skincare</option>
                                <option>Makeup</option>
                              </select>
                </div>
       
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" value="<?php echo $row ['price'] ?>" name="price"  class="form-control" id="price"  placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="product_img">Product Image</label>
                    <input type="file" value="<?php echo $row ['product_img'] ?>"  name="product_img" id="product_img" class="file-upload-default">
                       

                </div>
                <button type="submit" name="btn-simpan" class="btn btn-primary">Save</button>
            
                </form>
                <br>
                        <tbody>
     </div>
                
                        </div>
                    </div>
                </main>
          
            </div>
        </div>
 
                        </div>
                    </div>
                </div>



           
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Beautymrkt</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    
</html>
