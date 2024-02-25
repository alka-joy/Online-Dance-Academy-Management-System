<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color:lightslategray;color: black;">
<body>
<?php
ob_start();
session_start();
include("Head.php");
include(".../Assets/Connection/connection.php");
if(isset($_POST["Submit"]))
{
	$update="update tbl_studentregistration set student_name='".$_POST["txtname"]."',student_contact='".$_POST["txtcontact"]."' where student_id='".$_SESSION["student_id"]."'";
	mysql_query($update);
	header("location:MyProfile.php");
}
$sel="select * from tbl_studentregistration where student_id='".$_SESSION["student_id"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
?>
<br><br><br><br><br><br><br>
<div class="container">
  <center><h1>Edit Profile</h1></center>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
          <th>Name</th>
          <td>
            <label for="txtname"></label>
            <input type="text" class="form-control" name="txtname" id="txtname" autocomplete="off" required value="<?php echo $row["student_name"] ?>" />
          </td>
        </tr>
        <tr>
          <th>Contact</th>
          <td>
            <label for="txtcontact"></label>
            <input type="text" class="form-control" name="txtcontact" id="txtcontact" autocomplete="off" required value="<?php echo $row["student_contact"] ?>" />
          </td>
        </tr>
      </table>
      <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
          <td>
            <input type="submit" class="btn btn-primary" name="Submit" id="Submit" value="Submit" />
          </td>
        </tr>
      </table>
    </form>
  </div></body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>