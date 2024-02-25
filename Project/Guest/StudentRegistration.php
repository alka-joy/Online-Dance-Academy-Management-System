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
	$ins="insert into tbl_StudentRegistration(student_name,student_contact,student_email,student_password,student_photo)values('$name','$contact','$email','$password','$image')";
	mysql_query($ins);
	//echo $ins;
	
}
?>
<br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-image: url(../Assets/Template/Main/img/banner/blue1.jpg);background-size: cover;" >
<body>
<div class="container">
<center><h1>Student Registration </h1></center>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <table class="table table-bordered" cellpadding="10">
            <tr>
              <th>Name</th>
              <td>
                <input type="text" class="form-control" name="txt_name" id="txt_name" autocomplete="off" required />
              </td>
            </tr>
            <tr>
              <th>Contact</th>
              <td>
                <input type="text" class="form-control" name="txt_contact" id="grgr" autocomplete="off" required  pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits with 0-9"/>
              </td>
            </tr>
            <tr>
              <th>Email</th>
              <td>
                <input type="email" class="form-control" name="txt_email" id="gfg" autocomplete="off" required />
              </td>
            </tr>
            <tr>
              <th>Photo</th>
              <td>
                <input type="file" class="form-control" name="fileField" id="fileField" required />
              </td>
            </tr>
            <tr>
              <th>Password</th>
              <td>
                <input type="password" class="form-control" name="txt_password" id="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" class="form-control"/>
              </td>
            </tr>
            <tr>
              <th>Re-Password</th>
              <td>
                <input type="password" class="form-control" name="txt_repassword" id="txt_repassword" autocomplete="off" required />
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" class="btn btn-primary" name="button" id="button" value="Register" />
                <input type="submit" class="btn btn-secondary" name="btn_submit" id="button2" value="Cancel" />
              </td>
            </tr>
          </table>
        </div>
      </div>
    </form>
  </div>
</body>
</html>

</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
<script>
    function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
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
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
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