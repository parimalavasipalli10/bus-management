<?php
	include_once "admin.php";
	require_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:50px;
		}
	</style>
</head>
<?php
	
	$query="SELECT * FROM complaint";
	$stmt=mysqli_query($conn,$query);
	if(mysqli_num_rows($stmt)>0)
	{
?>
		<table border="1" width="60%" align="center" cellpadding="10" id="tbl">
			<tr align="center">
				<th>ROLE</th>
				<th>USER</th>
				<th>COMPLAINT</th>
			</tr>
<?php
		while($row=mysqli_fetch_array($stmt))
		{
?>	
			<tr align="center">
				<td><?php echo $row['role']; ?></td>
				<td><?php echo $row['user']; ?></td>
				<td><?php echo $row['about']; ?></td>
			</tr>
<?php
		}
?>
		</table>
<?php
	}
	else
	{
?>
		<h2 align="center"><?php echo "NO COMPLAINTS";?></h2>
<?php
	}
?>
