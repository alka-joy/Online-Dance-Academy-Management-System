<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
	$sel="select  * from tbl_trainer where trainer_id='".$_SESSION["trainer_id"]."' and trainer_password='".$_POST["txtcur"]."'";
	$data=mysql_query($sel);
	if($row=mysql_fetch_array($data))
	{
		if($_POST["txtnew"]==$_POST["txtcon"])
		{
			$update="update tbl_trainer set trainer_password='".$_POST["txtnew"]."'where  trainer_id='".$_SESSION["trainer_id"]."'";
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
<br><br><br><br><br><br><br><br><br><br>
<div class="container">
<center><h1>Change Password</h1></center>
  <form id="form1" name="form1" method="post" action="">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <table class="table table-bordered" align="center" cellpadding="10">
          <tr>
            <th>Current Password</th>
            <td>
              <input type="password" class="form-control" name="txtcur" id="txtcur2" autocomplete="off" required/>
            </td>
          </tr>
          <tr>
            <th>New Password</th>
            <td>
              <input type="password" class="form-control" name="txtnew" id="txtnew" autocomplete="off" required/>
            </td>
          </tr>
          <tr>
            <th>Re-Password</th>
            <td>
              <input type="password" class="form-control" name="txtcon" id="txtcon" autocomplete="off" required/>
            </td>
          </tr>
          <tr>
            <td  colspan="2" align="center">
              <input type="submit" class="btn btn-primary" name="Update" id="Update" value="Update" />
            </td>
          </tr>
        </table>
      </div>
    </div>
  </form>
</div>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>