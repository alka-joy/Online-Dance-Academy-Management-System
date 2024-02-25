<?php
ob_start();
include("Head.php");

include("../Assets/Connection/connection.php");
if(isset($_POST["button"]))
{
	$subcat="";
	
	
	foreach($_POST["sub"] as $checked)
	{
		if ($subcat=="")
		{
		$subcat=$subcat.$checked;
		}
		else{
			$subcat=$subcat.",".$checked;
		}
	}
	$name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
    $repassword=$_POST['txt_repassword'];
	$photo=$_FILES['fileField']['name'];
	$path=$_FILES['fileField']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Trainer/".$photo);
	
	$certificate=$_FILES['fileField2']['name'];
	$path1=$_FILES['fileField2']['tmp_name'];
	move_uploaded_file($path1,"../Assets/Files/Trainer/".$certificate);
	
	
	
	$video=$_FILES['fileField3']['name'];
	$path2=$_FILES['fileField3']['tmp_name'];
	move_uploaded_file($path2,"../Assets/Files/Trainer/".$video);
	$ins="insert into tbl_trainer(trainer_name,trainer_contact,trainer_email,trainer_photo,trainer_certificate,trainer_video,trainer_password,subcategory_id)values('".$name."','".$contact."','".$email."','".$photo."','".$certificate."','".$video."','".$password."','".$subcat."')";
	//mysql_query($ins);
	//echo $ins;
    if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="Trainerregistration.php";
		</script>
        <?php
	}
	else
	{
		echo "Insert Failed";
	}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url(../Assets/Template/Main/img/banner/blue1.jpg);background-size: cover;" >
<body>
  <br><br><br><br><br><br>
  <div class="container">
  <center><h1>Trainer Registration</h1></center>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table class="table table-bordered" width="236">
                <tr>
                    <th width="124" scope="row">Name</th>
                    <td width="96">
                        <label for="txt_name"></label>
                        <input type="text" name="txt_name" id="txt_name" class="form-control" onchange="nameval(this)" required autocomplete="off" /><span id="name  "></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Contact</th>
                    <td>
                        <label for="txt_contact"></label>
                        <input type="text" name="txt_contact" id="txt_contact" required name="txt_contact" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"id="txt_contact"  class="form-control" onchange="checknum(elem)"><span id="contact"></span>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        <label for="txt_email"></label>
                        <input type="text" name="txt_email" id="txt_email" class="form-control" onchange="emailval(this)"><span id="content"></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Photo</th>
                    <td>
                        <input type="file" name="fileField" id="fileField" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Category</th>
                    <td>
                        <select name="select" id="select" class="form-select" onchange="getSubcategory(this.value)"  required autocomplete="off">
                            <option value="">--Select--</option>
                            <?php
                            $sel = "select * from tbl_category";
                            $data = mysql_query($sel);
                            while ($row = mysql_fetch_array($data)) {
                            ?>
                            <option value="<?php echo $row["category_id"] ?>"><?php echo $row["category_name"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Subcategory</th>
                    <td id="subcat"></td>
                </tr>
                <tr>
                    <th scope="row">Certificate</th>
                    <td>
                        <input type="file" name="fileField2" id="fileField2" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Video proof</th>
                    <td>
                        <input type="file" name="fileField3" id="fileField3" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Password</th>
                    <td>
                        <label for="txt_password"></label>
                        <input type="password" name="txt_password" id="txt_password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Re-password</th>
                    <td>
                        <label for="txt_repassword"></label>
                        <input type="password" name="txt_repassword" id="txt_repassword" class="form-control" onchange="checkpwd()">
                    </td>
                </tr>
                <tr>
                    <th colspan="2" align="center">
                        <input type="submit" name="button" id="button" value="Register" class="btn btn-primary" >
                        <input type="submit" name="button2" id="button2" value="Cancel" class="btn btn-secondary" >
                    </th>
                </tr>
            </table>
        </form>
    </div></body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getSubcategory(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxSubcategory.php?cid="+did,
		success: function(html){
			//alert(html);
			document.getElementById("subcat").innerHTML=html;
			//$("#subcat").html(html);
		}
	});
}
function checkpwd()
{
var pas=document.getElementById("txt_password").value;
var repas=document.getElementById("txt_repassword").value;
if(pas!=repas)
{
alert("Password mismatch");
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

<?php
include("Foot.php");
ob_flush(); 
?>