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

<?php
ob_start();
include("Head.php");
include("../Assets/Connection/connection.php");
$sname="";
if(isset($_POST["button"]))
{
	$cid=$_POST["selectcategory"];
	$sname=$_POST["txt_subcategory"];
    $selexist="select * from tbl_subcategory where subcategory_name='$sname' and category_id='$cid'";
    $dataexist=mysql_query($selexist);
    if($rowexist=mysql_fetch_array($dataexist))
    {
        ?>
        <script>
            alert("Already Exist");
        </script>
        <?php
    }
    else
    {
        if($cid == "")
        {
            ?>
            <script>
                alert('Select category ')
            </script>
            <?php

        }
        else{
            $ins="insert into tbl_subcategory(subcategory_name,category_id,subcategory_rate)values('$sname','$cid','".$_POST["txtrate"]."')";
            mysql_query($ins);
        }
	
    }
}
?>

<?php
if($_GET["sid"])
{
	
	$sid=$_GET["sid"];
	$delQry="delete from tbl_subcategory where subcategory_id='$sid'";
	mysql_query($delQry);
}
	?>
  <div class="container">
  <center><h1>Subcategory</h1></center>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table class="table table-bordered">
                <tr>
                    <th>Category</th>
                    <td>
                        <select name="selectcategory" id="select_category" class="form-select">
                            <option value="">Select</option>
                            <?php
                            $selqry = "select * from tbl_category";
                            $row = mysql_query($selqry);
                            while ($data = mysql_fetch_array($row)) {
                            ?>
                                <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Rate</th>
                    <td>
                        <input type="text" name="txtrate" id="txtrate" class="form-control" autocomplete="off" required />
                    </td>
                </tr>
                <tr>
                    <th>Subcategory</th>
                    <td>
                        <input type="text" name="txt_subcategory" id="txt_sub" class="form-control" autocomplete="off" required />
                    </td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th>
                        <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
                        <input type="submit" name="button2" id="button2" value="Cancel" class="btn btn-secondary" />
                    </th>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th>Sl.No</th>
                    <td>Category</td>
                    <td>Subcategory</td>
                    <td>Rate</td>
                    <td>Action</td>
                </tr>
                <?php
                $i = 0;
                $selQry = "select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["category_name"]; ?></td>
                        <td><?php echo $row["subcategory_name"]; ?></td>
                        <td><?php echo $row["subcategory_rate"]; ?></td>
                        <td><a href="subcategory.php?sid=<?php echo $row["subcategory_id"]; ?>" class="btn btn-danger">Delete</a></td>
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
