<?php require_once ("function.php");
	error_reporting(0);
    if(isset($_POST['save'])){
	
		$employeeid		= mysqli_real_escape_string($conn, $_POST['employeeID']);
		$name			= mysqli_real_escape_string($conn, $_POST['name']);
		$user_n			= mysqli_real_escape_string($conn, $_POST['user_name']);
		$password		= mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_pass	= mysqli_real_escape_string($conn, $_POST['confirm_pass']);


		$photo 						= $_FILES['photo'];
		$fileName					= $_FILES['photo']['name'];
		$fileTmpName				= $_FILES['photo']['tmp_name'];
		$fileSize					= $_FILES['photo']['size'];
		$fileError					= $_FILES['photo']['error'];
		$fileType					= $_FILES['photo']['type'];
	 
		$fileExt 					= explode('.', $fileName);
		$fileActualExt				= strtolower(end($fileExt));
	 
		$allowed 					= array('jpg','jpeg','jpg','png','pdf');
	 if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 1000000){
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
			}else{
				echo "Your file is too big!";
			}
			
		}else{
			echo"There was an error uploading your file!";
		}
		 
	 }else{
		 echo "You cannot upload files of this type!";
	 } 
		
	
		if($password!=$confirm_pass){
			echo '<script>alert("Confirm password incorrect!")</script>';
		}else{

			$SaveUserAccount = mysqli_query($conn, "INSERT INTO tbl_user(employeeID, name, user_name, password, confirm_pass, picture)VALUES('$employeeid','$name','$user_n','$password','$confirm_pass','$fileDestination')");

				if($SaveUserAccount){

					echo'<div class="alert alert-success" style="text-align:center;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Successfully added new user in the database!</div>';
			}else{ 
		
				echo'<div class="alert alert-danger" style="text-align:center;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Failed to add user in the database!</div>';
			}		
		}
	}
	if(isset($_POST['edit_user'])){
		
		$userid			= mysqli_real_escape_string($conn, $_POST['user_id']);
		$employeeid		= mysqli_real_escape_string($conn, $_POST['employeeID']);
		$name			= mysqli_real_escape_string($conn, $_POST['name']);
		$user_n			= mysqli_real_escape_string($conn, $_POST['user_name']);
		$password		= mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_pass	= mysqli_real_escape_string($conn, $_POST['confirm_pass']);
		
		
		$photo 						= $_FILES['photo'];
		$fileName					= $_FILES['photo']['name'];
		$fileTmpName				= $_FILES['photo']['tmp_name'];
		$fileSize					= $_FILES['photo']['size'];
		$fileError					= $_FILES['photo']['error'];
		$fileType					= $_FILES['photo']['type'];
	 
		$fileExt 					= explode('.', $fileName);
		$fileActualExt				= strtolower(end($fileExt));
	 
		$allowed 					= array('jpg','jpeg','png','pdf');
	 if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 10000000){
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
			}else{
				echo "Your file is too big!";
			}
			
		}else{
			echo"There was an error uploading your file!";
		}
		 
	 }else{
		 echo "You cannot upload files of this type!";
	 } 

		if($password!=$confirm_pass){
			echo '<script>alert("Confirm password incorrect!")</script>';
		}else{

		$SaveUserAccount = mysqli_query($conn, "UPDATE tbl_user SET employeeID='".$employeeid."', name='".$name."', user_name='".$user_n."', password='".$password."', confirm_pass='".$confirm_pass."', picture='".$fileDestination."' where user_id='".$userid."'");

		if($SaveUserAccount){

			echo'<div class="alert alert-success" style="text-align:center;">
			<button type ="button" class="close" data-dismiss=a"alert">&time;</button>
			Successfully added new updated new user in the database!</div>';
		}else{

			echo'<div class="alert alert-danger" style=text-align:center;">
				<button type ="button" class="close" data-dismiss="alert">&times;</button>
				Failed to updated user in the database!</div>';
		}
	}
	
}

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>USER PAGE</title>
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
						  <img src="<?php if($row['picture'] == ''){echo '../dist/img/avatar5.png';}else{echo $row['picture'];}?>"class="img-circle elevation-2" alt="User Image">
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
									<a href="school_year.php" class="nav-link">
									  <i class="fas fa-calendar nav-icon"></i>
									  <p style="color:white;">School Year</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="user-account.php" class="nav-link active">
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
						
						<!-- /.modal -->
				
						<!-- /.content -->
						<!-- /.card -->
						<div class="card">
								<div class="card-header">
									<h5>
									<i class="fas fa-user nav-icon"></i> User List
									</h5>
								</div>
								<form method="POST">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit" name="search_button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
								</form>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
									<?php
										if(isset($_POST['search_button'])){
											$search =	mysqli_real_escape_string($conn, $_POST['search']);
											$SearchUser = mysqli_query($conn, "SELECT * FROM tbl_user WHERE employeeID LIKE '%$search%' OR name LIKE '%$search%' OR user_name LIKE '%$search%'");	
										}
									?>
										<thead>
											<tr>
												<th style = text-align:center;>#</th>
												<th style = text-align:center;>picture</th>
												<th style = text-align:center;>User ID</th>
												<th style = text-align:center;>Name</th>
												<th style = text-align:center;>User Name</th>
												<th style="text-align:center;">Action</th>
												
												
										</thead>
										<tbody>
										<?php
											$number = 1;
											$search =	mysqli_real_escape_string($conn, $_POST['search']);
											$SearchUser = mysqli_query($conn, "SELECT * FROM tbl_user WHERE employeeID LIKE '%$search%' OR name LIKE '%$search%' OR user_name LIKE '%$search%'");	
								
											$queryResult = mysqli_num_rows($SearchUser);
											if ($queryResult > 0){
												while($rowUser = mysqli_fetch_assoc($SearchUser)){ 		
										?>  
											<tr>
												
												<td style = text-align:center;><?php echo $number;?></td>
												<td style = text-align:center;><img src="<?php if($rowUser['picture'] == ''){echo '../dist/img/avatar5.png';}else{echo $rowUser['picture'];}?>" height="60px" class="elevation-2" alt="User Image"></td>
												<td style = text-align:center;><?php echo $rowUser['employeeID'];?></td>
												<td style = text-align:center;><?php echo $rowUser['name'];?></td>
												<td style = text-align:center;><?php echo $rowUser['user_name'];?></td>
												<td style = text-align:center;><div class="btn-group">
														<button type="button" class="btn btn-warning">Action</button>
														<button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<div class="dropdown-menu" role="menu">
															<a class="dropdown-item" data-toggle="modal" data-target="#modal-warning<?php echo $rowUser['user_id'];?>"><i class="fas fa-edit"></i>Edit</a>
															<a class="dropdown-item" href="delete-user-account.php?user_id=<?php echo $rowUser['user_id'];?><i class="fas fa-trash onclick="return confirm('Are you sure, you want to delete it?')"></i>  Delete</a> 
														</div>
													</div>
												</td>
											</tr>
													<!-- Add New Members -->
												<div class="modal fade" id="modal-warning<?php echo $rowUser['user_id'];?>">
													<div class="modal-dialog">
														<div class="modal-content bg-primary">
																<div class="modal-header">
																	<h4 class="modal-title">USER ACCOUNT</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																	<form method="POST" enctype="multipart/form-data">
																		<div class="modal-body">
																				<div class="row">
																				<input type="hidden" name="user_id" class="form-control" value="<?php echo $rowUser['user_id'];?>"> 
																					<div class="col-sm-6">
																						<!-- text input -->
																						<div class="form-group">
																							<label> User ID</label>
																							<input type="text" name="employeeID" class="form-control" value="<?php echo   $rowUser['employeeID'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>Name</label>
																							<input type="text"  name="name" class="form-control" value="<?php echo  $rowUser['name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<!-- text input -->
																						<div class="form-group">
																							<label>User Name</label>
																							<input type="email"  name="user_name" class="form-control" value="<?php echo $rowUser['user_name'];?>">
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>Password</label>
																							<input type="password" name="password" class="form-control" value="<?php echo $rowUser['password'];?>">
																						</div>
																					</div>
																					<div class="card-body">
																						<label>Confirm Password</label>
																						<input class="form-control" type="password" name="confirm_pass"  value="<?php echo  $rowUser['confirm_pass'];?>">
																					</div>
																					<!-- <div class="row"> -->
																					<div class="col-sm-12">
																						<!-- text input -->
																						<div class="form-group">
																							<label>Picture:</label>
																							<input type="file" name="photo" class="form-control" value= "<?php echo $rowUser['picture'];?>" required>
																						</div>
																					</div>  
																				</div>
																			</div>
																		<div class="modal-footer justify-content-between">
																			<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
																			<button type="submit" name="edit_user" class="btn btn-outline-light">Save Change</button>
																		</div>
																	</form>	
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
											<?php $number++; }}?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
						    </div>
								<!-- /.card -->
                                <!-- /.modal -->
                            <div class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-primary"><i class="fas fa-plus"></i> Create Account</button>
                                        </div><!-- /.col --> 
                                    </div><!-- /.row -->
							    </div><!-- /.container-fluid -->
						    </div>
							<!-- Add New Members -->
						<div class="modal fade" id="modal-primary">
							<div class="modal-dialog">
								<div class="modal-content bg-warning">
										<div class="modal-header">
											<h4 class="modal-title">USER ACCOUNT</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
											<form method="POST" enctype="multipart/form-data">
												<div class="modal-body">
														<div class="row">
															<div class="col-sm-6">
																<!-- text input -->
																<div class="form-group">
																	<label> User ID</label>
																	<input type="text" name="employeeID" class="form-control" placeholder="Enter ...">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label>Name</label>
																	<input type="text"  name="name" class="form-control" placeholder="Enter ...">
																</div>
															</div>
															<div class="col-sm-6">
																<!-- text input -->
																<div class="form-group">
																	<label>User Name</label>
																	<input type="email"  name="user_name" class="form-control" placeholder="Enter ...">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label>Password</label>
																	<input type="password" name="password" class="form-control" placeholder="Enter ...">
																</div>
															</div>
                                                            <div class="card-body">
                                                                <label>Confirm Password</label>
                                                                <input class="form-control" type="password" name="confirm_pass"  placeholder="Enter ...">
														    </div>
															<!-- <div class="row"> -->
															<div class="col-sm-12">
																<!-- text input -->
																<div class="form-group">
																	<label>Picture:</label>
																	<input type="file" name="photo" class="form-control" placeholder="Enter ...">
																</div>
															</div>  
														</div>
													</div>
												<div class="modal-footer justify-content-between">
													<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
													<button type="submit" name="save" class="btn btn-outline-light">Save</button>
												</div>
											</form>	
								 </div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
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
</body>
</html>
