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
		#txt
		{
			width:90%;
			padding:5px;
			border-radius:5%;
			outline:0;
			border: 1px solid gray;
		}
		#btn
		{
			background-color:#55efc4;
			padding:10px;
			color:black;
			width:40%;
		}
	</style>
</head>
<body bgcolor="#dff9fb">
	<h2 align="center">Bus Details</h2>
	<form method="post">
		<table align="center" cellpadding="10" id="tbl">
			<tr>
				<td><b>Bus Name</b></td>
				<td>:</td>
				<td><input type="text" name="bus_name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Driver Name</b></td>
				<td>:</td>
				<td><input type="text" name="driver_name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Incharge Name</b></td>
				<td>:</td>
				<td><input type="text" name="incharge_name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Bus Number</b></td>
				<td>:</td>
				<td><input type="text" name="bus_number" id="txt"></td>
			</tr>
			<tr>
				<td><b>Number of Seats</b></td>
				<td>:</td>
				<td><input type="text" name="number_of_seats" id="txt"></td>
			</tr>
			
		</table>
		<table align="center" width="40%" cellpadding="15" id="tbl">
		<tr>
			<td align="center"><input type="submit" value="Submit" name="Submit" id="btn"></td>
			<td align="center"><input type="submit" value="Back" name="back" id="btn"></td>
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
	if(isset($_POST['Submit']))
	{
		header('location:stops.php');
		$id=$_POST['bus_name'];
		$_SESSION['id']=$id;
		$driver_name=$_POST['driver_name'];
		$incharge_name=$_POST['incharge_name'];
		$number=$_POST['bus_number'];
		$seats=$_POST['number_of_seats'];
		$query="INSERT INTO bus_registration(id,driver_name,incharge_name,number,seats) VALUES
					('$id','$driver_name','$incharge_name','$number','$seats')";
		if(mysqli_query($conn,$query))
		{
			echo "<script>alert('Bus Registered')</script>";
		}
		else
		{
			echo "<script>alert('Not inserted')</script>";
		}
	}
?>