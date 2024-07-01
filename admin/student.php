<?php include ("function.php");
	error_reporting(0);

	
	if(isset($_POST['add_student'])){

		$firstname				= mysqli_real_escape_string($conn, $_POST['first_name']);
		$middlename				= mysqli_real_escape_string($conn, $_POST['middle_name']);
		$lastname				= mysqli_real_escape_string($conn, $_POST['last_name']);
		$studentno				= mysqli_real_escape_string($conn, $_POST['student_no']);
		$gender					= mysqli_real_escape_string($conn, $_POST['gender']);
		$course					= mysqli_real_escape_string($conn, $_POST['course']);
		$semester				= mysqli_real_escape_string($conn, $_POST['semester']);
		$school_year			= mysqli_real_escape_string($conn, $_POST['school_year']);
		$major					= mysqli_real_escape_string($conn, $_POST['major']);
		
		$SelectQueryStudent = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_student WHERE first_name='$firstname' AND middle_name='$middlename' AND last_name='$lastname'"));
		if($SelectQueryStudent > 0){
		   echo '<div class="alert alert-danger" style="text-align:center;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		   Name already Exist!</div>';
		}else{
		$SaveStudent = mysqli_query($conn, "INSERT INTO tbl_student (first_name, middle_name, last_name, student_no, gender ,course ,semester ,school_year, major) VALUES ('$firstname','$middlename','$lastname','$studentno','$gender','$course','$semester','$school_year','$major')");
		
		if($SaveStudent){

			echo'<div class="alert alert-success" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Successfully added new student in the database!</div>';
		}else{ 
		
			echo'<div class="alert alert-danger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Failed to add student in the database!</div>';
		}

		}
	}
	if(isset($_POST['edit_student'])){
		$student_id				= mysqli_real_escape_string($conn, $_POST['student_id']);
		$firstname				= mysqli_real_escape_string($conn, $_POST['first_name']);
		$middlename				= mysqli_real_escape_string($conn, $_POST['middle_name']);
		$lastname				= mysqli_real_escape_string($conn, $_POST['last_name']);
		$studentno				= mysqli_real_escape_string($conn, $_POST['student_no']);
		$gender					= mysqli_real_escape_string($conn, $_POST['gender']);
		$course					= mysqli_real_escape_string($conn, $_POST['course']);
		$semester				= mysqli_real_escape_string($conn, $_POST['semester']);
		$school_year			= mysqli_real_escape_string($conn, $_POST['school_year']);
		$major					= mysqli_real_escape_string($conn, $_POST['major']);
		
		
		$EditStudent = mysqli_query($conn, "UPDATE tbl_student SET first_name='".$firstname."', middle_name='".$middlename."', last_name='".$lastname."', student_no='".$studentno."', gender='".$gender."', course='".$course."', semester='".$semester."', school_year='".$school_year."', major='".$major."' WHERE student_id='".$student_id."'");
		if($EditStudent){

			echo'<div class="alert alert-success" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Successfully added new student in the database!</div>';
		}else{ 
		
			echo'<div class="alert alert-danger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Failed to add student in the database!</div>';
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
		<title>STUDENT PAGE</title>
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
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
									<li class="nav-item">
										<a href="student.php" class="nav-link active">
										  <i class="fas fa-users nav-icon"></i>
										  <p style="color:white;">STUDENT</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="faculty.php" class="nav-link">
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
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning1"><i class="fas fa-plus"></i> Student</button> 
						</div><!-- /.col --> 
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- Add New Members -->
			<div class="modal fade" id="modal-warning1">
				<div class="modal-dialog">
					<div class="modal-content bg-warning">
						<div class="modal-header">
							<h4 class="modal-title">STUDENT LIST</h4>
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
                                                <input type="text" name="middle_name" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ID No.</label>
                                                <input type="text" name="student_no" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select  type="text" name="gender" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select --> 
                                            <div class="form-group">
                                                <label>Course</label>
                                                <select  type="text" name="course" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="BS BIOLOGY">BS BIOLOGY</option>
                                                    <option value="BS INFORMATION TECHNOLOGY">BS INFORMATION TECHNOLOGY</option>
                                                    <option value="BS INFORMATION SYSTEM">BS INFORMATION SYSTEM</option>
                                                    <option value="BS COMPUTER SCIENCE">BS COMPUTER SCIENCE</option>
                                                    <option value="BS COMPUTER ENGINEERING">BS COMPUTER ENGINEERING</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Semester</label>
                                                <select type="text" name="semester" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="1st Semester">1st Semester</option>
                                                    <option value="2nd Semester">2nd Semester</option>
                                                    <option value="2nd Semester">Summer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>School Year</label>
                                                <select type="text" name="school_year" class="form-control" required>
                                                    <option value=""></option>
													<option value="2023-2024">2023-2024</option>
														<option value="2024-2025">2024-2025</option>
														<option value="2025-2026">2025-2026</option>
														<option value="2026-2027">2026-2027</option>
														<option value="2027-2028">2027-2028</option>
														<option value="2028-2029">2028-2029</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <label>Major</label>
                                            <input class="form-control" type="text" name="major"  placeholder="Enter ...">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="submit"  name="add_student" class="btn btn-outline-light">Save</button>
                            </div>
                        </form>
					</div>
				  <!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- /.content-header --> 
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
							<h5>
								<i class="fas fa-users nav-icon"></i> Student List
							</h5>
						</div>
						  <!-- /.card-header -->
							<div class="card-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th style = text-align:center;>Student ID</th>
											<th style = text-align:center;>Name</th>
											<th style = text-align:center;>Gender</th>
											<th style = text-align:center;>Course</th>
											<th style = text-align:center;>Major</th>
											<th style = text-align:center;>Semester</th>
											<th style = text-align:center;>School Year</th>
											<th style = text-align:center;>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php  
													$number = 1;
													$SelectQuery = mysqli_query($conn, "SELECT * FROM tbl_student");
													$queryResult = mysqli_num_rows($SelectQuery);
													if ($queryResult > 0){
														while($rowStudents = mysqli_fetch_assoc($SelectQuery)){ 
														
											?>  
										<tr>
											<td><?php echo $number; ?></td> 
											<td><?php echo $rowStudents['student_no'];?></td>
											<td><?php echo $rowStudents['last_name'].', '.$rowStudents['first_name'].' '.$rowStudents['middle_name'][0].'.';?></td>
											<td><?php echo $rowStudents['gender'];?></td>
											<td><?php echo $rowStudents['course'];?></td>
											<td><?php echo $rowStudents['major'];?></td>
											<td><?php echo $rowStudents['semester'];?></td>
											<td><?php echo $rowStudents['school_year'];?></td>
											<td><div class="btn-group">
													<button type="button" class="btn btn-warning">Action</button>
													<button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu" role="menu">
														<a class="dropdown-item" data-toggle="modal" data-target="#modal-primary<?php echo $rowStudents['student_id'];?>"<i class="fas fa-edit"></i>Edit</a>
														<a class="dropdown-item" href="deletestudent.php?student_id=<?php echo  $rowStudents['student_id'];?><i class="fas fa-trash onclick="return confirm('Are you sure, you want to delete it?')"></i> Delete</a> 
													</div>
												</div>
											</td> 
										</tr>
										<!-- Add New Members -->
												<div class="modal fade" id="modal-primary<?php echo $rowStudents['student_id'];?>">
													<div class="modal-dialog">
														<div class="modal-content bg-primary">
																<div class="modal-header">
																	<h4 class="modal-title">STUDENT</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																	<form method="POST">
																		<div class="modal-body">
																				<div class="row">
																				<input type="hidden" name="student_id" class="form-control" value="<?php echo  $rowStudents['student_id'];?>"> 
																					<div class="col-sm-6">
																						<!-- text input -->
																						<div class="form-group">
																							<label>First Name</label>
																							<input type="text" name="first_name" class="form-control" value="<?php echo  $rowStudents['first_name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>Middle Name</label>
																							<input type="text" name="middle_name" class="form-control" value="<?php echo  $rowStudents['middle_name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<!-- text input -->
																						<div class="form-group">
																							<label>Last Name</label>
																							<input type="text" name="last_name" class="form-control" value="<?php echo  $rowStudents['last_name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>ID No.</label>
																							<input type="text" name="student_no" class="form-control" value="<?php echo  $rowStudents['student_no'];?>">
																						</div>
																					</div>
																					
																					<div class="col-sm-6">
																						<!-- select -->
																						<div class="form-group">
																							<label>Gender</label>
																							<select  type="text" name="gender" class="form-control" required>
																								<option value="<?php echo $rowStudents['gender'];?>"><?php echo $rowStudents['gender'];?></option>
																								<option value="Male">Male</option>
																								<option value="Female">Female</option>
																							</select>
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<!-- text input -->
																						<div class="form-group">
																							<label>Course</label>
																							<input type="text" name="course" class="form-control" value="<?php echo  $rowStudents['course'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<!-- select -->
																						<div class="form-group">
																							<label>Semester</label>
																							<select type="text" name="semester" class="form-control" required>
																								<option value="<?php echo $rowStudents['semester'];?>"><?php echo $rowStudents['semester'];?></option>
																								<option value="1st Semester">1st Semester</option>
																								<option value="2nd Semester">2nd Semester</option>
																								<option value="summer">Summer</option>
																							</select>
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<!-- select -->
																						<div class="form-group">
																							<label>School Year</label>
																							<select type="text" name="school_year" class="form-control" required>
																								<option value="<?php echo $rowStudents['school_year'];?>"><?php echo $rowStudents['school_year'];?></option>
																								<option value="2022-2023">2022-2023</option>
																								<option value="2023-2024">2023-2024</option>
																								<option value="2024-2025">2024-2025</option>
																								<option value="2025-2026">2025-2026</option>
																								<option value="2026-2027">2026-2027</option>
																								<option value="2027-2028">2027-2028</option>
																							</select>
																						</div>
																					</div>
																					<div class="card-body">
																						<label>Major</label>
																						<input class="form-control" type="text" name="major"  value="<?php echo  $rowStudents['major'];?>">
																					</div>
																				</div>
																		</div>
																		<div class="modal-footer justify-content-between">
																			<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
																			<button type="submit"  name="edit_student" class="btn btn-outline-light">Save Change</button>
																		</div>
																	</form>
                                                                </div>
                                                            <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->	
											<?php $number++; }} ?>
									</tbody>
								</table>
							</div>
						  <!-- /.card-body -->
					</div>
						<!-- /.card -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
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
