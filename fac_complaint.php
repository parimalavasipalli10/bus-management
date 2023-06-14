<?php
	include_once "faculty.php";
	require_once "connect.php";
?>
<html>
<head>
	<style>
		#txt
		{
			width:110%;
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
			width:50%;
		}
	</style>
</head>
<body bgcolor="#dff9fb">
	<h2 align="center">Complaint</h2>
	<form method="post" enctype="multipart/form-data">
		<table align="center" cellpadding="20">
			<tr>
				<td><b>E- mail</b></td>
				<td>:</td>
				<td><input type="text" name="email" id="txt"></td>
			</tr>
			<tr>
				<td><b>About</b></td>
				<td>:</td>
				<td><textarea name="about"id="txt" rows="6"></textarea></td>
			</tr>
		</table>
		<table align="center" width="30%" cellpadding="10">
		<tr>
			<td align="center"><input type="submit" value="Submit" name="Submit" id="btn"></td>
			<td align="center"><input type="submit" value="Reset" name="Reset" id="btn"></td>
		</tr>
		</table>
		
	</form>
	</div>
</body>
</html>
<?php
	if(isset($_POST['Reset']))
	{
		header("location:fac_complaint.php");
	}
	if(isset($_POST["Submit"]))
	{
		$email=$_POST['email'];
		$About=$_POST["about"];
		$role="faculty";
		$query="INSERT INTO complaint (user,about,role) VALUES ('$email','$About','$role')";
		mysqli_query($conn,$query);
		if(!mysqli_query($conn,$query))
		{
			echo "<script>alert('COMPLAINT REGISTERED')</script>";
		}
		else
		{
			echo "<script>alert('COMPLAINT REGISTERED')</script>";
		}
	}
?>