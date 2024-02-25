 <?php
 ob_start();
session_start();
include("Head.php");
include(".../Assets/Connection/connection.php");
if(isset($_POST["Save"]))
{
	$ins="insert into tbl_batches(batch_name,batch_starttime,batch_endtime,batch_day,assign_id)values('".$_POST["txt_name"]."','".$_POST["txt_starttime"]."','".$_POST["txt_endtime"]."','".$_POST["txt_day"]."','".$_GET["aid"]."')";
	mysql_query($ins);
	header("location:AssignedStudentList.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="background-color:lightslategray;color: black;">
 <br><br><br><br><br> <br><br><br><br><br>
 <center><h1>Batch Details</h1></center> 
<form id="form1" name="form1" method="post" action="">
  <table  border="3" align="center" cellpadding="10">
    <tr>
      <td>Name</td>
      <td><label for="txt_name2"></label>
        <input type="text" name="txt_name" id="txt_name2"required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Start Time</td>
      <td><label for="txt_starttime"></label>
        <input type="text" name="txt_starttime" id="txt_starttime"required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>End Time</td>
      <td><label for="txt_endtime"></label>
        <input type="text" name="txt_endtime" id="txt_endtime"required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Day</td>
      <td><label for="txt_day"></label>
        <input type="text" name="txt_day" id="txt_day"required autocomplete="off" /></td>
    </tr>
  
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Save" id="Save" value="Save" />
      <input type="submit" name="Cancel" id="Cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>