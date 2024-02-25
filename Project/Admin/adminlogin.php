<?php
session_start();
include(".../Assets/Connection/Connection.php");
if(isset($_POST['btn_login']))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$selAdmin="select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$dataAdmin=mysql_query($selAdmin);
	if($rowAdmin=mysql_fetch_array($dataAdmin))
	{
		$_SESSION["admin_name"]=$rowUser["admin_name"];
		$_SESSION["aid"]=$rowUser["admin_id"];
		header("location:../Guest/Login.php");
	}
	else
	{
		echo "Invalid Credential";
    
	}
}
?>	
















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <form id="form2" name="form2" method="post" action="">
  <table width="448" border="1">
    <tr>
      <th width="165" height="48" scope="row">Email</th>
      <td width="267"><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <th height="59" scope="row">Password</th>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
  </table>
  <table width="446" height="43" border="1">
    <tr>
      <th height="37" scope="row"> <input type="submit" name="Login" id="Submit" value="Login" />
      </th>
    </tr>
  </table>
</form>
</body>
</html>