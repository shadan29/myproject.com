<?php include('function.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HOMEPAGE</title>
	 
		<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- JQVMap -->
		<link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../dist/css/adminlte.min.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
		<!-- summernote -->
		<link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
	</head>
	<body class="hold-transition sidebar-mini layout-fixed" style="background-color:blue;">
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-blue">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li> 
				</ul>  
			</nav>
			  <!-- /.navbar -->

		  <!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link active">
				  <img src="../dist/img/BIO.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				  <span class="brand-text font-weight-white">HOMEPAGE</span>
				</a> 
				<!-- Sidebar -->
				<div class="sidebar">
				  <!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
						  <img src="<?php if($row['picture'] == ''){echo '../dist/img/avatar5.png';}else{echo $row['picture'];}?>" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
						  <a href="homepage.php" class="d-block"><?php echo $row['name'];?></a>
						</div>
					</div> 
					  <!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						  <!-- Add icons to the links using the .nav-icon class
							   with font-awesome or any other icon font library -->
							
							<li class="nav-item menu-open"> 
								<a href="#" class="nav-link active">
								  <i class="nav-icon fas fa-tachometer-alt"></i>
								  <p>
									Services
									<i class="right fas fa-angle-left"></i>
								  </p>
								</a>
								<ul class="nav nav-treeview"> 
									<li class="nav-item">
										<a href="student.php" class="nav-link">
										<i class="fas fa-users nav-icon"></i>
										  <p style="color:white;">STUDENT</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="faculty.php" class="nav-link">
										<i class="fas fa-users nav-icon"></i>
										  <p style="color:white;">FALCUTY</p>
										</a>
									</li> 
								</ul>   
							</li>
							<li class="nav-item menu-open"> 
								<a href="#" class="nav-link active">
								  <i class="fas fa-book nav-icon"></i>
								  <p>
									Evalution Module
									<i class="right fas fa-angle-left"></i>
								  </p>
								</a> 
								
									<li class="nav-item">
										<a href="subject.php" class="nav-link">
										<i class="fas fa-book nav-icon"></i>
										  <p style="color:white;">Curriculum</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="encoding.php" class="nav-link">
										<i class="fas fa-book nav-icon"></i>
										  <p style="color:white;">Encoding</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="grades.php" class="nav-link">
										  <i class="fas fa-file nav-icon"></i>
										  <p style="color:white;">Grades</p>
										</a>
									</li>			
									<li class="nav-item">
										<a href="school_year.php" class="nav-link">
											<i class="fas fa-calendar nav-icon"></i>
											<p style="color:white;">School Year</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="user-account.php" class="nav-link">
										<i class="fas fa-user nav-icon"></i>
										  <p style="color:white;">User Account</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="logout.php" class="nav-link">
											<i class="fas fa-arrow-circle-left nav-icon"></i>
											<p style="color:white;">Logout</p>
										</a>
									</li>
									</li>
									<li class="nav-item">
									<a href="about.php" class="nav-link active">
									<i class="fas fa-user nav-icon"></i>
									  <p style="color:white;">About</p>
									</a>
								</li>
							</li> 
						</ul>
					</nav>
				  <!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper"> 
			<!-- Main content -->
			<section class="content">
					
				<!-- Default box -->
				<div class="card card-solid">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-sm-5"> 
								<div class="col-14">
									<img src="../dist/img/prime.jpg"  width='240%' height='40%' class="background-image" alt="background Image">
								</div> 
							</div>
						</div>
					</div>
				</div>
			</section>




			<!-- /.content -->
		</div> 
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
