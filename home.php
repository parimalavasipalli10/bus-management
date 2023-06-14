<html>
<head>
	<title>BUS MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="style.css"></link>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<center><img src="anits.jpg" width="1085" height="190"></center>
		</div>
		<div>
			<p align="center" style="padding-left:300px">
				<center><font style="font-family:'Trebuchet MS'; font-size:15px; font-weight:bold;">
				For Student Registration : <a href="stu_reg.php">Click here!!</a></font></center>
			</p>
			<p align="center" style="padding-left:380px">
				<center><font style="font-family:'Trebuchet MS'; font-size:15px; font-weight:bold;">
				For Faculty Registration : <a href="fac_reg.php">Click here!!</a></font></center>
			</p>
		</div>
		<div id="box">
			<div class="student">
				<img src="xyz1.jpg"/>
				<form method="POST">
					<button name="admin" type="submit" id="btn1">ADMIN</button>
				</form>
			</div>
			<div class="student">
				<img src="xyz2.jpg"/>
				<form method="POST">
					<button name="students" type="submit" id="btn2">STUDENT</button>
				</form>
			</div>
			<div class="student">
				<img src="fac.jpg"/>
				<form method="POST">
					<button name="faculty" type="submit" id="btn3">FACULTY</button>
				</form>
			</div>
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
	if(isset($_POST['admin']))
	{
			header('location:admin_login.php');
	}
	if(isset($_POST['students']))
	{
		header('location:student_login.php');
	}
	if(isset($_POST['faculty']))
	{
			header('location:faculty_login.php');
	}
?>
