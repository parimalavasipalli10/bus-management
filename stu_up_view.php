<?php
	include_once "admin.php";
	require_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:30px;
			margin-left:450px;
		}
		#btn-Fee 
		{ 
			margin-top:5px;
			margin-right:3px;
			background-color: #39bbe8;
			padding: 14px 28px; 
			cursor: pointer;
		}
	</style>
</head>
<body>
<?php
	
	if(isset($_POST['view']))
	{
		$reg_no=$_POST['view_reg'];
		$query="SELECT * FROM student_update WHERE Reg_no='$reg_no'";
		$stmt=mysqli_query($conn,$query);
		if(mysqli_num_rows($stmt)<=0)
		{
			echo "<script>alert('NO PENDING REQUESTS')</script>";
		}
		else
		{
			while($row=mysqli_fetch_array($stmt))
			{
?>
	<table cellpadding="20" width="60%" id="tbl">
		<tr>
			<td><b>REG NO</b></td>
			<td>:</td>
			<td><font size="4"><?php echo $row['Reg_no']; ?></font></td>
		</tr>
		<tr>
			<td><b>NAME</b></td>
			<td>:</td>
			<td><font size="4"><?php echo $row['first_name']." ".$row['last_name']; ?></font></td>
		</tr>
		<tr>
			<td><b>CONTACT</b></td>
			<td>:</td>
			<td><font size="4"><?php echo $row['contact']; ?></font></td>
		</tr>
		<tr>
			<td><b>YEAR</b></td>
			<td>:</td>
			<td><font size="4"><?php echo $row['year'];?></font></td>
		</tr>
		
		<tr>
			<td><b>ADDRESS</b></td>
			<td>:</td>
			<td><font size="4"><?php echo $row['address']; ?></font></td>
		</tr>
		<tr>
			<td><b>View Uploaded Files</b></td>
			<td>:</td>
			<td><form method="POST" action="stu_view_files.php"><button name="fee_receipt" type="submit" id="btn-Fee">Click here</button>
				<input type="hidden" name="fee_receipt_view" value="<?php echo $row['Reg_no']; ?>" /></form></td>
		</tr>
	</table>
		<?php
			}
		}
	}
		
	?>
</body>
</html>