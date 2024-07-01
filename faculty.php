<?php include ('function.php');
error_reporting(0);
	if(isset($_POST['save_faculty'])){

		$firstname			= mysqli_real_escape_string($conn, $_POST['first_name']);
		$middlename			= mysqli_real_escape_string($conn, $_POST['middle_name']);
		$lastname			= mysqli_real_escape_string($conn, $_POST['last_name']);
		$employee			= mysqli_real_escape_string($conn, $_POST['employee_number']);
		$gender				= mysqli_real_escape_string($conn, $_POST['gender']);
		$contact			= mysqli_real_escape_string($conn, $_POST['contact']);
		
		$SelectQueryFaculty = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_faculty WHERE first_name='$firstname' AND middle_name='$middlename' AND last_name='$lastname'"));
		if($SelectQueryFaculty > 0){
		   echo '<div class="alert alert-danger" style="text-align:center;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		   Name already Exist!</div>';
		}else{

		$SaveFaculty = mysqli_query($conn, "INSERT INTO tbl_faculty (first_name, middle_name, last_name, employee_number, gender, contact) VALUES ('$firstname','$middlename','$lastname','$employee','$gender','$contact')");
		
		if($SaveFaculty){

			echo'<div class="alert alert-success" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Successfully added new faculty in the database!</div>';
		}else{ 
		
			echo'<div class="alert alert-danger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Failed to add faculty in the database!</div>';
		}

	}

	}
	if(isset($_POST['edit_faculty'])){
		$teacherid			= mysqli_real_escape_string($conn, $_POST['teacher_id']);
		$firstname			= mysqli_real_escape_string($conn, $_POST['first_name']);
		$middlename			= mysqli_real_escape_string($conn, $_POST['middle_name']);
		$lastname			= mysqli_real_escape_string($conn, $_POST['last_name']);
		$employee			= mysqli_real_escape_string($conn, $_POST['employee_number']);
		$gender				= mysqli_real_escape_string($conn, $_POST['gender']);
		$contact			= mysqli_real_escape_string($conn, $_POST['contact']);

		$SaveFaculty = mysqli_query($conn, "UPDATE tbl_faculty SET first_name='".$firstname."',  middle_name='".$middlename."', last_name='".$lastname."', employee_number='".$employee."',  gender='".$gender."', contact='".$contact."' where teacher_id='".$teacherid."'");

		if($SaveFaculty){

			echo'<div class="alert alert-success" style="text-align:center;">
			<button type ="button" class="close" data-dismiss=a"alert">&time;</button>
			Successfully added new faculty new student in the database!</div>';
		}else{

			echo'<div class="alert alert-danger" style=text-align:center;">
				<button type ="button" class="close" data-dismiss="alert">&times;</button>
				Failed to add faculty in the database!</div>';
		}
	}
	$SelectQuerySchoolYear = mysqli_query($conn, "SELECT * FROM school_year WHERE status='active'");
	$SchoolYearRow = mysqli_fetch_array($SelectQuerySchoolYear);
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>FACULTY PAGE</title>
	   <!-- Select2 -->
		<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
		<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
		<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
				<a href="homepage.php" class="brand-link">
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
						  <a href="hompepage.php" class="d-block"><?php echo $row['name'];?></a>
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
									<li class="nav-item">
										<a href="student.php" class="nav-link">
										  <i class="fas fa-users nav-icon"></i>
										  <p style="color:white;">STUDENT</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="faculty.php" class="nav-link active">
										  <i class="fas fa-users nav-icon"></i>
										  <p style="color:white;">FACULTY</p>
										</a>
									</li> 
							</li>
							<li class="nav-item menu-open"> 
								<a href="#" class="nav-link active">
								  <i class="fas fa-book nav-icon"></i>
								  <p>
									Evalution Module
									<i class="right fas fa-angle-left"></i>
								  </p>
								</a> 
								<ul class="nav nav-treeview">  
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
								</ul>  
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
								<li class="nav-item">
									<a href="about.php" class="nav-link">
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
				<!-- /.modal -->
					<!-- /.content-header --> 
					<!-- Main content -->
				<br>
				<section class="content">
					<div class="container-fluid">  
												<!-- /.content --> 
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-primary"><i class="fas fa-plus"></i> FACULTY</button> 
									</div><!-- /.col --> 
								</div><!-- /.row -->
							</div><!-- /.container-fluid -->
						</div>
							<!-- Add New Members -->
						<div class="modal fade" id="modal-primary">
							<div class="modal-dialog">
								<div class="modal-content bg-warning">
									<div class="modal-header">
										<h4 class="modal-title">FACULTY</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<form method="POST">
												<div class="modal-body">
														<div class="row">
															<div class="col-sm-6">
																<!-- text input -->
																<div class="form-group">
																	<label>First Name</label>
																	<input type="text" name="first_name" class="form-control" placeholder="Enter ...">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label>Middle Name</label>
																	<input type="text"  name="middle_name" class="form-control" placeholder="Enter ...">
																</div>
															</div>
															<div class="col-sm-6">
																<!-- text input -->
																<div class="form-group">
																	<label>Last Name</label>
																	<input type="text"  name="last_name" class="form-control" placeholder="Enter ...">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label>Employee No.</label>
																	<input type="text" name="employee_number" class="form-control" placeholder="Enter ...">
																</div>
															</div>
															<div class="row">
															<div class="col-sm-12">
																<!-- select -->
																<div class="form-group">
																	<label>Gender</label>
																	<select  type="text" name="gender" class="form-control" required>
																		<option></option>
																		<option>Male</option>
																		<option>Female</option>
																	</select>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Contact</label>
																	<input type="text" name="contact" class="form-control" placeholder="Enter ...">
																</div>
															</div>
														</div>
													</div>
												<div class="modal-footer justify-content-between">
													<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
													<button type="submit" name="save_faculty" class="btn btn-outline-light">Save</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->
				
						<!-- /.content -->
						<!-- /.card -->
						<div class="card">
								<div class="card-header">
									<h5>
									<i class="fas fa-users nav-icon"></i> Faculty
									</h5>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th style = text-align:center;>Employee No</th>
												<th style = text-align:center;>Name</th>
												<th style = text-align:center;>Gender</th>
												<th style = text-align:center;>Contact</th>
												<th style = text-align:center;>Action</th>
												
												
										</thead>
										<tbody>
											<?php  
												$number = 1;
												$SelectQuery = mysqli_query($conn, "SELECT * FROM tbl_faculty");
												$queryResult = mysqli_num_rows($SelectQuery);
												if ($queryResult > 0){
													while($rowFaculty = mysqli_fetch_assoc($SelectQuery)){ 
											?>  
											<tr>
												<td><?php echo $number;?></td>
												<td><?php echo $rowFaculty['employee_number'];?></td>
												<td><?php echo $rowFaculty['first_name'].' '.$rowFaculty['middle_name'][0].'. '.$rowFaculty['last_name'.''];?></td>
												<td><?php echo $rowFaculty['gender'];?></td>
												<td><?php echo $rowFaculty['contact'];?></td>
												<td><div class="btn-group">
														<button type="button" class="btn btn-warning">Action</button>
														<button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<div class="dropdown-menu" role="menu">
															<a class="dropdown-item" data-toggle="modal" data-target="#modal-primary<?php echo $rowFaculty['teacher_id'];?>"><i class="fas fa-edit"></i>Edit</a>
															<a class="dropdown-item" href="deletefaculty.php?teacher_id=<?php echo $rowFaculty['teacher_id'];?><i class="fas fa-trash onclick="return confirm('Are you sure, you want to delete it?')"></i> Delete</a> 
														</div>
													</div>
												</td>
											</tr>
												<!-- Add New Members -->
												<div class="modal fade" id="modal-primary<?php echo $rowFaculty['teacher_id'];?>">
													<div class="modal-dialog">
														<div class="modal-content bg-primary">
															<div class="modal-header">
																<h4 class="modal-title">FACULTY</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																	</div>
																	<form method="POST">
																		<div class="modal-body">
																				<div class="row">
																				<input type="hidden" name="teacher_id" class="form-control" value="<?php echo $rowFaculty['teacher_id'];?>"> 
																					<div class="col-sm-6">
																						<!-- text input -->
																						<div class="form-group">
																							<label>First Name</label>
																							<input type="text" name="first_name" class="form-control" value="<?php echo  $rowFaculty['first_name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>Middle Name</label>
																							<input type="text"  name="middle_name" class="form-control" value="<?php echo  $rowFaculty['middle_name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<!-- text input -->
																						<div class="form-group">
																							<label>Last Name</label>
																							<input type="text"  name="last_name" class="form-control" value="<?php echo $rowFaculty['last_name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>Employee No.</label>
																							<input type="text" name="employee_number" class="form-control"  value="<?php echo $rowFaculty['employee_number'];?>">
																						</div>
																					</div>
																					<div class="row">
																					<div class="col-sm-12">
																						<!-- select -->
																						<div class="form-group">
																							<label>Gender</label>
																							<select  type="text" name="gender" class="form-control" required>
																								<option value="<?php echo $rowFaculty['gender'];?>"><?php echo $rowFaculty['gender'];?></option>
																								<option value="Male">Male</option>
																								<option value="Female">Female</option>
																							</select>
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group">
																							<label>Contact</label>
																							<input type="text" name="contact" class="form-control" value="<?php echo $rowFaculty['contact'];?>">
																						</div>
																					</div>
																				</div>
																			</div>
																		<div class="modal-footer justify-content-between">
																			<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
																			<button type="submit" name="edit_faculty" class="btn btn-outline-light">Save</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
												<!-- /.modal -->
											<?php $number++; }}?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
						</div>
								<!-- /.card -->
					</div>      <!-- /.container-fluid -->
				</section>

			</div>
		<!-- /.content-wrapper --> 
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }); 
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
</body>
</html>
