<?php
	include_once "admin.php";
	require_once 'connect.php';
?>
<head>
	<style>
		.container
		{
			width : 80%;
			overflow:hidden;
			margin-top: 80px;
			padding : 20px 0px ;
		}
		.container tr
		{
			padding: 0px;
			margin : 0px;
		}
		.container tr td
		{
			list-style : none;
			width : 10%;
			height : 100px;
			background : skyblue;
			margin : 40px 40px 0 px 40px ;
			border: 3px solid gray;
		}
	</style>
</head>
<body>
	<table class="container" align="center" cellpadding="15" cellspacing="22">
		<tr align="center">
			<td>NO OF BUSES :
				<?php
					$query="SELECT * FROM bus_registration";
					$stmt=mysqli_query($conn,$query);
					echo mysqli_num_rows($stmt);
				?>
			</td>
			<td>NO OF STUDENTS :
				<?php
					$query1="SELECT * FROM student";
					$stmt1=mysqli_query($conn,$query1);
					echo mysqli_num_rows($stmt1);
				?>
			</td>
			<td>NO OF FACULTY :
				<?php
					$query2="SELECT * FROM faculty";
					$stmt2=mysqli_query($conn,$query2);
					echo mysqli_num_rows($stmt2);
				?>
			</td>
		</tr>
		<tr align="center">
			<td>NO OF STUDENT REQUESTS :
				<?php
					$query3="SELECT * FROM student_requests";
					$stmt3=mysqli_query($conn,$query3);
					echo mysqli_num_rows($stmt3);
				?>
			</td>
			<td>NO OF FACULTY REQUESTS : 
				<?php
					$query4="SELECT * FROM faculty_requests";
					$stmt4=mysqli_query($conn,$query4);
					echo mysqli_num_rows($stmt4);
				?>
			</td>
			<td>NO OF STUDENT REJECTS :
				<?php
					$query7="SELECT * FROM student_reject";
					$stmt7=mysqli_query($conn,$query7);
					echo mysqli_num_rows($stmt7);
				?>
			</td>
		</tr>
		<tr align="center">
			
			<td colspan="3">NO OF FACULTY REJECTS : 
				<?php
					$query8="SELECT * FROM faculty_reject";
					$stmt8=mysqli_query($conn,$query8);
					echo mysqli_num_rows($stmt8);
				?>
			</td>
		</tr>
	</table>
</body>
</html>