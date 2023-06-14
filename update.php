<?php
    include_once "student.php";
    require_once "connect.php";
?>
<html>
<head>
	<style>
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
		<table align="center" cellpadding="10">
			<tr>
				<td><b>Reg No</b></td>
				<td>:</td>
				<td><input type="text" name="reg_no" id="txt"></td>
			</tr>
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
				<td><b>Year</b></td>
				<td>:</td>
				<td>
					<select id="txt" name="year">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Address</b></td>
				<td>:</td>
				<td>
					<select id="txt" name="address">
						<?php
							$query1="SELECT route FROM routes";
							$stmt=mysqli_query($conn,$query1);
							while($row=mysqli_fetch_array($stmt))
							{
						?>
								<option value="<?php echo $row['route']; ?>"><?php echo $row['route']; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Fee Status</b></td>
				<td>:</td>
				<td>
					<input type="radio" name="fee_status" value="Half_paid"><label for="Half paid">Half Paid</label>
					<input type="radio" name="fee_status" value="Full_paid"><label for="Full paid">Full Paid</label>
				</td>
			</tr>
			<tr>
				<td><b>Fee Receipt</b></td>
				<td>:</td>
				<td><input type="file" name="fee_file"></td>
			</tr>
        </table>
		<table align="center" width="27%" cellpadding="15">
		<tr>
			<td align="center"><input type="submit" value="Submit" name="Submit" id="btn"></td>
			<td align="center"><input type="submit" value="Reset" name="Reset" id="btn"></td>
		</tr>
		</table>
    </form>
</body>
</html>
<?php
    if(isset($_POST["Submit"]))
    {
		$Reg_no=$_POST['reg_no'];
        $f_name=$_POST['fname'];
		$l_name=$_POST['lname'];
        $Mobno=$_POST['Mobno'];
		$year=$_POST['year'];
		$address=$_POST['address'];
		$fee_status=$_POST['fee_status'];
        $f_file=$_FILES['fee_file']['name'];
        
        $t_name1=$_FILES['fee_file']['tmp_name'];
        $f_size1=$_FILES['fee_file']['size'];
        $f_error1=$_FILES['fee_file']['error'];
        $f_type1=$_FILES['fee_file']['type'];

        $f_ext1=explode('.',$f_file);
        $f_ActualExt1=strtolower(end($f_ext1));
        $allowed=array('jpg','jpeg','png','pdf');
        if(in_array($f_ActualExt1,$allowed))
		{
            if($f_error1 ===0)
			{
                if($f_size1 < 1000000)
				{
                    $f_NameNew1=uniqid('',true).".".$f_ActualExt1;
                    $f_dest1='images/'.$f_NameNew1;
                    move_uploaded_file($t_name1,$f_dest1);
                }
				else
				{
					echo "<script>alert('Your file is too big!')</script>";
                }
            }
			else
			{
                echo "<script>alert('There was an error in uploading fee document!')</script>";
			}
        }
		else
		{
            echo "<script>alert('You cannot upload file of this type!')</script>";
		}
		$sq="INSERT INTO student_update (Reg_no,first_name,last_name,contact,year,address,fee_status,fee_receipt)
				VALUES('$Reg_no','$f_name','$l_name','$Mobno','$year','$address','$fee_status','$f_NameNew1')";
		if(!mysqli_query($conn,$sq))    
		{
			echo "<script>alert('Unknown Error')</script>";
		}
		else
		{
			echo "<script>alert('Successfully Updated')</script>";
		}

    }
?>