<?php   include ("function.php");
	error_reporting(0);
if(isset($_POST['save_school_year'])){
    
    $school_year		= mysqli_real_escape_string($conn, $_POST['school_year']);
	$semester			= mysqli_real_escape_string($conn, $_POST['semester']);

	$SelectQuery = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM school_year WHERE school_year='$school_year' AND semester='$semester'"));
		if($SelectQuery > 0){
		   echo '<div class="alert alert-danger" style="text-align:center;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		   school year and semester already Exist!</div>';
		}else{


    $SavesChoolYear = mysqli_query($conn, "INSERT INTO school_year (school_year,semester) VALUES ('$school_year','$semester')");

    if($SavesChoolYear){

        echo'<div class="alert alert-success" style="text-align:center;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Successfully added new school year in the database!</div>';
    }else{ 
    
        echo'<div class="alert alert-danger" style="text-align:center;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Failed to add school year in the database!</div>';
    }

	}
}





?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SCHOOL YEAR PAGE</title>
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
									<a href="school_year.php" class="nav-link active">
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
                         <br> 
                            <div class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-primary"><i class="fas fa-plus"></i>ADD YEAR</button> 
                                        </div><!-- /.col --> 
                                    </div><!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </div>
                                <!-- Add New Members -->
                                
                            <div class="modal fade" id="modal-primary">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-header">
                                            <h4 class="modal-title">ADD YEAR</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <form method="POST">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                                <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label>School Year</label>
                                                                <select name="school_year" class="form-control select2" style="width: 100%;">
                                                                    <option value=""></option>
                                                                        <option value="2023-2024">2023-2024</option>
                                                                        <option value="2024-2025">2024-2025</option>
                                                                        <option value="2025-2026">2025-2026</option>
                                                                        <option value="2026-2027">2026-2027</option> 
                                                                        <option value="2027-2028">2027-2028</option>
                                                                        <option value="2028-2029">2028-2029</option> 
                                                                </select>
                                                            </div>
                                                            <!-- /.form-group -->
															<!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label>Semester</label>
                                                                <select name="semester" class="form-control select2" style="width: 100%;">
                                                                    <option value=""></option>
                                                                        <option value="1st Semester">1st Semester</option>
																		<option value="2nd Semester">2nd Semester</option>
                                                                        <option value="Summer">Summer</option> 
                                                                </select>
                                                            </div>
                                                            <!-- /.form-group -->
                                                    </div>
                                                </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <button type="submit"  name="save_school_year" class="btn btn-outline-light">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                        <section class="content">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                      <h5>
                                      <i class="fas fa-calendar nav-icon"></i> School Year
                                      </h5>
                                    </div>
                                    <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style = text-align:center;>#</th>
                                                        <th style = text-align:center;>SCHOOL YEAR</th>
														<th style = text-align:center;>SEMESTER</th>
                                                        <th style = text-align:center;>STATUS</th>     
                                                        <th style = text-align:center;>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        $number = 1;
                                                        $SelectQuery= mysqli_query($conn, "SELECT * FROM school_year");
                                                        $queryResult = mysqli_num_rows($SelectQuery);
                                                        if ($queryResult > 0){
                                                            while($rowSchoolYear = mysqli_fetch_assoc($SelectQuery)){ 
                                                            
                                                      ?>  
                                                    <tr>
                                                        <td style = text-align:center;><?php echo $number; ?></td>
                                                        <td style = text-align:center;><?php echo $rowSchoolYear['school_year'];?></td>
														<td style = text-align:center;><?php echo $rowSchoolYear['semester'];?></td>
                                                        <td style = text-align:center;><?php if($rowSchoolYear['status'] == ''){ echo'<span class="badge badge-danger">Not Active</span>';}else{ echo '<span class="badge badge-warning">'.$rowSchoolYear['status'].'<span>';}?></td>  											
                                                        <td style = text-align:center;> <a href="edit-school-year.php?sy_id=<?php echo $rowSchoolYear['sy_id'];?>" class="btn btn-warning"><i class="fas fa-check"></i> SET ACTIVE</a></td>
                                                    </tr> 	
                                                        
                                                </tbody>
                                                <?php $number++;}}?>
                                            </table>
                                        </div>
                                    <!-- /.card-body -->
                                </div>
                                    <!-- /.card -->
                            </div><!-- /.container-fluid -->
                    </section>
                        <!-- /.content -->
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
</body>
</html>
