<?php
error_reporting(0);
include "connection.php";


if (isset($_POST['save'])){

	$id = $_POST['id'];
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
	
	$save_query = mysqli_query($conn, "UPDATE tbl_register SET first_name = '".$fname."', middle_name = '".$mname."', last_name = '".$lname ."', age = '".$age."', gender = '".$gender."', address = '".$address."', contact_num ='".$contactnum."', email ='".$email."', status ='".$status."', username='".$username."', pass ='".$pass."' WHERE id = '".$id."'");
	if($save_query){
		echo '<script>alert("Updated")</script>';
		header('location: homepage.php');
		
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
            <?php
				$id = $_GET['id'];
				$save_query = mysqli_query($conn, "SELECT * FROM tbl_register WHERE id= '".$id."'");
				$row = mysqli_fetch_array($save_query);
			?>
				<center>
				<h1><legend>Registration Form</legend></h1>
				</center>
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
				<label>First name:</label><br>
				<input type="text" name="first_name" value="<?php echo $row['first_name'];?>"required><br>
				<label>Middle name:</label><br>
				<input type="text" name="middle_name" value="<?php echo $row['middle_name'];?>"required><br>
				<label>Last name:</label><br>
				<input type="text" name="last_name" value="<?php echo $row['last_name'];?>"required><br>
				<label>Age:</label><br>
				<input type="text" name="age" value="<?php echo $row['age'];?>"required><br>
				<label>Gender:</label><br>
				<input type="text" name="gender" value="<?php echo $row['gender'];?>"required><br>
				<!-- <label>Course:</label><br>
				<input type="text" name="course"required><br> -->
				<label>Address:</label><br>
				<input type="text" name="address"value="<?php echo $row['address'];?>"required><br>
				<label>Contact Number:</label><br>
				<input type="text" name="contact_num"value="<?php echo $row['contact_num'];?>"required><br>
				<label>Email Address:</label><br>
				<input type="text" name="email"value="<?php echo $row['email'];?>"required><br>
				<label>Status:</label><br>
				<input type="text" name="status"value="<?php echo $row['status'];?>"required><br>
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
				<input type="text" name="username"value="<?php echo $row['username'];?>"required><br>
				<label>Password:</label><br>
				<input type="password" name="pass"value="<?php echo $row['pass'];?>"required><br><br>
				<div>
				<input type="submit" name="save" value="save"><br>
				</div>
				<!-- <h3></style> <a href="login.php">Sign in here!</a></h3> -->
			</fieldset>
			</center>
		</form>
	</body>
</html>