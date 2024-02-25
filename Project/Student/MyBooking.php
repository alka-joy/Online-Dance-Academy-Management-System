<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</head>
<body style="background-color:rgb(227, 231, 236);color: black;">
<body>
<?php
ob_start();
session_start();
include("Head.php");
include("../Assets/Connection/connection.php");
?>
<br><br><br><br><br>
<div class="container">
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
          <th>Sl No</th>
          <th>Student Name</th>
          <th>Contact</th>
          <th>Photo</th>
          <th>Paid Status</th>
        </tr>
        <?php
          $i = 0;
          $selQry = "select * from tbl_assigntrainer atr inner join tbl_trainer s on s.trainer_id=atr.trainer_id where atr.student_id='" . $_SESSION["student_id"] . "'";
          $data = mysql_query($selQry);
          while ($row = mysql_fetch_array($data)) {
            $i++;
        ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["tutor_name"] ?></td>
            <td><?php echo $row["tutor_contact"] ?></td>
            <td><img src="../Assets/Files/User/<?php echo $row["trainer_photo"] ?>" width="150" height="150" /></td>
            <td></td>
          </tr>
        <?php
          }
        ?>
      </table>
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