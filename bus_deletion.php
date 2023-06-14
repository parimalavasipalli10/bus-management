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
			margin-left: 300px;
		}
		#tbl1
		{
			margin-top:100px;
			margin-left: 550px;
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
		<table id="tbl" width="50%">
			<tr align="center">
				<td><b>BUS NAME</b></td>
				<td>:</td>
				<td>
					<select id="txt" name="bus">
						<?php
							$query="SELECT id FROM bus_registration";
							$stmt=mysqli_query($conn,$query);
							while($row1=mysqli_fetch_array($stmt))
							{
						?>
								<option value="<?php echo $row1['id']; ?>"><?php echo $row1['id']; ?></option>
						<?php
							}
						?>
					</select>
				</td>
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
		$id=$_POST['bus'];
		$query1="DELETE FROM bus_registration WHERE id='$id'";
		mysqli_query($conn,$query1);
		$query2="DELETE FROM routes WHERE id='$id'";
		mysqli_query($conn,$query2);
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