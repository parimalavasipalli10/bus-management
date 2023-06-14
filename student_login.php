<?php
	require_once "connect.php";
?>
<html>
<head>
        <title>STUDENT LOGIN</title>
		<link rel="stylesheet" href="style.css">
		<style>
			#tbl
			{
				margin-top:50px;
				margin-bottom:50px;
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
<body bgcolor="lightblue">
		<div id="wrapper">
		<div id="header">
			<center><img src="anits.jpg" width="1085" height="190"></center>
		</div>
		<div id="box">
			<form name="form1" method="POST">
			<h2 align="center"><b><u>STUDENT LOGIN</b></u></h2>
                <table align="center" cellpadding="10" id="tbl">
                        <tr>
                            <td><b>User Name</b></td>
                            <td><b>:</b></td>
                            <td><input type="text" name="uid"></td><br>
                        </tr>
                        <tr>
                            <td><b>Password</b></td>
                            <td><b>:</b></td>
                            <td><input type="password" name="pwd"></td>
                        </tr>
                        <tr>
                            <td><a href="stu_forgot.php" target="_blank">Forgot password</a></td>
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
			header('location:home.php');
	}

	if(isset($_POST['submit']))
	{
		$username=$_POST['uid'];
		$password=$_POST['pwd'];

		$query="SELECT * FROM student WHERE Reg_no='$username' and  password='$password'";
		$query1="SELECT * FROM student_reject WHERE Reg_no='$username' and  password='$password'";
		$stmt=mysqli_query($conn,$query);
		$stmt1=mysqli_query($conn,$query1);
		if(mysqli_num_rows($stmt)>0)
		{
			header('location:stu_profile.php');
		}
		else if(mysqli_num_rows($stmt1)>0)
		{
			echo "<script>alert('REQUEST REJECTED')</script>";
		}
		else
		{
			echo "<script>alert('INCORRECT USERNAME OR PASSWORD OR REQUEST IN PENDING')</script>";
		}
	}
?>