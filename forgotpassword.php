<?php
	require_once "connect.php";
?>
<html>
<head>
	<title>RESET PASSWORD</title>
	<link rel="stylesheet" href="style.css">
	<style>
		#tbl
		{
			margin-top:50px;
			margin-bottom:40px;
		}
		#tbl1
		{
			margin-top:50px;
			margin-bottom:90px;
			margin-left:335px;
		}
		#btn
		{
			background-color:cornflowerblue;
			padding:10px;
			color:black;
			width:50%;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<center><img src="anits.jpg" width="1085" height="190"></center>
		</div>
		<div id="box">
			<form method="POST">
			<h2 align="center"><b><u>RESET PASSWORD</b></u></h2>
				<table align="center" cellpadding="10" id="tbl">
					<tr>
						<td><b>User Name</b></td>
						<td><b>:</b></td>
						<td><input type="text" name="uid"></td><br>
					</tr>
					<tr>
						<td><b>New password</b></td>
						<td><b>:</b></td>
						<td><input type="password" name="pwd"></td><br>
					</tr>
					<tr>
						<td><b>Confirm password</b></td>
						<td><b>:</b></td>
						<td><input type="password" name="cpwd"></td>
					</tr>                                                       
				</table>
				<table cellpadding="5" id="tbl1">
					<tr>
						<td><input  type="submit" value="SUBMIT" id="btn" name="submit"></td>
						<td><input  type="submit" value="BACK" id="btn" name="back"></td>
					</tr>
				</table>                
			</form>
		</div>
		<div id="footer">
			<p align="center" style="padding-left:300px">
				<center><font style="font-family:'Trebuchet MS'; font-size:12px; font-weight:bold;">
				Copyright(c) ANITS 2001 - 2018,  Best Viewed at 1024 x 768 Resolution</font></center>
			</p>
			<p align="center" style="padding-left:380px">
				<center><font style="font-family:'Trebuchet MS'; font-size:12px; font-weight:bold;">
				Developed &amp; Maintained by ANITS - Web Team</font></center>
			</p>
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['back']))
	{
			header('location:admin_login.php');
	}
	if(isset($_POST['submit']))
	{
		$user=$_POST['uid'];
		$password=$_POST['pwd'];
		$cpassword=$_POST['cpwd'];
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
		{
			echo "<script>alert('Password should be at least 8 characters in length and should include at least 
					one upper case letter,one number, and one special character.')</script>";
		}
		else
		{
			echo "<script>alert('Strong password.')</script>";
		}
		if($password==$cpassword)
		{
			$query="UPDATE admin SET password='$password' WHERE username='$user'";
			mysqli_query($conn,$query);
			if(!mysqli_query($conn,$query))
			{
				echo "<script>alert('Password not updated')</script>";
			}
			else
			{
				echo "<script>alert('Password updated successfully')</script>";
			}
		}
	}
?>