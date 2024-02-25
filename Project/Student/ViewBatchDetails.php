<?php
ob_start();
session_start();
include("../Assets/Connection/connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body style="background-color:rgb(215, 222, 229);color: black;">
<body>

<br><br><br><br><br><br>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>Sl.No</td>
      <td>Batch day</td>
      <td>Batch Start Time</td>
      <td>End Time </td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_batches where assign_id='".$_GET["aid"]."'";
	//echo $sel;
	$data=mysql_query($sel);
	$i=0;
	while($row=mysql_fetch_array($data))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row["batch_day"]?></td>
      <td><?php echo $row["batch_starttime"]?></td>
      <td><?php echo $row["batch_endtime"]?></td>
      <td>                        <a href="ViewVideo.php?cid=<?php echo $_GET["aid"]; ?>" class="btn ">View Video</a>
</td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>