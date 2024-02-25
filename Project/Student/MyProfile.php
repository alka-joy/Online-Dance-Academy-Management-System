<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body style="background-color:rgb(212, 220, 227);color: black;">
<body>
<?php
ob_start();
session_start();
include("Head.php");
include(".../Assets/Connection/connection.php");
$sel="select * from tbl_studentregistration where student_id='".$_SESSION["student_id"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
?>
<br><br><br><br><br><br><br>
<center><h1>My Profile</h1></center>
<table  border="1" align="center" cellpadding="10">
  <tr>
    <th><img src="../Assets/Files/User/<?php echo $row["student_photo"]?>" alt="imagepro" width="114" height="88" /></th>
  </tr>

  <tr>
    <th>Name</th>
    <td><?php echo $row["student_name"]?></td>
  </tr>
  <tr>
    <th>Contact</th>
    <td><?php echo $row["student_contact"]?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php echo $row["student_email"]?></td>
  </tr>
</table>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>