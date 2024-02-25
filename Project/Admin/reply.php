<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <?php
  ob_start();
  include("Head.php");
  
  include("../Assets/Connection/connection.php");
  if(isset($_POST["button"]))
  {
    $up="update tbl_complaint set  complaint_reply='".$_POST["txta"]."',complaint_status=1 where complaint_id='".$_GET["cid"]."'";
    mysql_query($up);
    //echo $up;
    header("location:viewcomplaint.php");
  }
  ?>
  <br><br><br><br><br><br>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10">
    <tr>
      <th>Content</th>
      <td ><textarea name="txta" id="" cols="30" rows="10"></textarea></td>
    </tr>

 
    <tr>
      <td align="center" colspan="2">
        <input type="submit" name="button" id="button" value="Send" />
        <input type="submit" name="button2" id="button2" value="Cancel" />
      </p>
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>
<br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>