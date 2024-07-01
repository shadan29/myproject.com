<?php
include "connection.php"; 

$id = $_GET ['id'];
$DELETE_query = mysqli_query($conn, "DELETE FROM tbl_register WHERE id='".$id."'");
if($DELETE_query){
echo '<div class="alert alert-warning" style="text-align:center;">
		Successfully deleted!</div>';
		header('location: homepage.php');
}


?>
