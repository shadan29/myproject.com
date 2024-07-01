<?php include ("../config/connection.php");
$enroll_id = $_GET['enroll_id'];
$student_id = $_GET['student_id'];
$encoding_id = $_GET['encoding_id'];
$DleteQuery = mysqli_query($conn, "DELETE from tbl_enrolled where enroll_id='".$enroll_id."'");
if($DleteQuery){

echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: given-subject.php?student_id='.$student_id.'&&encoding_id='.$encoding_id);
}
?>