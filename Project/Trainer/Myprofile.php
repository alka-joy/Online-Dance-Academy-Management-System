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
$sel="select * from tbl_trainer where trainer_id='".$_SESSION["trainer_id"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);

//echo $sel;
?>
<br><br><br><br><br><br><br><br><br>

<div class="container">
  <center><h1>My Profile</h1></center>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <table class="table table-bordered" align="center">
        <tr>
          <th>
            <img src="../Assets/Files/Trainer/<?php echo $row["trainer_photo"]?>" alt="imagepro" width="114" height="88" />
          </th>
        </tr>
        <tr>
          <th>Name</th>
          <td><?php echo $row["trainer_name"]?></td>
        </tr>
        <tr>
          <th>Contact</th>
          <td><?php echo $row["trainer_contact"]?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?php echo $row["trainer_email"]?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
