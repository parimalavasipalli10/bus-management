<?php
	include_once "student.php";
	require_once "connect.php";
?>
<html>
<head>
<style>
		#tbl
		{
			margin-top:30px;
		}		
		#tbl1
		{
			margin-top:50px;
		}
		.img
		{
			margin-left:110px;
			
		}
</style>
</head>
<body>
	<?php
		if(isset($_POST['submit']))
		{
		$reg_no=$_POST['uid'];
		$query="SELECT * FROM student where Reg_no='$reg_no'";
		$stmt=mysqli_query($conn,$query);
			while($row=mysqli_fetch_array($stmt))
			{
?>
	<table align="center" cellpadding="20" id="tbl">
		<tr>
			<td><img src= "images/<?php echo $row['photo']?>" class="img" width="150" height="150"></img></td>
		</tr>
		<tr>
			<td>
				<table align="center" cellpadding="20" id="tbl1">
				
				<tr>
					<td><b>REG NO</b></td>
					<td>:</td>
					<td><?php echo $row['Reg_no']; ?></td>
				</tr>
				<tr>
					<td><b>NAME</b></td>
					<td>:</td>
					<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
				</tr>
				<tr>
					<td><b>BUS</b></td>
					<td>:</td>
					<td><?php echo $row['bus']; ?></td>
				</tr>
				<tr>
					<td><b>CONTACT</b></td>
					<td>:</td>
					<td><?php echo $row['contact']; ?></td>
				</tr>
				<tr>
					<td><b>GENDER</b></td>
					<td>:</td>
					<td><?php echo $row['gender'];?></td>
				</tr>
				<tr>
					<td><b>DATE OF BIRTH</b></td>
					<td>:</td>
					<td><?php echo $row['date_of_birth']; ?></td>
				</tr>
				<tr>
					<td><b>YEAR</b></td>
					<td>:</td>
					<td><?php echo $row['year'];?></td>
				</tr>
				<tr>
					<td><b>DEPARTMENT</b></td>
					<td>:</td>
					<td><?php echo $row['department']; ?></td>
				</tr>
				<tr>
					<td><b>ADDRESS</b></td>
					<td>:</td>
					<td><?php echo $row['address']; ?></td>
				</tr>
				<tr>
					<td><b>EMAIL</b></td>
					<td>:</td> 
					<td><?php echo $row['email']; ?></td>
				</tr>
				</table>
			</td>
		</tr>

</table>

		<?php
			}
		
}
	
?>
</body>
</html>