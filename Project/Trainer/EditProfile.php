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
<body style="background-image: url(../Assets/Template/Main/img/banner/bgs.jpg)">
<body style="background-color:lightslategray;color: black;">
<body>
<?php
ob_start();
session_start();
include("Head.php");
include(".../Assets/Connection/connection.php");
if(isset($_POST["Submit"]))
{
	$update="update tbl_trainer set trainer_name='".$_POST["txtname"]."',trainer_contact='".$_POST["txtcontact"]."' where trainer_id='".$_SESSION["trainer_id"]."'";
	mysql_query($update);
	header("location:Myprofile.php");
}
$sel="select * from tbl_trainer where trainer_id='".$_SESSION["trainer_id"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
?>
<br><br><br><br><br><br><br><br><br><br>
<div class="container">
  <center><h1>Edit Profile</h1></center>
  <form id="form1" name="form1" method="post" action="" required autocomplete="off">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <table class="table table-bordered" align="center" cellpadding="10">
          <tr>
            <th>Name</th>
            <td>
              <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $row["trainer_name"]?>" required autocomplete="off" />
            </td>
          </tr>
          <tr>
            <th>Contact</th>
            <td>
              <input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?php echo $row["trainer_contact"]?>" required autocomplete="off" />
            </td>
          </tr>
       
          <tr>
            <td colspan="2" align="center">
              <input type="submit" class="btn btn-primary" name="Submit" id="Submit" value="Update" />
            </td>
          </tr>
        </table>
      </div>
    </div>
  </form>
</div>
</body>
</html><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>