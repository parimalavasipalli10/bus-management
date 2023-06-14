<?php
	require_once "connect.php";
	include_once "fac_allocate.php";
	
	$x=$_SESSION['id'];
	$query="SELECT * FROM bus_registration WHERE id='$x'";
	$stmt=mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($stmt))
	{
?>
		<table border="1" width="60%" align="center" cellpadding="10" >
		<tr>
			<th>NAME</th>
			<th>DRIVER</th>
			<th>INCHARGE</th>
			<th>NUMBER</th>
			<th>ROUTE</th>
			<th>TOTAL SEATS</th>
			<th>REMAINING SEATS</th>
		</tr>
		<tr>
			<td align="center"><?php echo $row['id']; ?></td>
			<td align="center"><?php echo $row['driver_name']; ?></td>
			<td align="center"><?php echo $row['incharge_name']; ?></td>
			<td align="center"><?php echo $row['number']; ?></td>
			<td align="center">
			<?php
				$query1="SELECT * FROM routes WHERE bus='$x'";
				$stmt1=mysqli_query($conn,$query1);
				while($rows=mysqli_fetch_array($stmt1))
				{
					echo $rows['route'];
			?>
			<br>
			<?php
				}
			?>
			<td align="center"><?php echo $row['seats']; ?></td>
			<td align="center">
				<?php
					$count=0;
					$query2="SELECT * FROM student WHERE bus='$x'";
					$stmt2=mysqli_query($conn,$query2);
					$count+=mysqli_num_rows($stmt2);
					$query3="SELECT * FROM faculty WHERE bus='$x'";
					$stmt3=mysqli_query($conn,$query3);
					$count+=mysqli_num_rows($stmt3);
					echo $row['seats']-$count;
				?>
			</td>
		</tr>
		</table>
<?php	
	}
?>