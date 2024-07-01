<?php include ("../config/connection.php");
$teacher_id = $_GET['teacher_id'];
$DleteQuery = mysqli_query($conn, "DELETE from tbl_faculty where teacher_id='".$teacher_id."'");
if($DleteQuery){

echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: faculty.php');
}
?>