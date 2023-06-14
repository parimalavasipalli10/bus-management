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
</style>
</head>
<body>
<?php
	if(isset($_POST['fee_receipt'])) 
	{
		$reg_no=$_POST['fee_receipt_view'];
		$query="SELECT * FROM student WHERE Reg_no='$reg_no'";
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
		<tr>	
	</table>
<?php
			}
		}
	}
?>
</body>
</html>