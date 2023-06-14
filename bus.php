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
				<td align="center"><button id="btn" name="bus_reg">BUS REGISTRATION</button></td>
				<td align="center"><button id="btn" name="bus_staff_reg">BUS STAFF REGISTRATION</button></td>
			</tr>
			<tr>
				<td align="center"><button id="btn" name="bus_del">BUS DELETION</button></td>
				<td align="center"><button id="btn" name="bus_staff_del">BUS STAFF DELETION</button></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><button id="btn" name="bus_up">BUS UPDATION</button></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
	if(isset($_POST['bus_reg']))
	{
		header('location:bus_reg.php');
	}
	if(isset($_POST['bus_staff_reg']))
	{
		header('location:bus_staff.php');
	}
	if(isset($_POST['bus_del']))
	{
		header('location:bus_deletion.php');
	}
	if(isset($_POST['bus_staff_del']))
	{
		header('location:staff_deletion.php');
	}
	if(isset($_POST['bus_up']))
	{
		header('location:bus_updation.php');
	}
?>