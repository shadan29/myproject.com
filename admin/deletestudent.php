<?php include ("../config/connection.php");
$student_id = $_GET['student_id'];
$DleteQuery = mysqli_query($conn, "DELETE from tbl_student where student_id='".$student_id."'");
if($DleteQuery){

echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: student.php');
}
?>