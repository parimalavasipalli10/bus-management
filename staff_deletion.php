<?php
	include_once "admin.php";
	require_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top: 100px;
			margin-left:350px;
		}
		#tbl1
		{
			margin-top:100px;
			margin-left: 500px;
		}
		#txt
		{
			width:60%;
			padding:7px;
			border-radius:5%;
			border: 1px solid black;
		}
		#btn-D
		{ 
			background-color: #39bbe8;
			padding: 14px 28px; 
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form method="POST">
		<table id="tbl" width="60%" cellpadding="10">
			<tr>
				<td><b>NAME</b></td>
				<td>:</td>
				<td><input type="text" name="name" id="txt"/></td>
			</tr>
			<tr>
				<td><b>AADHAR NUMBER</b></td>
				<td>:</td>
				<td><input type="text" name="aadhar" id="txt"/></td>
			</tr>
		</table>
		<table id="tbl1" cellspacing="50" cellpadding="10" border="0">
			<tr>
				<td><input type="submit" name="delete" value="DELETE" id="btn-D"/></td>
				<td><input type="submit" name="back" value="BACK" id="btn-D"/></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
	if(isset($_POST['back']))
	{
		header('location:bus.php');
	}
	if(isset($_POST['delete']))
	{
		$aadhar=$_POST['aadhar'];
		$query1="DELETE FROM staff WHERE aadhar_num='$aadhar'";
		mysqli_query($conn,$query1);
		if(!mysqli_query($conn,$query1))
		{
			echo "<script>alert('Deleted Successfully')</script>";
		}
		else
		{
			echo "<script>alert('Deleted Successfully')</script>";
		}
	}
?>