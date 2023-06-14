<?php
	include_once "student.php";
	include_once "connect.php";
?>
<html>
<body>
	<?php
		$query="SELECT * FROM stu_req";
		$stmt=mysqli_query($conn,$stmt);
		if(!mysqli_num_rows($stmt)>0)
		{
			
		}
	?>
</body>
</html>