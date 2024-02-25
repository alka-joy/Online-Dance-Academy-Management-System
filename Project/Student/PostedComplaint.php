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
</head>
<body style="background-color:rgb(220, 226, 231);color: black;">
<body>
<p><a href="HomePage.php"> Home</a></p>

<?php
ob_start();

?>

<br><br><br><br><br><br><br>
<center><h1>Posted Complaint</h1></center>
<form id="form1" name="form1" method="post" action="">
 <center> <table border="1" align="center" cellpadding="10">
    <tr>
      <th>Sl No</th>
      
       
      <th>Complaint Subject</th>
 
       <th>Complaint Reply</th>
     
    </tr>
   <?php
	 
	$selectQry="select * from tbl_complaint where student_id='".$_SESSION["student_id"]."'  ";
	
	$row=mysql_query($selectQry);
	$i=0;
	while($data=mysql_fetch_array($row))
	{
	$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
    
        
      
      <td><?php echo $data["complaint_content"] ?></td> 
       <td><?php 
       if($data["complaint_reply"]=="")
       {
        echo "Not Yet Viewed";
       }
       else
       {
       echo $data["complaint_reply"] ;
       }
       ?></td>
       
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>
<br><br><br><br><br><br><br>
 <?php
include("Foot.php");
ob_start();
?>

<p>&nbsp;</p>
</body>
</html>