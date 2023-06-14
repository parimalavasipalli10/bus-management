<?php
	require_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:40px;
			margin-right:475px;
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
	<h2 align="center">Student Details</h2>
	<form method="POST" enctype="multipart/form-data">
		<table align="center" cellpadding="10">
			<tr>
				<td><b>Registration no.</b></td>
				<td>:</td>
				<td><input type="text" name="reg_no" id="txt"></td>
			</tr>
			<tr>
				<td><b>First Name</b></td>
				<td>:</td>
				<td><input type="text" name="first_name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Last Name</b></td>
				<td>:</td>
				<td><input type="text" name="last_name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Mobile Number</b></td>
				<td>:</td>
				<td><input type="text" name="mobile" id="txt"></td>
			</tr>
			<tr>
				<td><b>Gender</b></td>
				<td>:</td>
				<td>
					<input type="radio" name="gender" value="Male"><label for="male">Male</label>
					<input type="radio" name="gender" value="Female"><label for="female">Female</label>
				</td>
			</tr>
			<tr>
				<td><b>Date Of Birth</b></td>
				<td>:</td>
				<td><input type="date" name="dob" id="txt"></td>
			</tr>
			<tr>
				<td><b>Year</b></td>
				<td>:</td>
				<td>
					<select id="txt" name="year">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Department</b>
				<td>:</td>
				<td>
					<select id="txt" name="dept">
						<option>CSE</option>
						<option>ECE</option>
						<option>EEE</option>
						<option>CIVIL</option>
						<option>MECH</option>
						<option>IT</option>
						<option>CHEMICAL</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Father Name</b></td>
				<td>:</td>
				<td><input type="text" name="father_name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Mother Name</b></td>
				<td>:</td>
				<td><input type="text" name="mother_name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Address</b></td>
				<td>:</td>
				<td>
					<select id="txt" name="address">
						<?php
							$query1="SELECT route FROM routes";
							$stmt=mysqli_query($conn,$query1);
							while($row=mysqli_fetch_array($stmt))
							{
						?>
								<option value="<?php echo $row['route']; ?>"><?php echo $row['route']; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Email</b></td>
				<td>:</td>
				<td><input type="text" name="email" id="txt"></td>
			</tr>
			<tr>
				<td><b>New Password</b></td>
				<td>:</td>
				<td><input type="password" name="npwd" id="txt"></td>
			</tr>
			<tr>
				<td><b>Confirm Password<b></td>
				<td>:</td>
				<td><input type="password" name="cpwd" id="txt"></td>
			</tr>
			<tr>
				<td><b>Fee Status</b></td>
				<td>:</td>
				<td>
					<input type="radio" name="fee_status" value="Half paid"><label for="Half paid">Half Paid</label>
					<input type="radio" name="fee_status" value="Full paid"><label for="Full paid">Full Paid</label>
				</td>
			</tr>
			<tr>
				<td><b>Upload Documents</b></td>
				<td>:</td>
				<td>
					<table cellpadding="10">
						<tr><td>Fee receipt</td><td><input type="file" name="fee_receipt" ></td></tr>
						<tr><td>Photo</td><td><input type="file" name="photo" id="photo" ></td></tr>
					</table>
				</td>
			</tr>
		</table>
		<table align="center" width="40%" cellpadding="5" id="tbl">
		<tr>
			<td align="center"><input type="submit" value="Submit" name="Submit" id="btn"></td>
			<td align="center"><input type="submit" value="Reset" name="Reset" id="btn"></td>
		</tr>
		</table>
	</form>
	<table align="center" width="40%" cellpadding="5" id="tbl">
		<tr>
			<td align="center"><form action="home.php"><input type="submit" value="Back" name="Back" id="btn"></form></td>
		</tr>
		</table>
	
</body>
</html>
<?php
	if(isset($_POST["Reset"]))
	{
		header('location:stu_reg.php');
	}
	if(isset($_POST["Submit"]))
	{
		$reg_no=$_POST["reg_no"];
		$f_name=$_POST["first_name"];
		$l_name=$_POST["last_name"];
		$mob_num=$_POST["mobile"];
		$gender=$_POST["gender"];
		$dob=$_POST["dob"];
		$year=$_POST["year"];
		$dept=$_POST["dept"];
		$father_name=$_POST["father_name"];
		$mother_name=$_POST["mother_name"];
		$address=$_POST["address"];
		$email=$_POST["email"];
		$npwd=$_POST["npwd"];
		$cpwd=$_POST["cpwd"];
		$fee_status=$_POST["fee_status"];
		
		$f_file=$_FILES['fee_receipt']['name'];
		$t_name1=$_FILES['fee_receipt']['tmp_name'];
		$f_size1=$_FILES['fee_receipt']['size'];
		$f_error1=$_FILES['fee_receipt']['error'];
		$f_type1=$_FILES['fee_receipt']['type'];

		$f_ext1=explode('.',$f_file);
		$f_ActualExt1=strtolower(end($f_ext1));
		$allowed=array('jpg','jpeg','png','pdf');
		if(in_array($f_ActualExt1,$allowed))
		{
			if($f_error1 ===0)
			{
				if($f_size1 < 1000000)
				{
					$f_NameNew1=uniqid('',true).".".$f_ActualExt1;
					$f_dest1='images/'.$f_NameNew1;
					move_uploaded_file($t_name1,$f_dest1);
				}
				else
				{
					echo "Your file is too big!";
				}
			}
			else
			{
				echo "There was an error in uploading aadhar document!";
			}
		}
		else
		{
			echo "You cannot upload file of this type!";
		}

		$p_file=$_FILES['photo']['name'];
		$t_name2=$_FILES['photo']['tmp_name'];
		$f_size2=$_FILES['photo']['size'];
		$f_error2=$_FILES['photo']['error'];
		$f_type2=$_FILES['photo']['type'];

		$f_ext2=explode('.',$p_file);
		$f_ActualExt2=strtolower(end($f_ext2));
		$allowed2=array('jpg','jpeg','png','pdf');
		if(in_array($f_ActualExt2,$allowed2))
		{
			if($f_error2 ===0)
			{
				if($f_size2 < 1000000)
				{
					$f_NameNew2=uniqid('',true).".".$f_ActualExt2;
					$f_dest2='images/'.$f_NameNew2;
					move_uploaded_file($t_name2,$f_dest2);
				}
				else
				{
					echo "Your file is too big!";
				}
			}
			else
			{
				echo "There was an error in uploading aadhar document!";
			}
		}
		else
		{
			echo "You cannot upload file of this type!";
		}
		$uppercase = preg_match('@[A-Z]@', $npwd);
		$lowercase = preg_match('@[a-z]@', $npwd);
		$number    = preg_match('@[0-9]@', $npwd);
		$specialChars = preg_match('@[^\w]@', $npwd);

		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($npwd) < 8) 
		{
			echo "Password should be at least 8 characters in length and should include at least 
					one upper case letter,one number, and one special character.";
		}
		else if($npwd==$cpwd)
		{
			$sq="insert into student_requests(Reg_no,first_name,last_name,contact,gender,date_of_birth,year,department,father_name,mother_name,address,email,password,fee_status,fee_receipt,photo)
				 values('$reg_no','$f_name','$l_name','$mob_num','$gender','$dob','$year','$dept','$father_name','$mother_name','$address','$email','$npwd','$fee_status','$f_NameNew1','$f_NameNew2')";
			if(!mysqli_query($conn,$sq))
			{
				echo "<script>alert('Request doesn't sent')</script>";
			}
			else
			{
				echo "<script>alert('Request Sent')</script>";
			}
		}
		else
		{
			echo "<script>alert('Password doesn't match')</script>";
		}
		
	}
?>