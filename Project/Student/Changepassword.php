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
if(isset($_POST["Update"]))
{
	$sel="select  * from tbl_studentregistration where student_id='".$_SESSION["student_id"]."' and student_password='".$_POST["txtcur"]."'";
	$data=mysql_query($sel);
	if($row=mysql_fetch_array($data))
	{
		if($_POST["txtnew"]==$_POST["txtcon"])
		{
			$update="update tbl_studentregistration set student_password='".$_POST["txtnew"]."'where  student_id='".$_SESSION["student_id"]."'";
			mysql_query($update);
			header("location:HomePage.php");
		}
		else
		{
			?>
            <script>
			alert("Password Mismatch");
			
            </script>
            <?php
		}
	}
	else
		{
			?>
            <script>
			alert("Password Wrong");
			
            </script>
            <?php
		}
}
?>
<br><br><br><br><br><br><br>
<div class="container">
  <center><h1>Change Password</h1></center>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
          <th>Current Password</th>
          <td>
            <input type="password" class="form-control" name="txtcur" id="txtcur2" autocomplete="off" required />
          </td>
        </tr>
        <tr>
          <th>New Password</th>
          <td>
            <input type="password" class="form-control" name="txtnew" id="txtnew" autocomplete="off" required />
          </td>
        </tr>
        <tr>
          <th>Re-Password</th>
          <td>
            <input type="password" class="form-control" name="txtcon" id="txtcon" autocomplete="off" required />
          </td>
        </tr>
      </table>
      <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
          <td>
            <input type="submit" class="btn btn-primary" name="Update" id="Update" value="Update" />
          </td>
        </tr>
      </table>
    </form>
  </div><p>&nbsp;</p>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>