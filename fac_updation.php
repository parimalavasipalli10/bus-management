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
		#tbl1
		{
			margin-right:40px;
		}
		#btn-A 
		{ 
			margin-top:50px;
			margin-right:30px;
			background-color: #55efc4;
			padding: 14px 28px; 
			cursor: pointer;
		}
		#btn-R 
		{
			margin-top:50px;
			background-color: #ff7675; 
			padding: 14px 28px;
			cursor: pointer; 
		}
		#btn-V 
		{
			border: none; 
			background-color: #74b9ff; 
			padding: 14px 28px;
			cursor: pointer; 
		}
	</style>
</head>
<body bgcolor="#dff9fb">
	<?php
		$i=0;
		$query="SELECT * FROM faculty_requests";
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
	<table border="1" cellpadding="22" align="center" id="tbl">
		<tr align="center">
			<th>SNO</th>
			<th>NAME</th>
			<th>VIEW</th>
			<th>ACCEPT/REJECT</th>
		</tr>
	<?php
		while($row=mysqli_fetch_array($stmt))
		{
	?>
			<tr align="center">
				<td><?php echo $i+=1; ?></td>
				<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
				<td><form action="fac_up_view.php" method="POST"><button name="view" type="submit" id="btn-V">VIEW</button>
					<input type="hidden" name="view_reg" value="<?php echo $row['id']; ?>" /></form></td>
				<td><form method="POST" align="center" id="tbl1">
						<button name="accept" type="submit" id="btn-A">ACCEPT</button>
							<input type="hidden" name="acc_reg" value="<?php echo $row['id']; ?>" />
						<button name="reject" type="submit" id="btn-R">REJECT</button>
							<input type="hidden" name="rej_reg" value="<?php echo $row['id']; ?>" />
				</form></td>
			</tr>
	<?php
		}
		}
	?>
	</table>
</body>
</html>
<?php
	if(isset($_POST['reject']))
	{
		$id=$_POST['rej_reg'];
		$query2="insert into faculty_reject(id) values('$id')";
		mysqli_query($conn,$query2);
		if(!mysqli_query($conn,$query2))
		{
			echo "<script>alert('Rejected')</script>";
		}
		$query3="DELETE FROM faculty_update WHERE id='$id'";
		mysqli_query($conn,$query3);
		if(!mysqli_query($conn,$query3))
		{
			echo "<script>alert('Not rejected')</script>";
		}
	}
	if(isset($_POST['accept']))		
	{
		$id=$_POST['acc_reg'];
		$_SESSION['fac_id']=$id;
		$query1="SELECT * FROM faculty_update WHERE id='$id'";
		$stmt1=mysqli_query($conn,$query1);
		if(!$stmt1)
		{
			echo "<script>alert('Unknown Error')</script>";
		}
		else
		{
			while($row=mysqli_fetch_array($stmt1))
			{
				$id=$row['id'];
				$f_name=$row['fname'];
				$l_name=$row['lname'];
				$email=$row['email'];
				$Mobno=$row['Mobno'];
				$address=$row['address'];
			}
			$query2="SELECT * FROM faculty WHERE id='$id'";
			$stmt2=mysqli_query($conn,$query2);
			$result=mysqli_fetch_row($stmt2);
			if($address!=$result[7])
			{
				header('location:fac_allocate.php');
			}
			else
			{
				$sq="update faculty set first_name='$f_name',last_name='$l_name',contact='$Mobno',address='$address' where email='$email'";
				if(!mysqli_query($conn,$sq))    
				{
					echo "<script>alert('Unknown Error')</script>";
				}
				else
				{
					echo "<script>alert('Successfully Updated')</script>";
				}
			}
			$query4="DELETE FROM faculty_update WHERE id='$id'";
			mysqli_query($conn,$query4);
			if(!mysqli_query($conn,$query4))
			{
				echo "<script>alert('Not approved')</script>";
			}
		}
	}
?>