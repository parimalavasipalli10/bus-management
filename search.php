<?php
	include_once 'admin.php';
	require_once 'connect.php';
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:50px;
		}
		#tbl1
		{
			margin-top:50px;
			margin-left:430px;
		}
		#tbl2
		{
			margin-top:50px;
			float:left;
			position:relative;
			margin-left:50px;
			border-collapse:collapse;
			border: 2px solid black;
		}
		#tbl3
		{
			margin-top:50px;
			float:left;
			position:relative;
			margin-left:80px;
			border-collapse:collapse;
			border: 2px solid black;
		}
		#tbl4
		{
			margin-top:50px;
			float:left;
			position:relative;
			margin-left:50px;
			border-collapse:collapse;
			border: 2px solid black;
		}
		#txt
		{
			padding:10px;
			outline:0;
			width:100%;
			border: 1px solid gray;
		}
		#btn
		{
			background-color:#55efc4;
			padding:10px;
			color:black;
			width:60%;
		}
		.img
		{
			margin-left:180px;
			padding:15px;
		}
		#btn-Fee 
		{ 
			margin-top:5px;
			margin-right:3px;
			background-color: #39bbe8;
			padding: 14px 28px; 
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form method="POST">
		<table align="center" width="60%" id="tbl">
			<tr align="center">
				<td><input type="text" placeholder="Enter Username" name="id" id="txt"></td>
				<td>
					<select name="role" id="txt">
						<option>Student</option>
						<option>Faculty</option>
						<option>Bus</option>
						<option>Staff</option>
					</select>
				</td>
				<td><input type="submit" value="Search" name="search" id="btn"></td>
			</tr>
		</table>
	</form>
<?php
	if(isset($_POST['search']))
	{
		$role=$_POST['role'];
		if($role=='Student')
		{
			$id=$_POST['id'];
			$query="SELECT * FROM student WHERE Reg_no='$id'";
			$stmt=mysqli_query($conn,$query);
			if(mysqli_num_rows($stmt)>0)
			{
				while($row=mysqli_fetch_array($stmt))
				{
?>
					<table width="60%" id="tbl1" cellpadding="10" border="0">
						<tr>
							<td colspan="3"><img src= "images/<?php echo $row['photo']?>" class="img" width="150" height="150"></img></td>
						</tr>
						<tr>
							<td><b>REG NO</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['Reg_no']; ?></font></td>
						</tr>
						<tr>
							<td><b>NAME</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['first_name']." ".$row['last_name']; ?></font></td>
						</tr>
						<tr>
							<td><b>CONTACT</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['contact']; ?></font></td>
						</tr>
						<tr>
							<td><b>BUS</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['bus']; ?></font></td>
						</tr>
						<tr>
							<td><b>FEE STATUS</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['fee_status']; ?></font></td>
						</tr>
						<tr>
							<td><b>GENDER</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['gender'];?></font></td>
						</tr>
						<tr>
							<td><b>DATE OF BIRTH</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['date_of_birth']; ?></font></td>
						</tr>
						<tr>
							<td><b>YEAR</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['year'];?></font></td>
						</tr>
						<tr>
							<td><b>DEPARTMENT</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['department']; ?></font></td>
						</tr>
						<tr>
							<td><b>ADDRESS</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['address']; ?></font></td>
						</tr>
						<tr>
							<td><b>EMAIL</b></td>
							<td>:</td> 
							<td><font size="4"><?php echo $row['email']; ?></font></td>
						</tr>
						<tr>
							<td><b>View Uploaded Files</b></td>
							<td>:</td>
							<td><form method="POST" action="search_stu_view_files.php"><button name="fee_receipt" type="submit" id="btn-Fee">
							Click here</button><input type="hidden" name="fee_receipt_view" value="<?php echo $row['Reg_no']; ?>" /></form></td>
						</tr>
					</table>
<?php
				}
			}
			else
			{
?>
				<h2 align="center"><?php echo "Student details doesn't exist.<br>Or<br>Enter valid username"; ?></h2>
<?php
			}
		}
		if($role=='Faculty')
		{
			$id=$_POST['id'];
			$query1="SELECT * FROM faculty WHERE email='$id'";
			$stmt1=mysqli_query($conn,$query1);
			if(mysqli_num_rows($stmt1)<1)
			{
?>
				<h2 align="center"><?php echo "Faculty details doesn't exist.<br>Or<br>Enter valid username"; ?></h2>
<?php
			}
			else
			{
				while($row=mysqli_fetch_array($stmt1))
				{
?>
					<table width="60%" id="tbl1" cellpadding="10">
						<tr>
							<td colspan="3"><img src= "images/<?php echo $row['photo']?>" class="img" width="150" height="150"></img></td>
						</tr>
						<tr>
							<td><b>NAME</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['first_name']." ".$row['last_name']; ?></font></td>
						</tr>
						<tr>
							<td><b>CONTACT</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['contact']; ?></font></td>
						</tr>
						<tr>
							<td><b>BUS</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['bus']; ?></font></td>
						</tr>
						<tr>
							<td><b>GENDER</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['gender'];?></font></td>
						</tr>
						<tr>
							<td><b>DATE OF BIRTH</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['date_of_birth']; ?></font></td>
						</tr>
						<tr>
							<td><b>DEPARTMENT</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['department']; ?></font></td>
						</tr>
						<tr>
							<td><b>ADDRESS</b></td>
							<td>:</td>
							<td><font size="4"><?php echo $row['address']; ?></font></td>
						</tr>
						<tr>
							<td><b>EMAIL</b></td>
							<td>:</td> 
							<td><font size="4"><?php echo $row['email']; ?></font></td>
						</tr>
					</table>
<?php
				}
			}
		}
		if($role=='Bus')
		{
			$id=$_POST['id'];
			$query2="SELECT * FROM bus_registration WHERE id='$id'";
			$stmt2=mysqli_query($conn,$query2);
			if(mysqli_num_rows($stmt2)<1)
			{
?>
				<h2 align="center"><?php echo "Bus details doesn't exist.<br>Or<br>Enter valid username"; ?></h2>
<?php
			}
			else
			{
				while($rows=mysqli_fetch_array($stmt2))
				{
?>
					<table width="33%" id="tbl2" cellpadding="10" border="1">
						<tr>
							<td><b>BUS NAME</b></td>
							<td><font size="4"><?php echo $rows['id']; ?></font></td>
						</tr>
						<tr>
							<td><b>DRIVER</b></td>
							<td><font size="4"><?php echo $rows['driver_name']; ?></font></td>
						</tr>
						<tr>
							<td><b>INCHARGE</b></td>
							<td><font size="4"><?php echo $rows['incharge_name']; ?></font></td>
						</tr>
						<tr>
							<td><b>BUS NUMBER</b></td> 
							<td><font size="4"><?php echo $rows['number']; ?></font></td>
						</tr>
						<tr>
							<td><b>SEATS</b></td> 
							<td><font size="4"><?php echo $rows['seats']; ?></font></td>
						</tr>
						<tr>
							<td><b>ROUTE</b></td>
							<td>
							<?php
								$query3="SELECT * FROM routes WHERE bus='$id'";
								$stmt3=mysqli_query($conn,$query3);
								while($row1=mysqli_fetch_array($stmt3))
								{
									echo $row1['route'];
							?><br>
							<?php
								}
							?>
							</td>
						</tr>
						<tr>
							<td><b>No OF STUDENTS</b></td>
							<td><font size="4">
							<?php 
								$query4="SELECT * FROM student WHERE bus='$id'";
								$stmt4=mysqli_query($conn,$query4);
								$count=mysqli_num_rows($stmt4);
								echo $count;
							?>
								</font>
							</td>
						</tr>
					</table>
<?php
				}
				?>			
				<table id="tbl3" width="25%" cellpadding="10" border="1">
					<tr>
						<th colspan="2"><?php echo $id; ?></th>
					</tr>
					<tr align="center">
						<td>
							<?php
								$query5="SELECT * FROM student WHERE bus='$id'";
								$stmt5=mysqli_query($conn,$query5);
								if(mysqli_num_rows($stmt5)<0)
								{
									echo 'No students';
								}
								else
								{
									while($row2=mysqli_fetch_array($stmt5))
									{
										echo $row2['Reg_no'];
									}
								}
							?>
						</td>
						<td>
							<?php
								$query6="SELECT * FROM student WHERE bus='$id'";
								$stmt6=mysqli_query($conn,$query6);
								if(mysqli_num_rows($stmt6)<0)
								{
									echo 'No students';
								}
								else
								{
									while($row2=mysqli_fetch_array($stmt6))
									{
										echo $row2['first_name']." ".$row2['last_name'];
									}
								}
							?>
						</td>
					</tr>
				</table>
				<table id="tbl4" width="25%" cellpadding="10" border="1">
					<tr>
						<th colspan="2"><?php echo $id; ?></th>
					</tr>
					<tr align="center">
						<td>
							<?php
								$query7="SELECT * FROM faculty WHERE bus='$id'";
								$stmt7=mysqli_query($conn,$query7);
								if(mysqli_num_rows($stmt6)<0)
								{
									echo 'No faculty';
								}
								else
								{
									while($row2=mysqli_fetch_array($stmt7))
									{
										echo $row2['first_name']." ".$row2['last_name'];
									}
								}
							?>
						</td>
					</tr>
				</table>
<?php
			}
		}
		if($role=='Staff')
		{
			$id=$_POST['id'];
			$query8="SELECT * FROM staff WHERE name='$id'";
			$stmt8=mysqli_query($conn,$query8);
			if(mysqli_num_rows($stmt8)<=0)
			{
?>
				<h2 align="center"><?php echo "Driver details doesn't exist.<br>Or<br>Enter valid username"; ?></h2>
<?php
			}
			else
			{
?>
				<h2 align="center">Driver Details</h2>
<?php
				while($rows=mysqli_fetch_array($stmt8))
				{
?>
					<table width="60%" cellpadding="10" id="tbl1">
						<tr>
							<td colspan="3"><img src= "images/<?php echo $rows['photo']?>" class="img" width="150" height="150"></img></td>
						</tr>
						<tr>
							<td><font size="4"><b>Name</b></font></td>
							<td>:</td>
							<td><font size="4"><?php echo $rows['name']; ?></font></td>
						</tr>
						<tr>
							<td><font size="4"><b>Bus</b></td>
							<td>:</td>
							<td><font size="4">
								<?php 
									$query9="SELECT * FROM bus_registration WHERE driver_name='$id'";
									$stmt9=mysqli_query($conn,$query9);
									while($row4=mysqli_fetch_array($stmt9))
									{
										echo $row4['id'];
									}
								?>
							</font></td>
						</tr>
						<tr>
							<td><font size="4"><b>Contact</b></font></td>
							<td>:</td>
							<td><font size="4"><?php echo $rows['mob_num']; ?></font></td>
						</tr>
						<tr>
							<td><font size="4"><b>Aadhar Number</b></font></td>
							<td>:</td>
							<td><font size="4"><?php echo $rows['aadhar_num']; ?></font></td>
						</tr>
						<tr>
							<td><font size="4"><b>Date of birth</b></font></td>
							<td>:</td>
							<td><font size="4"><?php echo $rows['date_of_birth']; ?></font></td>
						</tr>
						<tr>
							<td><font size="4"><b>Age</b></font></td>
							<td>:</td>
							<td><font size="4"><?php echo $rows['age']; ?></font></td>
						</tr>
						<tr>
							<td><font size="4"><b>License Number</b></font></td>
							<td>:</td>
							<td><font size="4"><?php echo $rows['license_num']; ?></font></td>
						</tr>
					</table>
<?php
				}
			}
		}
	}
?>
</body>
</html>