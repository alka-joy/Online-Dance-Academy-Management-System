<?php
ob_start();
session_start();
include("Head.php");
			include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserPostedComplaint</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<p><a href="HomePage.php"> Home</a></p>

<?php
ob_start();

?>
<br><br><br><br><br><br><br><br><br><br>

<div class="container">
<center><h1>Posted Complaint</h1></center>
  <form id="form1" name="form1" method="post" action="">
    <div class="table-responsive">
      <table class="table table-bordered" align="center" cellpadding="10">
        <thead>
          <tr>
            <th>Sl No</th>
            <th>Complaint Subject</th>
            <th>Complaint Description</th>
            <th>Complaint Reply</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $selectQry="select * from tbl_complaint where trainer_id='".$_SESSION["trainer_id"]."'  ";
            $row=mysql_query($selectQry);
            $i=0;
            while($data=mysql_fetch_array($row))
            {
              $i++;
              ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data["complaint_content"] ?></td> 
                <td><?php echo $data["complaint_reply"] ?></td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </form>
</div> <?php

ob_start();
?>

<p>&nbsp;</p>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>