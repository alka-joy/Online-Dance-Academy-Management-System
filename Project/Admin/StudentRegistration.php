<?php
ob_start();
include("Head.php");
include("../Assets/Connection/connection.php");
if(isset($_POST['button']))
{
	$name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	$repassword=$_POST['txt_repassword'];

	$image=$_FILES['fileField']['name'];
	$path=$_FILES['fileField']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/User/".$image	);
	$ins="insert into tbl_studentregistration(student_name,student_contact,student_email,student_password,student_photo)values('$name','$contact','$email','$password','$image')";
	mysql_query($ins);
	
}
?>
<?php
if($_GET["student_id"])
{
	
	$sid=$_GET["student_id"];
	$delQry="delete from tbl_studentregistration where student_id='$sid'";
	mysql_query($delQry);
	header("location:StudentRegistration.php");
}
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</head>
<body style="background-color:lightslategray;color: black;">
<body>
<br><br><br><br><br>
<div class="container">
<center><h1>Student Registration</h1></center>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>
                        <label for="txt_name"></label>
                        <input type="text" name="txt_name" id="txt_name" class="form-control" autocomplete="off"  required  pattern="^[A-Z]+[A-Za-z ]*$" class="form-control" /></td>
                </tr> />
                    </td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>
                        <label for="txt_contact"></label>
                        <input type="text" name="txt_contact" id="txt_contact" class="form-control" autocomplete="off" required
                            pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits with 0-9" />
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <label for="txt_email"></label>
                        <input type="email" name="txt_email" id="txt_email" class="form-control"  />
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        <label for="fileField"></label>
                        <input type="file" name="fileField" id="fileField" class="form-control" required />
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <label for="txt_password"></label>
                        <input type="password" name="txt_password" id="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" class="form-control" />
                    </td>
                </tr>
                <tr>w
                    <th>Re-Password</th>
                    <td>
                        <label for="textfield"></label>
                        <input type="password" name="textfield" id="textfield" class="form-control" autocomplete="off" required />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="button" id="button" value="Register" class="btn btn-primary" />
                        <input type="submit" name="btn_submit" id="button2" value="Cancel" class="btn btn-secondary" />
                    </td>
                </tr>
            </table>

            <br><br><br><br>

            <table class="table table-bordered">
                <tr>
                    <td>Sl No</td>
                    <td>Name</td>
                    <td>Contact</td>
                    <td>Email</td>
                    <td>Photo</td>
                    <td>Action</td>
                </tr>
                <?php
                $i = 0;
                $selQry = "select * from tbl_studentregistration";
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["student_name"]; ?></td>
                    <td><?php echo $row["student_contact"]; ?></td>
                    <td><?php echo $row["student_email"]; ?></td>
                    <td>
                        <img src="../Assets/Files/User/<?php echo $row["student_photo"]; ?>" width="150" height="150" />
                    </td>
                    <td><a href="StudentRegistration.php?student_id=<?php echo $row["student_id"]; ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="AdmissionDetails.php?student_id=<?php echo $row["student_id"]; ?>" class="btn btn-primary">Add Admission Details</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div></body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>
<script>
    function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";;
	}
}

function checknum(elem)
{
	var numericExpression = /^[0-9]{8,10}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Numbers Only Allowed</span>";
		elem.focus();
		return false;
	}
}



function emailval(elem)
{
	var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";
		elem.focus();
		return false;
	}
}
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
		elem.focus();
		return false;
	}
}
</script>