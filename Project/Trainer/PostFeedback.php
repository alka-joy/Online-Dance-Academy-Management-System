<?php
ob_start();
   session_start();
   include("Head.php");
   include("../Assets/Connection/Connection.php");

         if(isset($_POST["btn_submit"]))
          {
	
             $fcontent=$_POST["txt_feedbackdetails"];	
             $insQry="insert into tbl_feedback(feedback_content,trainer_id,feedback_date)values('".$fcontent."','".$_SESSION["trainer_id"]."',curdate())";
         if(mysql_query($insQry))
{
 ?>
           <script>
     				alert("feedback Registered");
     				window.location="PostFeedback.php";
           </script>  
    
    <?php
          }
          else
              {
    ?>
		   <script>
					alert("Failed to register feedback");
				    window.location="PostFeedback.php";
           </script>
<?php	
             }
   }


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Feedback</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<p><a href="Homepage.php">Home</a></p>
<?php
ob_start();

?>
<br><br><br><br><br><br><br><br><br><br>
<div class="container">
<center><h1>Post Feedback</h1></center>
  <form id="form1" name="form1" method="post" action="">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <table class="table table-bordered" align="center" cellpadding="10">
          <tr>
            <td>Feedback</td>
            <td><textarea class="form-control" name="txt_feedbackdetails" id="txt_feedbackdetails" cols="45" rows="5"></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Send" />
              <input type="submit" class="btn btn-secondary" name="btn_cancel" id="btn_cancel" value="Cancel" />
            </td>
          </tr>
        </table>
      </div>
    </div>
  </form>
</div>

<?php

ob_flush();
?>
       
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>