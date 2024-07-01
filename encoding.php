<?php include('function.php');
	error_reporting(0);
	date_default_timezone_set('Asia/Manila');

	$SelectQuerySchoolYear = mysqli_query($conn, "SELECT * FROM school_year WHERE status='active'");
	$SchoolYearRow = mysqli_fetch_array($SelectQuerySchoolYear);


	if(isset($_POST['save'])){

		$name		= mysqli_real_escape_string($conn, $_POST['name']);
		$school_y	= mysqli_real_escape_string($conn, $_POST['school_year']);
		$semester	= mysqli_real_escape_string($conn, $_POST['semester']);
		$year_l		= mysqli_real_escape_string($conn, $_POST['year_level']);
		$course		= mysqli_real_escape_string($conn, $_POST['course']);
		$datetime 	= date("F d, Y, h:i A");
		
		$SelectQueryStudent = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_encoding WHERE student_id='$name' AND school_year='$school_y' AND semester='$semester'"));
		if($SelectQueryStudent > 0){
		   echo '<div class="alert alert-danger" style="text-align:center;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		   Name already Exist!</div>';
		}else{

		$SaveEncoding = mysqli_query($conn, "INSERT INTO tbl_encoding (student_id, school_year, semester, year_level, course, date_enrolled) VALUES ('$name','$school_y','$semester','$year_l','$course','$datetime')");

		$SelectSubjectTobeEnrolled = mysqli_query($conn, "SELECT * FROM tbl_subject WHERE course='$course' AND semester='$semester' AND year_level='$year_l'");
		while($RowSubjectAll = mysqli_fetch_array($SelectSubjectTobeEnrolled)){

			$SaveAllSubject = mysqli_query($conn, "INSERT INTO tbl_enrolled (student_id, subject_id, school_year_id) VALUES ('$name','".$RowSubjectAll['subject_id']."','".$SchoolYearRow['sy_id']."')");

		}

		if($SaveEncoding){

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

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ENCODING PAGE</title>
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
										  <p style="color:white;">FACULTY</p>
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
										<a href="encoding.php" class="nav-link active">
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
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-primary"><i class="fas fa-plus"></i>Encoding</button> 
								</div><!-- /.col --> 
							</div><!-- /.row -->
						</div><!-- /.container-fluid -->
					</div>
						<!-- Add New Members -->
					<div class="modal fade" id="modal-primary">
						<div class="modal-dialog">
							<div class="modal-content bg-warning">
								<div class="modal-header">
									<h4 class="modal-title">ENCODING</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										</div>
										<form method="POST">
											<div class="modal-body">
													<div class="row">
													<!-- select -->
														<div class="col-sm-12">
															<div class="form-group">
																<label>Name</label>
																<select type="text" name="name" class="form-control" required>
																	<option value=""></option>
																		<?php
																		$SelectStudent = mysqli_query($conn, "SELECT * FROM tbl_student");
																		while($RowStudent = mysqli_fetch_array($SelectStudent)){ ?> 
																	  <option value="<?php echo $RowStudent['student_id']; ?>"><?php echo $RowStudent['student_no'].' - '. $RowStudent['first_name'].' '.$RowStudent['middle_name'][0].'. '.$RowStudent['last_name']; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<label>School Year</label>
																<input type="text" name="school_year" class="form-control" value="<?php echo $SchoolYearRow['school_year'];?>" readonly>
															</div>
														</div>
														<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label>Semester</label>
																<input type="text" name="semester" class="form-control" value="<?php echo $SchoolYearRow['semester'];?>" readonly>
															</div>
														</div>
														<div class="col-sm-6">
															<!-- /.form-group -->
															<div class="form-group">
																<label>Year Level</label>
																<select type="text" name="year_level" class="form-control" required>
																<option value=""></option>
																		<option value="1st Year">1st Year</option>
																		<option value="2nd Year">2nd Year</option>
																		<option value="3rd Year">3rd Year</option>
																		<option value="4th Year">4th Year</option>
			
																</select>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<label>Course</label>
																<select type="text" name="course" class="form-control" required>
																	<option value=""></option>
																	<option value="BS BIOLOGY">BS BIOLOGY</option>
																	<option value="BS INFORMATION TECHNOLOGY">BS INFORMATION TECHNOLOGY</option>
																	<option value="BS INFORMATION SYSTEM">BS INFORMATION SYSTEM</option>
																	<option value="BS COMPUTER SCIENCE">BS COMPUTER SCIENCE</option>
																	<option value="BS COMPUTER ENGINEERING">BS COMPUTER ENGINEERING</option>
																</select>
															</div>
														</div>
													</div>
											</div>
											<div class="modal-footer justify-content-between">
												<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
												<button type="submit"  name="save" class="btn btn-outline-light">Save</button>
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
								<i class="fas fa-book nav-icon"></i> Encoding List
								</h5>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
                                        <th style = text-align:center;>#</th>
                                        <th style = text-align:center;>Student ID</th>
                                        <th style = text-align:center;>Name</th>
                                        <!-- <th style = text-align:center;>Middle Name</th>
                                        <th style = text-align:center;>Last Name</th> -->
                                        <th style = text-align:center;>Gender</th>
                                        <th style = text-align:center;>Course</th>
                                        <th style = text-align:center;>Major</th>
										<th style = text-align:center;>Year Level</th>
                                        <th style = text-align:center;>Semester</th>
                                        <th style = text-align:center;>School Year</th>
										<th style = text-align:center;>Date Enrolled</th>
                                        <th style = text-align:center;>Action</th>
											
									</thead>
									<tbody>
									<?php 
											$number = 1;
											$SelectQueryStudent = mysqli_query($conn, "SELECT * FROM tbl_encoding WHERE school_year='".$SchoolYearRow['school_year']."'AND semester='".$SchoolYearRow['semester']."'");
											$queryResultStudent = mysqli_num_rows($SelectQueryStudent);
											if ($queryResultStudent > 0){
												while($rowStudents = mysqli_fetch_assoc($SelectQueryStudent)){ 
												  
												  $SelectMemberStudent = mysqli_query($conn, "SELECT * FROM tbl_student WHERE student_id='".$rowStudents['student_id']."'");
												  $SelectMemberStudent = mysqli_fetch_array($SelectMemberStudent);	  
									?>  
										<tr>
                                            <td><?php echo $number; ?></td>
                                            <td><?php echo $SelectMemberStudent['student_no'];?></td>
                                            <td><?php echo $SelectMemberStudent['first_name'].' '.$SelectMemberStudent['middle_name'][0].'. '.$SelectMemberStudent['last_name'].' ';?></td>
                                            <td><?php echo $SelectMemberStudent['gender'];?></td>
                                            <td><?php echo $SelectMemberStudent['course'];?></td>
                                            <td><?php echo $SelectMemberStudent['major'];?></td>
											<td><?php echo $rowStudents['year_level'];?></td>
                                            <td><?php echo $rowStudents['semester'];?></td>
                                            <td><?php echo $rowStudents['school_year'];?></td>
											<td><?php echo date("F d, Y, h:i A",strtotime($rowStudents['date_enrolled']));?></td>
                                            <td><div class="col-sm-0">
												<a class="btn btn-primary" href="given-subject.php?student_id=<?php echo $rowStudents['student_id'];?>&&encoding_id=<?php echo $rowStudents['encoding_id'];?>"><i class="fas fa-file"></i> Subject </a>
												<a class="btn btn-warning" href="deleteencoding.php?encoding_id=<?php echo  $rowStudents['encoding_id'];?><i class="fas fa-trash onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash"></i></a>
												</div>
                                            </td>
										 </tr>
											
												<!-- /.modal-content -->
											<!-- /.modal-dialog -->
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
