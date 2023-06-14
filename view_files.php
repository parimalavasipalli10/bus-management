<?php
	include_once "admin.php";
	require_once "connect.php";
?>
<html>
<head>
<style>

		#tbl
		{
			margin-top:20px;
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
</style>
</head>
<body>
<?php
	if(isset($_POST['fee_receipt'])) 
	{
		$reg_no=$_POST['fee_receipt_view'];
		$query="SELECT * FROM student_requests WHERE Reg_no='$reg_no'";
		$stmt=mysqli_query($conn,$query);
		if(mysqli_num_rows($stmt)<=0)
		{
			echo "<script>alert('NO PENDING REQUESTS')</script>";
		}
		else
		{
			while($row=mysqli_fetch_array($stmt))
			{
?>

	<table align="center" cellpadding="20" id="tbl">

		<tr>
			<td><b>Fee Receipt:</b></td>
			<td><img src ="images/<?php echo $row['fee_receipt']?>"   width="500" height="500"></img></td>

			<td><b>Photo:</b></td>
			<td><img src= "images/<?php echo $row['photo']?>" alt=""width="500" height="500"></img></td>

		<tr>						
	</table>
	<form method="POST" align="center" id="tbl1">
		<button name="accept" type="submit" id="btn-A">ACCEPT</button>
			<input type="hidden" name="acc_reg" value="<?php echo $row['Reg_no']; ?>" />
		<button name="reject" type="submit" id="btn-R">REJECT</button>
			<input type="hidden" name="rej_reg" value="<?php echo $row['Reg_no']; ?>" />
	</form>

	<?php
			}
		}
	}
	if(isset($_POST['reject']))
	{
			$reg_no=$_POST['rej_reg'];
			$query2="insert into student_reject(Reg_no) values('$reg_no')";
			mysqli_query($conn,$query2);
			if(!mysqli_query($conn,$query2))
			{
				echo "<script>alert('Rejected')</script>";
			}
			else
			{
				echo "<script>alert('Rejected')</script>";
			}
			$query3="DELETE FROM student_requests WHERE Reg_no='$reg_no'";
			mysqli_query($conn,$query3);
			if(!mysqli_query($conn,$query3))
			{
				echo "<script>alert('Not rejected')</script>";
			}
	}
	if(isset($_POST['accept']) && isset($_POST['acc_reg']))
	{
		$user=$_POST['acc_reg'];
		$_SESSION['user_id']=$user;
		header("location:allocate.php");
		$query1="SELECT * FROM student_requests WHERE Reg_no='$user'";
		$stmt1=mysqli_query($conn,$query1);
		if(!$stmt1)
		{
			echo "<script>alert('Unknown Error')</script>";
		}
		else
		{
			while($row=mysqli_fetch_array($stmt1))
			{
				$reg_no=$row['Reg_no'];
				$f_name=$row['first_name'];
				$l_name=$row['last_name'];
				$mob_num=$row['contact'];
				$gender=$row['gender'];
				$dob=$row['date_of_birth'];
				$year=$row['year'];
				$dept=$row['department'];
				$father_name=$row['father_name'];
				$mother_name=$row['mother_name'];
				$address=$row['address'];
				$email=$row['email'];
				$npwd=$row['password'];
				$fee_status=$row['fee_status'];
				$fee_receipt=$row['fee_receipt'];
				$photo=$row['photo'];
						
			}	
			$bus="0";
			$sq="insert into student(Reg_no,first_name,last_name,contact,gender,date_of_birth,year,department,father_name,mother_name,address,email,password,fee_status,fee_receipt,photo,bus)
					values('$reg_no','$f_name','$l_name','$mob_num','$gender','$dob','$year','$dept','$father_name','$mother_name','$address','$email','$npwd','$fee_status','$fee_receipt','$photo','$bus')";
			mysqli_query($conn,$sq);
			if(!mysqli_query($conn,$sq))
			{
				echo "<script>alert('Not inserted into student')</script>";
			}
			else
			{
				echo "<script>alert('Accepted')</script>";
			}
			$query4="DELETE FROM student_requests WHERE Reg_no='$reg_no'";
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