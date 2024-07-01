<?php include ("../config/connection.php");
$encoding_id = $_GET['encoding_id'];
$DleteQuery = mysqli_query($conn, "DELETE from tbl_encoding where encoding_id='".$encoding_id."'");
if($DleteQuery){

echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: encoding.php');
}
?>