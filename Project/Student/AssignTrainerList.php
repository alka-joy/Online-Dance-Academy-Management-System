
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color:rgb(217, 225, 233);color: black;"></body>
<body>
  <?php
ob_start();
session_start();
//include("Head.php");

include("../Assets/Connection/connection.php");


?>
<div class="container">
  <center><h1>Assigned Trainer List </h1></center>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Sl No</th>
            <th>Trainer Name</th>
            <th>Contact</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          $selQry = "select * from tbl_assigntrainer atl inner join tbl_trainer t on t.trainer_id=atl.trainer_id where atl.student_id='".$_GET["sms"]."'";
          $data = mysql_query($selQry);

          while ($row = mysql_fetch_array($data)) {
            $i++;
          ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row["trainer_name"] ?></td>
              <td><?php echo $row["trainer_contact"] ?></td>
              <td><img src="../Assets/Files/User/<?php echo $row["trainer_photo"] ?>" width="150" height="150" /></td>
              <td><a href="ViewBatchDetails.php?aid=<?php echo $row["assign_id"] ?>">View Batches</a> | <a href="Trainerrating.php?sid=<?php echo $row["trainer_id"]?>">Rate Now</a></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </form>
  </div>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>