<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

session_start();

if(isset($_POST["btn_submit"]))
{
	
$csubject=$_POST["txt_subject"];	
$complaint=$_POST["txt_comp"];


	$insQry="insert into tbl_complaint(complaint_content,trainer_id,complaint_date)values('".$complaint."','".$_SESSION["trainer_id"]."',curdate())";
if(mysql_query($insQry))
{
 ?>
    <script>
     alert("Complaint Registered");
     window.location="PostComplaint.php";
    </script>  
    
<?php
}
else
{
echo $insQry;	
}
}



?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post ComplaintShop</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:lightslategray;color: black;">
<body>
<p><a href="HomePage.php"> Home</a></p>
 <?php
 ob_start();

?>
<br><br><br><br><br>
<<div class="container">
<center><h1>Complaint</h1></center>
  <form id="form1" name="form1" method="post" action="">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <table class="table table-bordered" align="center" cellpadding="10">
          <tr>
            <td>Subject:</td>
            <td><input type="text" class="form-control" name="txt_subject" id="txt_subject" autocomplete="off" required /></td>
          </tr>
          <tr>
            <td>Complaint:</td>
            <td><textarea class="form-control" name="txt_comp" id="txt_comp" rows="5" autocomplete="off" required></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
              <input type="reset" class="btn btn-secondary" name="btn_cancel" id="btn_cancel" value="Cancel" />
            </td>
          </tr>
        </table>
      </div>
    </div>
  </form>
</div>

<?php
include("Foot.php");
ob_flush();
?>
       
</body>
</html>