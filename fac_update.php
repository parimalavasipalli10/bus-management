<?php
    include_once "faculty.php";
    require_once "connect.php";
?>
<html>
<head>
	<style>
		#tbl
		{
			margin-top:50px;
			postion : absolute;
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
			background-color:#55efc4;
			padding:10px;
			color:black;
			width:60%;
		}
	</style>
</head>
<body bgcolor="#dff9fb">
    <h2 align="center">Update</h2>
    <form method="post" enctype="multipart/form-data">
		<table align="center" cellpadding="10" id="tbl">
			<tr>
				<td><b>First name</b></td>
				<td>:</td>
				<td><input type="text" name="fname" id="txt"></td>
			</tr>
			<tr>
				<td><b>Last name</b></td>
				<td>:</td>
				<td><input type="text" name="lname" id="txt"></td>
			</tr>
			<tr>
				<td><b>Contact</b></td>
				<td>:</td>
				<td><input type="text" name="Mobno" id="txt"></td>
			</tr>
			<tr>
				<td><b>E-mail</b></td>
				<td>:</td>
				<td><input type="text" name="email" id="txt"></td>
			</tr>
			<tr>
				<td><b>Address</b></td>
				<td>:</td>
				<td><input type="text" name="address" id="txt"></td>
			</tr>
        </table>
		<table align="center" width="20%" cellpadding="10" id="tbl">
		<tr>
			<td align="center"><input type="submit" value="Submit" name="Submit" id="btn"></td>
			<td align="center"><input type="submit" value="Reset" name="Reset" id="btn"></td>
		</tr>
		</table>
    </form>
</body>
</html>
<?php
    if(isset($_POST['Submit']))
    {
        $f_name=$_POST['fname'];
		$l_name=$_POST['lname'];
        $Mobno=$_POST['Mobno'];
		$email=$_POST['email'];
        $address=$_POST['address'];
		$sq="insert into faculty_update(id,first_name,last_name,contact,address,email)
				 values('$id','$f_name','$l_name','$mob_num','$address','$email')";
		mysqli_query($conn,$sq);
		if(!mysqli_query($conn,$sq))    
		{
			echo "<script>alert('Unknown Error')</script>";
		}
		else
		{
			echo "<script>alert('Update request sent successfully')</script>";
		}
    }
?>