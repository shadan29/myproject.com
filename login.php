<?php
include "connection.php";

session_start();

if(isset($_POST['submit_button'])){
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	
	$sql = mysqli_query($conn, "SELECT * FROM tbl_register WHERE username='$username' AND pass='$pass'");
	
	if(mysqli_num_rows($sql) > 0){
		$row = mysqli_fetch_assoc($sql);
		$_SESSION['id'] = $row['id'];
		header('location: homepage.php');
}else{
	echo '<div  class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">$times;</button>
			Incorrect Password
		 </div>';
		}
}



?>

<!-- //if(isset($_POST['submit_button'])){
//$student_no = $_POST['student_no'];
//$password = $_POST['password'];

//	if($student_no == '201930009' && $password == 'student'){
//	header('location:homepage.php');
	
//}else{
//	echo 'Wrong Password or Wrong Student Number! Please try Again later.';
//	}
//} -->


<!DOCTYPE html>
<html>
	<head>
		<title>log in</title>
		<link rel="stylesheet" href="login.css">
	
	</head>
	<body class="class-for-login">
				
		<form method="post">
				
					<img src="images.jpg" alt="images" class="center">
					<h1>WELCOME TO SULU STATE COLLEGE LOG IN</h1>
					<hr>
					<center>
				<fieldset>
					<center>
					<legend>Log in</legend>
					</center>
					<label>Username?</label><br>
					<input type="text" name="username" required><br>
					<label>Password:</label><br>
					<input type="password" name="pass" required><br><br>
					<input type="submit" name="submit_button" value="login">
					<hr>
				
					<h3><a href="register.php">>> Register Now? <<</a></h3>
					<!-- <h3><a href="forgotpassword.php">>> Forgot Password? <<</a></h3> -->
					
				</fieldset>
					</center>
		</form>
					<p></p>
					<div>
					<footer>Covered by: PHP developer "student of CSE"|&#169;copyright2023.</footer>
					</div>
				
	</body>
</html>