<?php 
	require_once 'connect.php';
	include_once 'admin.php';
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:50px;
			margin-left:450px;
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
		.img
		{
			margin-left:180px;
			padding:15px;
		}
	</style>
</head>
<body>
<?php
	if(isset($_POST['view']))
	{
		$id=$_POST['view_reg'];
		$query="SELECT * FROM faculty_requests where id='$id'";
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
	<table align="center" width="60%" cellpadding="10" id="tbl">
		<tr>
			<td colspan="3"><img src= "images/<?php echo $row['photo']?>" class="img" width="150" height="150"></img></td>
		</tr>
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
			<td><b>GENDER</b></td>
			<td>:</td>
			<td><?php echo $row['gender'];?></td>
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
	<form method="POST" align="center" id="tbl1">
			<button name="accept" type="submit" id="btn-A">ACCEPT</button>
			<input type="hidden" name="acc_reg" value="<?php echo $row['email']; ?>" /> 
			<button name="reject" type="submit" id="btn-R">REJECT</button>
			<input type="hidden" name="rej_reg" value="<?php echo $row['email']; ?>" /> 
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
		$query3="DELETE FROM faculty_requests WHERE id='$id'";
		mysqli_query($conn,$query3);
		if(!mysqli_query($conn,$query3))
		{
			echo "<script>alert('Rejected')</script>";
		}
	}
	if(isset($_POST['accept']))		
	{
		$id=$_POST['acc_reg'];
		$_SESSION['fac_user_id']=$id;
		header("location:fac_allocate.php");
		$query1="SELECT * FROM faculty_requests WHERE email='$id'";
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
				$gender=$row['gender'];
				$dob=$row['date_of_birth'];
				$dept=$row['department'];
				$address=$row['address'];
				$email=$row['email'];
				$npwd=$row['password'];
				$photo=$row['photo'];
					
			}	
			$sq="insert into faculty(id,first_name,last_name,contact,gender,date_of_birth,department,address,email,password,photo)
				 values('$id','$f_name','$l_name','$mob_num','$gender','$dob','$dept','$address','$email','$npwd','$photo')";
			mysqli_query($conn,$sq);
			if(!mysqli_query($conn,$sq))
			{
				echo "<script>alert('Accepted')</script>";
			}
			
			$query4="DELETE FROM faculty_requests WHERE id='$id'";
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