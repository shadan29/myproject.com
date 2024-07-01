<?php include ("../config/connection.php");
$userid = $_GET['user_id'];
$DleteQuery = mysqli_query($conn, "DELETE from tbl_user where user_id='".$userid."'");
if($DleteQuery){

echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: user-account.php');
}
?>