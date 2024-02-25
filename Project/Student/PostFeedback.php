<?php
include("Head.php");
   session_start();
   include("../Assets/Connection/Connection.php");

         if(isset($_POST["btn_submit"]))
          {
	
             $fcontent=$_POST["txt_feedbackdetails"];	
             $insQry="insert into tbl_feedback(feedback_content,student_id,feedback_date)values('".$fcontent."','".$_SESSION["student_id"]."',curdate())";
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
</head>
<body style="background-color:rgb(198, 220, 242);color: black;">
<body>
<p><a href="Homepage.php">Home</a></p>
<?php
ob_start();

?>
<br><br><br><br>
<center><h1>FeedBack</h1></center>
<form id="form1" name="form1" method="post" action="">
<center>
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>Feedback</td>
      <td><textarea name="txt_feedbackdetails" id="txt_feedbackdetails" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Send" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
      </tr>
  </table>
  </center>
</form>

<?php
include("Foot.php");
ob_flush();
?>
       
</body>
</html>