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
            <a class="navbar-brand" href="#">Administrator</a>
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
                        <h2 class="mt-4">Data Product</h2>
                            <div class="card-body">

                               <a href="add_product.php"><button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                                Add Product
                                </button></a>
                                <br><br>
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>  
                                        <tbody>
                                        <?php
							include "../config/koneksi.php";
							$no =1;
							$sql = "SELECT * FROM product";
							$query = mysqli_query($conn, $sql);
							
							while($result = mysqli_fetch_array($query)){
						?>
							<tr>
                                <td><?= $no++?></td>
                                <td>
			<?php 
			if ($result['product_img'] == "") { ?>
				<img src="https://images.app.goo.gl/CztrSHiVs76rPZGy6" style="width:80px;height:80px;">
			<?php }else{ ?>
				<img src="../img/<?php echo $result['product_img']; ?>" style="width:80px;height:80px; border-radius: 0;">
			<?php } ?>
		</td>
								<td><?= $result['product_name'] ?></td>
                                <td><?= $result['category'] ?></td>
                                <td><?= $result['price'] ?></td>
                          
							
							
                <td>
                <a class="btn btn-success" href="update_product.php?product_id=<?= $result['product_id'] ?>" role="button">Edit</a>
                <a class="btn btn-danger" href="delete.php?product_id=<?= $result['product_id'] ?>" role="button">Hapus</a>
                                            
                </td>
							</tr>
							<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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
