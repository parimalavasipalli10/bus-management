<?php 
	require_once "connect.php";
	include_once 'admin.php';
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:100px;
		}
		#tbl1
		{
			margin-right:50px;
		}
		#btn
		{
			margin-top:50px;
			background-color:#55efc4;
			padding:10px;
			color:black;
			width:10%;
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
	</style>
</head>
<body>
<?php
	if(isset($_POST['view']))
	{
		$id=$_POST['view_reg'];
		$query="SELECT * FROM faculty_update where id='$id'";
		$stmt=mysqli_query($conn,$query);
		if(mysqli_num_rows($stmt)<=0)
		{
			echo "<script>alert('NO REQUEST WITH THAT ID ')</script>";
		}
		else
		{
			while($row=mysqli_fetch_array($stmt))
			{
?>
	<table align="center" cellpadding="10" id="tbl">
		<tr>
			<td><b>NAME</b></td>
			<td>:</td>
			<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
		</tr>
		<tr>
			<td><b>CONTACT</b></td>
			<td>:</td>
			<td><?php echo $row['contact']; ?></td>
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
	<form method="POST" align="center" id="tbl1">
			<button name="accept" type="submit" id="btn-A">ACCEPT</button>
			<input type="hidden" name="acc_reg" value="<?php echo $row['id']; ?>" /> 
			<button name="reject" type="submit" id="btn-R">REJECT</button>
			<input type="hidden" name="rej_reg" value="<?php echo $row['id']; ?>" /> 
	</form>
		<?php
			}
		}
	}
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
					$f_name=$row['first_name'];
					$l_name=$row['last_name'];
					$mob_num=$row['contact'];
					$address=$row['address'];
					$email=$row['email'];
					
				}	
				$query2="SELECT * FROM faculty WHERE id='$id'";
				$stmt2=mysqli_query($conn,$query2);
				$result=mysqli_fetch_row($stmt2);
				if($address!=$result[7])
				{
					header('location:allocate.php');
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
</body>
</html>