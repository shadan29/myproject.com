<?php include ('../config/connection.php');

$school_year = $_GET['sy_id'];
mysqli_query($conn, "UPDATE school_year SET status=''");
$SeTSchoolYear = mysqli_query($conn, "UPDATE school_year SET status='Active' where sy_id='".$school_year."'");
if($SeTSchoolYear){

echo '<div class="alert alert-success" style="text-align:center;">
		 <button type="button" class="close" data-dismiss="alert">&times;</button>
		Successfully updated!</div>';
		header('location: school_year.php');
}

?>