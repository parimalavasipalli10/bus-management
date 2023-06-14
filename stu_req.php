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
		
		#btn-V 
		{
			border: none; 
			background-color: #74b9ff; 
			padding: 14px 28px;
			cursor: pointer; 
		}
		#btn-B
		{
			margin-top:50px;
			background-color:#55efc4;
			padding:10px;
			color:black;
			width:10%;
		}
	</style>
</head>
<body>
	<?php
		$i=0;
		$query="SELECT * FROM student_requests";
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
	<table border="1" cellpadding="22" align="center" width="70%" id="tbl">
		<tr align="center">
			<th>SNO</th>
			<th>REG NO</th>
			<th>NAME</th>
			<th>VIEW</th>
		</tr>
	<?php
			while($row=mysqli_fetch_array($stmt))
			{
				$_SESSION['Regno']=$row['Reg_no'];
	?>
				<tr align="center">
					<td><?php echo $i+=1; ?></td>
					<td><?php echo $row['Reg_no'] ?></td>
					<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
					<td><form method="POST" action="stu_view.php"><button name="view" type="submit" id="btn-V">VIEW</button>
						<input type="hidden" name="view_reg" value="<?php echo $row['Reg_no']; ?>" /> </form></td>
				</tr>
	<?php
			}
		}
	?>
			</table>
</body>
</html>