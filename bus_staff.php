<?php
	include_once "admin.php";
	require_once "connect.php";
?>
<html>
<head>
	<style>
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
			width:33.33%;
		}
	</style>
</head>
<body bgcolor="#dff9fb">
	<h2 align="center">Staff Details</h2>
	<form method="post" enctype="multipart/form-data">
		<table align="center" cellpadding="10">
			<tr>
				<td><b>Full Name</b></td>
				<td align="center">:</td>
				<td align="center"><input type="text" name="name" id="txt"></td>
			</tr>
			<tr>
				<td><b>Mobile Number</b></td>
				<td align="center">:</td>
				<td align="center"><input type="text" name="number" id="txt"></td>
			</tr>
			<tr>
				<td><b>Aadhar Number</b></td>
				<td align="center">:</td>
				<td align="center"><input type="text" name="aadhar" id="txt"></td>
			</tr>
			<tr>
				<td><b>Date Of Birth<b></td>
				<td align="center">:</td>
				<td align="center"><input type="date" name="dob" id="txt"></td>
			</tr>
			<tr>
				<td><b>Age</b></td>
				<td align="center">:</td>
				<td align="center"><input type="text" name="age" id="txt"></td>
			</tr>
			<tr>
				<td><b>License Number</b></td>
				<td align="center">:</td>
				<td align="center"><input type="text" name="license" id="txt"></td>
			</tr>
			<tr>
				<td><b>Upload Document</b></td>
				<td align="center">:</td>
				<td align="center">
					<table cellpadding="10">
						<tr><td>Aaadhar</td><td><input type="file" name="aadhar_file" id="aadhar"></td></tr>
						<tr><td>License</td><td><input type="file" name="license_file" id="license"></td></tr>
						<tr><td>Photo</td><td><input type="file" name="photo_file" id="photo"></td></tr>
					</table>
				</td>
			</tr>
		</table>
		<table align="center" width="40%" cellpadding="10">
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
		header('location:bus.php');
	}
	if(isset($_POST["Submit"]))
	{
		$name=$_POST["name"];
		$mob_num=$_POST["number"];
		$aadhar_num=$_POST["aadhar"];
		$date_of_birth=$_POST["dob"];
		$age=$_POST["age"];
		$license_num=$_POST["license"];
		
		$a_file=$_FILES['aadhar_file']['name'];
		$t_name1=$_FILES['aadhar_file']['tmp_name'];
		$f_size1=$_FILES['aadhar_file']['size'];
		$f_error1=$_FILES['aadhar_file']['error'];
		$f_type1=$_FILES['aadhar_file']['type'];

		$f_ext1=explode('.',$a_file);
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
					echo "<script>alert('Your file is too big!')</script>";
				}
			}
			else
			{
				echo "<script>alert('There was an error in uploading document!')</script>";
			}
		}
		else
		{
			echo "<script>alert('You cannot upload file of this type!')</script>";
		}
		$l_file=$_FILES["license_file"]["name"];
		$t_name2=$_FILES['license_file']['tmp_name'];
		$f_size2=$_FILES['license_file']['size'];
		$f_error2=$_FILES['license_file']['error'];
		$f_type2=$_FILES['license_file']['type'];

		$f_ext2=explode('.',$l_file);
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
					echo "<script>alert('Your file is too big!')</script>";
				}
			}
			else
			{
				echo "<script>alert('There was an error in uploading document!')</script>";
			}
		}
		else
		{
			echo "<script>alert('You cannot upload file of this type!')</script>";
		}
		$p_file=$_FILES["photo_file"]["name"];
		$t_name3=$_FILES['photo_file']['tmp_name'];
		$f_size3=$_FILES['photo_file']['size'];
		$f_error3=$_FILES['photo_file']['error'];
		$f_type3=$_FILES['photo_file']['type'];

		$f_ext3=explode('.',$p_file);
		$f_ActualExt3=strtolower(end($f_ext3));
		$allowed3=array('jpg' ,'jpeg','png','pdf');
		if(in_array($f_ActualExt3,$allowed3))
		{
			if($f_error3 ===0)
			{
				if($f_size3 < 1000000)
				{
					$f_NameNew3=uniqid('',true).".".$f_ActualExt3;
					$f_dest3='images/'.$f_NameNew3;
					move_uploaded_file($t_name3,$f_dest3);
				}
				else
				{
					echo "<script>alert('Your file is too big!')</script>";
				}
			}
			else
			{
				echo "<script>alert('There was an error in uploading document!')</script>";
			}
		}
		else
		{
			echo "<script>alert('You cannot upload file of this type!')</script>";
		}


		$sq="insert into staff(name,mob_num,aadhar_num,date_of_birth,age,license_num,aadhar,license,photo)
				 values('$name','$mob_num','$aadhar_num','$date_of_birth','$age','$license_num','$f_NameNew1','$f_NameNew2','$f_NameNew3')";
		if(!mysqli_query($conn,$sq))
		{
			echo "<script>alert('unknown error')</script>";
		}
		else
		{
			echo "<script>alert('INSERTED SUCCESSFULLY')</script>";
		}
	}
?>