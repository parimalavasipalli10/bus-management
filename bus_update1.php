<?php
	include_once "bus_updation.php";
	require_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl2
		{
			margin-top:30px;
			margin-left: 530px;
		}
		#tbl3
		{
			margin-top:30px;
			margin-left: 500px;
		}
		#txt1
		{
			width:300%;
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
		#btn-U
		{ 
			margin-left: 130px;
			background-color: #39bbe8;
			padding: 14px 28px; 
			cursor: pointer;
		}
	</style>
</head>
<body>
	<header align="center"><h2>What do you want to update in <?php echo $_SESSION['bus']; ?>???</h2></header>
	<form method="POST">
		<table id="tbl2" cellspacing="50" cellpadding="10">
			<tr>
				<td><input type="submit" name="driver" value="DRIVER" id="btn-D"/></td>
				<td><input type="submit" name="incharge" value="INCHARGE" id="btn-D"/></td>
			</tr>
		</table>
	</form>
<?php
	if(isset($_POST['driver']))
	{
?>
		<form method="POST">
			<table id="tbl3" cellspacing="50" cellpadding="10">
				<tr>
					<td><b>NAME</b></td>
					<td>:</td>
					<td>
						<select id="txt1" name="staff">
							<?php
								$query="SELECT first_name FROM staff";
								$stmt=mysqli_query($conn,$query);
								while($row1=mysqli_fetch_array($stmt))
								{
							?>
									<option value="<?php echo $row1['first_name']; ?>"><?php echo $row1['first_name']; ?></option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="update" value="UPDATE" id="btn-U"/></td>
				</tr>
			</table>
		</form>
<?php
	}
	if(isset($_POST['update']))
	{
		$id=$_SESSION['bus'];
		$driver=$_POST['staff'];
		$query1="UPDATE bus_registration SET driver_name='$driver' WHERE id='$id'";
		mysqli_query($conn,$query1);
		if(!mysqli_query($conn,$query1))
		{
			echo "<script>alert('Driver Not Updated')</script>";
		}
		else
		{
			echo "<script>alert('Driver Updated')</script>";
		}
	}
	
	if(isset($_POST['incharge']))
	{
?>
		<form method="POST">
			<table id="tbl3" cellspacing="50" cellpadding="10">
				<tr>
					<td><b>NAME</b></td>
					<td>:</td>
					<td>
						<select id="txt1" name="incharge">
							<?php
								$query="SELECT first_name FROM faculty";
								$stmt=mysqli_query($conn,$query);
								while($row1=mysqli_fetch_array($stmt))
								{
							?>
									<option value="<?php echo $row1['first_name']; ?>"><?php echo $row1['first_name']; ?></option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="update1" value="UPDATE" id="btn-U"/></td>
				</tr>
			</table>
		</form>
<?php
	}
	if(isset($_POST['update1']))
	{
		$id=$_SESSION['bus'];
		$incharge=$_POST['incharge'];
		$query2="UPDATE bus_registration SET incharge_name='$incharge' WHERE id='$id'";
		mysqli_query($conn,$query2);
		if(!mysqli_query($conn,$query2))
		{
			echo "<script>alert('Incharge Not Updated')</script>";
		}
		else
		{
			echo "<script>alert('Incharge Updated')</script>";
		}
	}
?>
</body>
</html>