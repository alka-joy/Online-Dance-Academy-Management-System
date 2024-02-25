<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</head>

<body>
<?php
ob_start();
session_start();
include("Head.php");
include("../Assets/Connection/connection.php");
?>
<br><br><br><br><br><br><br><br><br><br>
<center><h1>Assigned Student</h1></center>
<form id="form1" name="form1" method="post" action="">
  <div class="container">
    <table class="table table-bordered table-striped table-responsive-md text-center">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Student Name</th>
          <th>Contact</th>
          <th>Photo</th>
          <th>Paid Status</th>
        </tr>
        <tbody>
        </thead>
        <?php
          $i = 0;
          $selQry = "select * from tbl_assigntrainer atr inner join tbl_studentregistration s on s.student_id=atr.student_id where trainer_id='" . $_SESSION["trainer_id"] . "'";
          $data = mysql_query($selQry);
          while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row["student_name"] ?></td>
              <td><?php echo $row["student_contact"] ?></td>
              <td><img src="../Assets/Files/User/<?php echo $row["student_photo"] ?>" width="150" height="150" /></td>
              <td><a href="BatchDetails.php?aid=<?php echo $row["assign_id"] ?>" class="btn btn-primary">Add Batch Details</a></td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</form>

</body>
</html>







</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>