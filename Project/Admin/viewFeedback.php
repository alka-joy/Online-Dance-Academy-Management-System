<?php
ob_start();
include("Head.php");
include("../Assets/Connection/connection.php");

if($_GET["cid"])
{
	
	$cid=$_GET["cid"];
	$delQry="delete from tbl_feedback where feedback_id ='$cid'";
	mysql_query($delQry);
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</head>
<body style="background-color:lightslategray;color: black;">
<body>
<div class="container">
<center><h1>View Feedback</h1></center>
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered" align="center" cellpadding="10">
                <tr>
                    <th>Sl.No</th>
                    <td>Date</td>
                   
                    <td>Feedback Content</td>
                    <td>Action</td>
                </tr>
                <?php
                $i = 0;
                $selQry = "select * from tbl_feedback";
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["feedback_date"]; ?></td>
                
                    <td><?php echo $row["feedback_content"]; ?></td>
                    <td>
                        <a href="viewFeedback.php?cid=<?php echo $row["feedback_id"]; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div></body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>