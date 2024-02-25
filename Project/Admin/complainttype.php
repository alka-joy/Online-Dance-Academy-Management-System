<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
</head>
<body style="background-color:lightslategray;color: black;">
<body>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/connection.php");
$cname="";
if(isset($_POST["button"]))
{
	$cname=$_POST["txt_complaintttype"];
    $selexist="select * from tbl_complainttype  where complainttype_name='".$cname."'";
    $dataexist=mysql_query($selexist);
    if($rowexist=mysql_fetch_array($dataexist))
    {
        ?>
<script>
    alert("Data Exist");
</script>
        <?php
    }
    else
    {
	$ins="insert into tbl_complainttype(complainttype_name)values('$cname')";
	mysql_query($ins);
    }
}
?>

<?php
if($_GET["cid"])
{
	
	$cid=$_GET["cid"];
	$delQry="delete from tbl_complainttype where complainttype_id='$cid'";
	mysql_query($delQry);
    
}
	?>

<div class="container">
 <center><h1>Complaint Type</h1></center>
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered">
                <tr>
                    <th>Complaint Type</th>
                    <td>
                        <label for="txt_complainttype"></label>
                        <input type="text" name="txt_complaintttype" id="txt_complainttype" class="form-control" autocomplete="off" required/>
                    </td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th>
                        <div class="text-center">
                            <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
                            <input type="submit" name="button2" id="button2" value="Cancel" class="btn btn-secondary" />
                        </div>
                    </th>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <td>sl.no</td>
                    <td>Complaint Type</td>
                    <td>Action</td>
                </tr>
                <?php
                $i = 0;
                $selQry = "select * from tbl_complainttype";
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["complainttype_name"]; ?></td>
                    <td><a href="complainttype.php?cid=<?php echo $row["complainttype_id"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>


