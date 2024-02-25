<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
session_start();

if(isset($_POST["btn_submit"]))
{
	
$csubject=$_POST["txt_subject"];	
$complaint=$_POST["txt_comp"];


$insQry="insert into tbl_complaint(complaint_content,student_id,complaint_date)values('".$complaint."','".$_SESSION["student_id"]."',curdate())";
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
?>
<script>
alert("Failed to register complaint");
 window.location="PostComplaint.php";
</script>
<?php	
}
}



?>



<br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Complaint</title>
</head>
<body style="background-color:rgb(204, 212, 220);color: black;">
<body>
<p><a href="HomePage.php"> Home</a></p>
 <?php
 ob_start();

?>

<center><h1>Complaint</h1></center>
<form id="form1" name="form1" method="post" action="">

 <center>
  <table border="1" align="center" cellpadding="10">
    
      <td>Subject:</td>
      <td><input type="text" name="txt_subject" id="txt_subject"  required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Complaint:</td>
      <td><textarea name="txt_comp" id="txt_comp" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
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