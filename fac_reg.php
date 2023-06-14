<?php
	require_once "connect.php"
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:40px;
			margin-right:430px;
		}
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
			width:40%;
		}
	</style>
</head>
<body bgcolor="#dff9fb">
	<h2 align="center">Faculty Details</h2>
	<form method="post" enctype="multipart/form-data">
		<table align="center" cellpadding="10">
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
					<input type="radio" name="gender" value="Male" /><label for="male">Male</label>
					<input type="radio" name="gender" value="Female" /><label for="female">Female</label>
				</td>
			</tr>
			<tr>
				<td><b>Date Of Birth</b></td>
				<td>:</td>
				<td><input type="date" name="dob" id="txt"></td>
			</tr>
			<tr>
				<td><b>Department</b>
				<td>:</td>
				<td><input type="text" name="dept" id="txt"></td>
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
				<td><b>Upload Documents</b></td>
				<td>:</td>
				<td>
					<table cellpadding="10">
						<tr><td>Photo</td><td><input type="file" name="photo" id="photo" ></td></tr>
					</table>
				</td>
			</tr>
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
		header('location:fac_reg.php');
	}
	if(isset($_POST["Submit"]))
	{
		$f_name=$_POST["first_name"];
		$l_name=$_POST["last_name"];
		$mob_num=$_POST["mobile"];
		$gender=$_POST["gender"];
		$date_of_birth=$_POST["dob"];
		$dept=$_POST["dept"];
		$address=$_POST["address"];
		$email=$_POST["email"];
		$npwd=$_POST["npwd"];
		$cpwd=$_POST["cpwd"];
		
		$p_file=$_FILES["photo"]["name"];
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
			echo "<script>alert('Password should be at least 8 characters in length and should include at least 
					one upper case letter,one number, and one special character.')</script>";
		}
		
		else if($npwd==$cpwd)
		{
			$sq="insert into faculty_requests(id,first_name,last_name,contact,gender,date_of_birth,department,address,email,password,photo)
				 values(NULL,'$f_name','$l_name','$mob_num','$gender','$date_of_birth','$dept','$address','$email','$npwd','$f_NameNew2')";
			if(!mysqli_query($conn,$sq))
			{
				echo "<script>alert('Unknown Error occured')</script>";
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