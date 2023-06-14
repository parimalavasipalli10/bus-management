<?php
	require_once "connect.php";
	include_once "view.php";
?>
<html>
<head>
	
	<style>
		#tbl
		{
			margin-top: 50px;
			margin-left: 450px;
		}
		#txt
		{
			width:40%;
			padding:7px;
			border-radius:5%;
			border: 1px solid black;
		}
		#btn-S 
		{ 
			margin-top: 30px;
			margin-right: 300px;
			background-color: #39bbe8;
			padding: 14px 28px; 
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php
		$id=$_SESSION['fac_user_id'];
		$query0="SELECT * FROM faculty WHERE email='$id'";
		$stmt=mysqli_query($conn,$query0);
		while($row=mysqli_fetch_array($stmt))
		{
			$address=$row['address'];
		?>
		<form method="POST">
			<table align="center" cellpadding="10" id="tbl" width="60%">
				<tr>
					<td><b>ID</b></td>
					<td>:</td>
					<td><font size="4"><?php echo $row['id']; ?></font></td>
				</tr>
				<tr>
					<td><b>NAME</b></td>
					<td>:</td>
					<td><font size="4"><?php echo $row['first_name']." ".$row['last_name']; ?></font></td>
				</tr>
				<tr>
					<td><b>ADDRESS</b></td>
					<td>:</td>
					<td><font size="4"><?php echo $address; ?></font></td>
				</tr>
				<tr>
					<td><b>ALLOCATE BUS</b></td>
					<td>:</td>
					<td>
						<select id="txt" name="bus">
							<?php
								$query2="SELECT bus FROM routes WHERE route='$address'";
								$stmt1=mysqli_query($conn,$query2);
								while($row1=mysqli_fetch_array($stmt1))
								{
							?>
							<option value="<?php echo $row1['bus']; ?>"><?php echo $row1['bus']; ?></option>
							<?php
								}
							?>
						</select>
						<input type="submit" value="check" name="check" />
					</td>
					<?php
								if(isset($_POST['check']))
								{
									$bus_id=$_POST['bus'];
									$_SESSION['id']=$bus_id;
									header("location:fac_display.php");
								}
							?>
				</tr>
				<tr align="center">
					<td colspan="3"><button name="allocate" type="submit" id="btn-S">ALLOCATE</button></td>
				</tr>
			</table>
		</form>
		<?php
		}
		if(isset($_POST['allocate']))
		{
			$bus1=$_POST["bus"];
			$query1="UPDATE faculty SET bus='$bus1' WHERE email='$id'";
			mysqli_query($conn,$query1);
			if(!mysqli_query($conn,$query1))
			{
				echo "<script>alert('Not Allocated')</script>";
			}
			else
			{
				echo "<script>alert('Successfully Allocated')</script>";
			}
			header('location:fac_req.php');
		}
		?>
</body>
</html>