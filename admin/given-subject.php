 <?php include ('function.php');
error_reporting(0);
if(isset($_POST['save_grade'])){ 
	$enroll_id 		= mysqli_real_escape_string($conn, $_POST['enroll_id']); 
	$grade 			= mysqli_real_escape_string($conn, $_POST['grade']);
	$teacher_id 	= mysqli_real_escape_string($conn, $_POST['teacher_id']);
	


	$Update = mysqli_query ($conn, "UPDATE tbl_enrolled SET grade_id='$grade',teacher_id='$teacher_id' WHERE enroll_id='$enroll_id'");
	if($Update){
		echo'<div class="alert alert-success" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Successfully added new faculty in the database!</div>';
		}else{ 
		
			echo'<div class="alert alert-danger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Failed to add faculty in the database!</div>';
		}

}

if(isset($_POST['save_subject'])){
	$student	 = mysqli_real_escape_string($conn, $_POST['student_id']);
	$subject	 = mysqli_real_escape_string($conn, $_POST['subject']);
	$SchoolYear  = mysqli_real_escape_string($conn, $_POST['sy_id']);

	
	
	
	$InsertSubject = mysqli_query($conn, "INSERT INTO tbl_enrolled (student_id,subject_id,school_year_id) VALUES ('$student','$subject','$SchoolYear')");
		
		if($InsertSubject){

			echo'<div class="alert alert-success" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Successfully added new subject in the database!</div>';
		}else{ 
		
			echo'<div class="alert alert-danger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Failed to add subject in the database!</div>';
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
		<title>GIVEN SUBJECT PAGE</title>
	 
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
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
			 <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
							<div class="card-header">
								<div class="row">
								</div>
									<!-- this row will not appear when printing -->
								<div class="row no-print">
									<div class="col-12">
										<a href="subject-print.php?student_id=<?php echo $_GET['student_id'];?>&&encoding_id=<?php echo $_GET['encoding_id'];?>" rel="noopener" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-print"></i> Print</a>
										<button type="button" class="btn btn-warning float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#modal-warning5"><i class="fas fa-plus "></i> SUBJECT</button> 
									</div>
								</div>
								<div class="modal fade" id="modal-warning5">
									<div class="modal-dialog">
										<div class="modal-content bg-primary">
												<div class="modal-header">
													<h4 class="modal-title">SUBJECT</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div> 
											<form method="POST" enctype="multipart/form-data"> 
												<div class="modal-body">  
													<div class="row">
														<input type="hidden" name="student_id" class="form-control" value="<?php echo $_GET['student_id'];?>">
														<input type="hidden" name="sy_id" class="form-control" value="<?php echo $SchoolYearRow['sy_id'];?>">
														<div class="col-sm-12">
															<div class="form-group">
															 <label>Available Subject</label>
																<select type="text" name="subject" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
																  <option value=""></option>
																		<?php
																			$liststud= $_GET['student_id'];
																			$selectStudent =  mysqli_query($conn, "SELECT * FROM tbl_student where student_id='$liststud'");
																			$student = mysqli_fetch_array($selectStudent);
																			
																			$SelectSubject = mysqli_query($conn, "SELECT * FROM tbl_subject WHERE course='".$student['course']."'");
																			while($RowSubject = mysqli_fetch_array($SelectSubject)){ ?> 
																		<option value="<?php echo $RowSubject['subject_id'];?>"><?php echo $RowSubject['course_code'];?> <?php echo $RowSubject['descriptive_title'];?></option>
																		<?php } ?>
																</select>
															</div>
														</div>
													</div>
												<iv> 
												<div class="modal-footer justify-content-between">
													<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
													<button type="submit" name="save_subject" class="btn btn-outline-dark">Save</button>
												</div> 
											</form>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.modal -->
                            </div>
								<!-- <div class="col-8"> -->
									<h5>
										<i class="fas fa-user nav-icon"></i> Student Details
									</h5>
								<!-- </div> -->
								<?php
                                        $liststudents = $_GET['student_id'];
                                        $SelectQuery = mysqli_query($conn, "SELECT * FROM tbl_student WHERE student_id='$liststudents'");
                                        $rowStudents = mysqli_fetch_array($SelectQuery);

										$listSemester =$_GET['encoding_id'];
										$SelectSemester = mysqli_query($conn, "SELECT * FROM tbl_encoding WHERE encoding_id='$listSemester'");
										$rowSemester = mysqli_fetch_array($SelectSemester);
                                
                                ?>
								<!-- Main content -->
								<div class="invoice p-3 mb-3">
									<!-- title row -->
									<!-- info row -->
									<div class="row invoice-info">
										<div class="col-sm-4 invoice-col">
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student No:</b> <strong>	<?php echo $rowStudents['student_no'];?></strong><br>
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:</b> <strong><?php echo $rowStudents['first_name'];?> <?php echo $rowStudents['middle_name'];?>. <?php echo $rowStudents['last_name'];?></strong><br>
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender:</b> <strong> <?php echo $rowStudents['gender'];?></strong><br>
										</div>
										
										<div class="col-sm-4 invoice-col">
											<b>Course:</b><strong> <?php echo $rowStudents['course'];?></strong><br>
											<b>Semester:</b> <strong> <?php echo $rowSemester['semester'];?></strong><br>
										</div>
										<div class="col-sm-4 invoice-col">
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major:</b> <strong> <?php echo $rowStudents['major'];?></strong><br>
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Year:</b> <strong> <?php echo $SchoolYearRow['school_year'];?></strong><br>
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year Level:</b> <strong> <?php echo $rowSemester['year_level'];?></strong><br>
										</div>
										<!-- /.col -->
									</div>
								</div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
				<!-- </section> -->
				<!-- /.content -->
             	<!-- /.card -->
					<div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
										<th style = text-align:center;>Course Code</th>
                                        <th style = text-align:center;>Descriptive Title</th>
										<th style = text-align:center;>Lec Unit</th>
										<th style = text-align:center;>Lab Unit</th>
                                        <th style = text-align:center;>Grade</th>
										<th style = text-align:center;>Remarks</th>
                                        <th style = text-align:center;>Instructor</th>
										<th style = text-align:center;>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
                 
									$TotalAddGrade = 0;
									$TotalAverageGrade = 0;
									$Selectsub = mysqli_query($conn, "SELECT * FROM tbl_enrolled WHERE student_id='".$_GET['student_id']."'AND school_year_id='".$SchoolYearRow['sy_id']."'");
									while($row = mysqli_fetch_array($Selectsub)){

										$SelectSubjects = mysqli_query($conn, "SELECT * FROM tbl_subject WHERE subject_id='".$row['subject_id']."'");
										$RowSubject = mysqli_fetch_array($SelectSubjects);
										$NumberSubject = mysqli_num_rows($Selectsub);

										$SelectGrades = mysqli_query($conn, "SELECT * FROM tbl_grade WHERE grade_id='".$row['grade_id']."'");
										$RowGrade = mysqli_fetch_array($SelectGrades);

										
										$SelectFaculty = mysqli_query($conn, "SELECT * FROM tbl_faculty WHERE teacher_id='".$row['teacher_id']."'");
										$RowFaculty = mysqli_fetch_array($SelectFaculty);


										$TotalAddGrade +=$RowGrade['grade'];
										$TotalAverageGrade = $TotalAddGrade/$NumberSubject;     
									?>
                                    <tr>
										<td style = text-align:center;><?php echo  $RowSubject['course_code'];?></td>
                                        <td style = text-align:center;><?php echo  $RowSubject['descriptive_title'];?></td>
                                        <td style = text-align:center;><?php echo  $RowSubject['lec_unit'];?></td>
										<td style = text-align:center;><?php echo  $RowSubject['lab_unit'];?></td>
                                        <td style = text-align:center;><?php echo  $RowGrade['grade'];?></td>
										<td style = text-align:center;><?php if($RowGrade['grade'] == ''){
											
											
											echo '';}elseif($RowGrade['grade'] == '4.00'){
												echo '<span style="color: red;">FAILED</span>';
											
											}elseif($RowGrade['grade'] == 'INC'){
												echo '<span style="color: blue;">INCOMPLETE</span>';
											}elseif($RowGrade['grade'] == 'DRP'){
												echo '<span style="color: red;">DROP</span>';
											}else{
												echo '<span style="color: green;">PASSED</span>';
											}
												?>
										</td>
										<td style = text-align:center;><?php echo $RowFaculty['first_name'].' '.$RowFaculty['middle_name'][0].'. '.$RowFaculty['last_name'].'';?></td>
										<td style = text-align:center;><a class="btn btn-primary" data-toggle="modal" data-target="#modal-warning5<?php echo $row['enroll_id'];?>"><i class="fas fa-plus"></i></a><a class="btn btn-warning" href="deletesubject2.php?enroll_id=<?php echo $row['enroll_id'];?>&&student_id=<?php echo $liststudents;?>&&encoding_id=<?php echo $_GET['encoding_id'];?>"><i class="fas fa-trash" onclick="return confirm('Are you sure, you want to delete it?')"></a></td>
										
                                    </tr>

									<div class="modal fade" id="modal-warning5<?php echo $row['enroll_id'];?>">
										<div class="modal-dialog">
											<div class="modal-content bg-primary">
												<div class="modal-header">
													<h4 class="modal-title">GIVEN GRADE</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div> 
												<form method="POST" enctype="multipart/form-data"> 
													<div class="modal-body">  
														<div class="row">
															<input type="hidden" name="enroll_id" class="form-control" value="<?php echo $row['enroll_id'];?>">
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Grade</label>
																	<select type="text" name="grade" class="form-control">
																		<option value=""></option>
																			<?php
																			$SelectGrade = mysqli_query($conn, "SELECT * FROM tbl_grade");
																			while($RowGrade = mysqli_fetch_array($SelectGrade)){ ?> 
																		<option value="<?php echo $RowGrade['grade_id'];?>"><?php echo $RowGrade['grade'];?></option>
																		<?php } ?>
																	</select>
																</div>
																<div class="form-group">
																	<label>Faculty</label>
																	<select type="text" name="teacher_id" class="form-control">
																		<option value=""></option>
																			<?php
																			$SelectFaculty = mysqli_query($conn, "SELECT * FROM tbl_faculty");
																			while($RowFaculty = mysqli_fetch_array($SelectFaculty)){ ?> 
																		<option value="<?php echo $RowFaculty['teacher_id'];?>"><?php echo $RowFaculty['first_name'].' '.$RowFaculty['middle_name'][0].'. '.$RowFaculty['last_name'];?></option>
																		 <?php } ?>
																	</select>
																</div>
															</div>
														</div>
													</div> 
													<div class="modal-footer justify-content-between">
														<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
														<button type="submit" name="save_grade" class="btn btn-outline-dark">Save</button>
													</div> 
												</form>
											</div>
										  <!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->			
									<?php }?>
                                </tbody>
								<tfoot>
										<td></td>
										<td></td>
										<td></td>
										<th style=text-align:center>Average:</th>
										<th style = text-align:center;><?php echo $TotalAverageGrade; ?></th>											
										<th style = text-align:center;>
										
										<?php
											
											if($TotalAverageGrade < 3.00){
												if($TotalAverageGrade == 0.00){
													echo '';
													}else{
														echo '<span style="color:green">PASSED</span>';
													}
											}else{
												echo '<span style="color: red;">FAILD</span>';
											}
												
										?></td>
										<td></td>
								</tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
					</div>
					<!-- /.card -->
            </section>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) --><!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
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
