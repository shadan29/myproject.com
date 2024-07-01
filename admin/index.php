<?php

	require_once("config/connection.php"); 

	if(isset($_POST['submit_sign_in'])){

	$email = mysqli_real_escape_string($conn, $_POST['user_name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']); 


	$CheckEmailANDPassword = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_name='$email' AND password='$password'");
	if(mysqli_num_rows($CheckEmailANDPassword)> 0){
			$row = mysqli_fetch_assoc($CheckEmailANDPassword); 
				$_SESSION['user_id'] = $row[' user_id'];
				header('location: admin/homepage.php');
					exit();	 
			}else{
				echo '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Incorrect Password
					</div>';
			}
		}
    
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ARCS | Login Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">  

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6"> 
              <div class="col-12">
                <img src="dist/img/bsbio.png" class="product-image" alt="Product Image">
              </div> 
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" style="text-align:center;font-face:Berlin Sans FB Demi;">SULU STATE COLLEGE (BSBIOLOGY) <br> STUDENT EVALUATION SYSTEM</h3>
             

              <hr> 
				
				<!-- general form elements -->
				<div class="card card-default"> 
					<form method="POST">
					  <!-- /.card-header -->
						<div class="card-body">
							<h4>SIGN IN HERE!</h4>
							<div class="form-group">
								<label for="exampleInputBorder">Username: </label>
								<input type="email" name="user_name" class="form-control form-control-border" id="exampleInputBorder" placeholder="Ex. admin@gmail.com">
							</div>
							<div class="form-group">
								<label for="exampleInputBorderWidth2">Password: </label>
								<input type="password" name="password" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="*********">
							</div>   
						</div>
					  <!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="submit_sign_in" class="btn btn-primary">Sign In</button>
						</div>
					</form>
				</div>
				
				<!-- /.card -->
            </div>
          </div> 
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content --> 
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html> 