<?php
	include_once "admin.php";
	require_once "connect.php";
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style2.css"></link>
	<style>
		#tbl
		{
			margin-top:50px;
		}
		
		#btn-V 
		{
			border: none; 
			background-color: #74b9ff; 
			padding: 14px 28px;
			cursor: pointer; 
		}
	</style>
</head>
<body bgcolor="#dff9fb">
	<?php
		$i=0;
		$query="SELECT * FROM faculty_requests";
		$stmt=mysqli_query($conn,$query);
		if(!mysqli_num_rows($stmt)>0)
		{
	?>
			<h2 align="center"><?php echo "NO PENDING REQUESTS";?></h2>
	<?php
		}
		else
		{
	?>
	<table border="1" cellpadding="22" width="70%" align="center" id="tbl">
		<tr align="center">
			<th>SNO</th>
			<th>NAME</th>
			<th>VIEW</th>
		</tr>
	<?php
		while($row=mysqli_fetch_array($stmt))
		{
	?>
			<tr align="center">
				<td><?php echo $i+=1; ?></td>
				<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
				<td><form action="view.php" method="POST"><button name="view" type="submit" id="btn-V">VIEW</button>
					<input type="hidden" name="view_reg" value="<?php echo $row['id']; ?>" /></form></td>
			</tr>
	<?php
		}
		}
	?>
	</table>
</body>
</html>