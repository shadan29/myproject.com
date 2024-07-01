<?php
session_start();
include "connection.php";

if (isset($_POST['submit_button'])){
	$fname = $_POST['first_name'];
	$mname = $_POST['middle_name'];
	$lname = $_POST['last_name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	// $course = $_POST['course'];
	$address = $_POST['address'];
	$contactnum = $_POST['contact_num'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	// $dob = $_POST['date_of_birth'];
	// $pob = $_POST['place_of_birth'];
	// $namefather = $_POST['name_of_father'];
	// $occupation = $_POST['occupation'];
	// $namemother = $_POST['name_of_mother'];
	// $occupation = $_POST['occupation'];
	// $question = $_POST['question'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	
	$save_query = mysqli_query($conn, "INSERT INTO tbl_register(first_name, middle_name, last_name, age, gender, address, contact_num, email, status, username, pass) VALUES ('$fname', '$mname', '$lname', '$age','$gender', '$address', '$contactnum', '$email', '$status','$username','$pass')");
	if($save_query){
		echo '<script>alert("Succesfully Save")</script>'
		;
		
		}else{
			echo '<script>alert("Failed to save data")</script>';
		}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>regestration form</title>
		<link rel="stylesheet" href="login.css">
	</head>
	<body class="class-for-register">
			
		<form method="post">
				<center>
			<fieldset class="class-for-register">
				<center>
				<h1><legend>Registration Form</legend></h1>
				</center>
				<label>First name:</label><br>
				<input type="text" name="first_name"required><br>
				<label>Middle name:</label><br>
				<input type="text" name="middle_name"required><br>
				<label>Last name:</label><br>
				<input type="text" name="last_name"required><br>
				<label>Age:</label><br>
				<input type="text" name="age"required><br>
				<label>Gender:</label><br>
				<input type="text" name="gender"required><br>
				<!-- <label>Course:</label><br>
				<input type="text" name="course"required><br> -->
				<label>Address:</label><br>
				<input type="text" name="address"required><br>
				<label>Contact Number:</label><br>
				<input type="text" name="contact_num"required><br>
				<label>Email Address:</label><br>
				<input type="text" name="email"required><br>
				<label>Status:</label><br>
				<input type="text" name="status"required><br>
				<!-- <label>Date of Birth:</label><br>
				<input type="text" name="date_of_birth"><br>
				<label>Place of Birth:</label><br>
				<input type="text" name="place_of_birth"><br>
				<label>Name of Father:</label><br>
				<input type="text" name="name_of_father"><br>
				<label>Occupation:</label><br>
				<input type="text" name="occupation"><br>
				<label>Name of Mother:</label><br>
				<input type="text" name="name_of_mother"><br>
				<label>Occupation:</label><br>
				<input type="text" name="occupation"><br>
				<label>Question?</label><br>
				<input type="text" name="question"><br>-->
				<label>Username:</label><br>
				<input type="text" name="username"required><br>
				<label>Password:</label><br>
				<input type="password" name="pass"required><br><br>
				<div>
				<input type="submit" name="submit_button" value="submit"><br>
				</div>
				<h3></style> <a href="login.php">Sign in here!</a></h3>
			</fieldset>
			</center>
		</form>
	</body>
</html>