<?php
    include("../config/connection.php");
    session_start();  
	if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == ''))  {
		 header('location:index.php');
	} 
	$query  =mysqli_query($conn,"SELECT * FROM tbl_user WHERE user_id='".$_SESSION['user_id']."'"); 
	$row 	=mysqli_fetch_array($query); 
	
	if(!mysqli_num_rows($query) > 0){
	    header('location: index.php');
	}
?>