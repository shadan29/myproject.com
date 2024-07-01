<?php include ("../config/connection.php");
$subjectid = $_GET['subject_id'];
$DleteQuery = mysqli_query($conn, "DELETE from tbl_subject where subject_id='".$subjectid."'");
if($DleteQuery){

echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: subject.php');
}
?>