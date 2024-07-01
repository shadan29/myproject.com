<?php include ("../config/connection.php");
$grade_id = $_GET['grade_id'];
$DleteQuery = mysqli_query($conn, "DELETE from tbl_grade where grade_id='".$grade_id."'");
if($DleteQuery){

echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: grades.php');
}
?>