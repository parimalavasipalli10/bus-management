<?php
	include_once "admin.php";
	require_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:100px;
		}
		#btn
		{
			background-color: #74b9ff;
			color: black;
			border:none;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
			padding: 14px 28px;
			margin: 20px 0;
		}
	</style>
</head>
<body>
	<form method="POST">
		<table align="center" id="tbl" cellpadding="10" width="60%">
			<tr>
				<td align="center"><button id="btn" name="stu_update">STUDENT REQUESTS</button></td>
			</tr>
			<tr>
				<td align="center"><button id="btn" name="fac_update">FACULTY REQUESTS</button></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
	if(isset($_POST['stu_update']))
	{
		header('location:stu_update.php');
	}
	if(isset($_POST['fac_update']))
	{
		header('location:fac_updation.php');
	}
?>