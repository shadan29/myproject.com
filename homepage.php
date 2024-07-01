<?php
session_start();
include "connection.php"; 

?>

<!DOCTYPE html>
  
  <html>
  <head>
		<title></title>
		<style>
		table, th,td{
				border: 1px solid black;
				border-collapse: collapse;
			}
		
		
		</style>
  </head>
  <body>
  <form method="POST">
			<input type="text" name="search">
			<input type="submit" name="search_button" value="SEARCH">
	</form>
  <table style="width:100%">
				<caption>Name list</caption>
		<thead>
		<tr>
		    <th>ID</th>
			<th>FIRST NAME</th>
			<th>MIDDLE NAME</th>
			<th>LAST NAME</th>
			<th>AGE</th>
			<th>GENDER</th>
			<th>ADDRESS</th>
			<th>CONTACT NUMBER</th>
			<th>EMAIL ADD</th>
            <th>STATUS</th>
			<th>USER NAME</th>
           
		</tr>
		</thead>
		<?php  
			
			$SelectQuery = mysqli_query($conn, "SELECT * FROM tbl_register");
			$queryResult = mysqli_num_rows($SelectQuery);
			if ($queryResult > 0){
			while($row = mysqli_fetch_assoc($SelectQuery)){ 
			?>  
		<tbody>
			<td><?php echo $row ['id'];?></td>
				<td><?php echo $row ['first_name'];?></td>
				<td><?php echo $row ['middle_name'];?></td>
				<td><?php echo $row ['last_name'];?></td>
				<td><?php echo $row ['age'];?></td>
				<td><?php echo $row ['gender'];?></td>
				<td><?php echo $row ['address'];?></td>
				<td><?php echo $row ['contact_num'];?></td>
                <td><?php echo $row ['email'];?></td>
                <td><?php echo $row ['status'];?></td>
				<td><?php echo $row ['username'];?></td>
				<td><?php echo $row ['pass'];?></td>
				<td><a href="update.php?id=<?php echo $row ['id'];?>">Update</a><a href="delete.php?id=<?php echo $row ['id'];?>">Delete</a></td>
               
		</tbody>
		<?php }} ?>
		<?php
			if(isset($_POST['search_button'])){
				$search = $_POST['search'];
			$select_db = mysqli_query($conn, "SELECT * FROM tbl_register WHERE first_name LIKE '%$search%' OR middle_name LIKE '%$search%' OR last_name LIKE '%$search%'");
			while($row=mysqli_fetch_array($select_db)){
		?>
		
		<tbody>
			<tr>
				<td><?php echo $row ['id'];?></td>
				<td><?php echo $row ['first_name'];?></td>
				<td><?php echo $row ['middle_name'];?></td>
				<td><?php echo $row ['last_name'];?></td>
				<td><?php echo $row ['age'];?></td>
				<td><?php echo $row ['gender'];?></td>
				<td><?php echo $row ['address'];?></td>
				<td><?php echo $row ['contact_num'];?></td>
                <td><?php echo $row ['email'];?></td>
                <td><?php echo $row ['status'];?></td>
				<td><?php echo $row ['username'];?></td>
				<td><?php echo $row ['pass'];?></td>
               
				
			</tr>
		</tbody>
			<?php }} ?>
  </table>
		<a href="register.php">Go to register</a>
		
  
  </body>
  </html>