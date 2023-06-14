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
<body>
<form method="post">
		<table align="center" cellpadding="10" id="tbl">
			<tr>
				<td><b>Bus Name</b></td>
				<td>:</td>
				<td><?php echo $_SESSION['id']; ?></td>
			</tr>
			<tr>
				<td><b>Number of Stops</b></td>
				<td>:</td>
				<td><input type="text" name="stops" id="txt">
				<input type="submit" name="save" value="Enter"></td>
				<?php
					if(isset($_POST['save']))
					{
						$stops=$_POST['stops'];
						for($i=0;$i<$stops;$i++)
						{
				?>
							<tr>
							<td><b>Route</b></td>
							<td>:</td>
							<td><input type="text" name="route[]" value="" id="txt"/></td>
							</tr>
				<?php
						}
					}
				?>
			</tr>
		</table>
		<table align="center" width="30%" cellpadding="15">
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
		header('location:bus_Reg.php');
	}
	if(isset($_POST['Submit']))
	{
		$id=$_SESSION['id'];
		$route=$_POST['route'];
		$c=count($route);
		for($i=0;$i<$c;$i++)
		{
			$query1="INSERT INTO routes(bus,route) VALUES ('$id','$route[$i]')";
			mysqli_query($conn,$query1);
		}
	}
?>