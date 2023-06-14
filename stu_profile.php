<?php
	include_once "student.php";
	include_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:100px;
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
			margin-top:50px;
			margin-right:30px;
			background-color:cornflowerblue;
			padding: 14px 28px; 
			cursor: pointer;
		}
	</style>
</head>
<body>
<form method="post" action="profile.php">
	<table align="center" cellpadding="10"  id="tbl">
	<tr>
		<td>Enter User Id</td>
		<td>:</td>
		<td><input type="text" name="uid" id="txt"></td>
	</tr>
	</table>
	<center><button type="submit" value="SUBMIT" id="btn" name="submit">Submit</button></center>
</form>

</body>
</html>