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
	
$SelectQuerySchoolYear = mysqli_query($conn, "SELECT * FROM school_year WHERE status='active'");
	$SchoolYearRow = mysqli_fetch_array($SelectQuerySchoolYear);
 
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>print</title>
		<script type="text/javascript">
      
      window.onafterprint = window.close;	
    </script>
	 
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
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper"> 
			 <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
						<img src="../dist/img/head.png" width="100%">
                            </div>
							<div class="invoice p-3 mb-3">
								<?php
                                        $liststudents = $_GET['student_id'];
                                        $SelectQuery = mysqli_query($conn, "SELECT * FROM tbl_student WHERE student_id='$liststudents'");
                                        $rowStudents = mysqli_fetch_array($SelectQuery);

										$listSemester =$_GET['encoding_id'];
										$SelectSemester = mysqli_query($conn, "SELECT * FROM tbl_encoding WHERE encoding_id='$listSemester'");
										$rowSemester = mysqli_fetch_array($SelectSemester);
                                
                                ?>
								<!-- Main content -->
								<!-- <div class="invoice p-3 mb-3"> -->
								<!-- <img src="../dist/img/header.png" height="60%" width="100%"> -->
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
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Year:</b> <strong> <?php echo $rowStudents['school_year'];?></strong><br>
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
												echo '<span style="color: red;">DROPPED</span>';
											}else{
												echo '<span style="color: green;">PASSED</span>';
											}
												?>
										</td>
										<td style = text-align:center;><?php echo $RowFaculty['first_name'].' '.$RowFaculty['middle_name'][0].'. '.$RowFaculty['last_name'].'';?></td>
										
                                    </tr>
									
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
												
										?>
											</th>

								</tfoot>
                            </table>
							<br>
							<br>
							<p style="width: 7em;min-width: 17em;max-width: 15em;text-align:center;font-size:20px;">Evaluated by:</p>
							<center>
							<table width="100" border="0">
								<tbody>
									<tr style="background-color:white;">
										<th style="width: 7em;min-width: 17em;max-width: 15em;text-align:center;font-size:12px;border-bottom: 1px solid black;">ASSO. PROF. PATRICIA I. AMILHUSIN,Ed.D</th>
										<th style="width: 7em;min-width: 3em;max-width: 15em;"></th>
										
									</tr>
									<tr style="background-color:white;">
										<td style="width: 7em;min-width: 20em;max-width: 20em;text-align:center;font-size:12px;">Dean, School of Arts and Science</td>
										<td></td>
										
									</tr> 
								</tbody>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
