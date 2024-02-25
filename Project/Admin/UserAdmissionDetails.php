<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
<body style="background-color:lightslategray;color: black;"> 
</body>
</html>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/connection.php");
?>

<?php
if($_GET["sid"])
{
	
	$student_id=$_GET["sid"];
	$delQry="delete from tbl_admin where student_id='$sid'";
	mysql_query($delQry);
}
	?>

<div class="container">
<center><h1>User Admission Details</h1></center>
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered" align="center" cellpadding="10">
                <tr>
                    <td>Sl. No</td>
                    <td>Student Name</td>
                    <td>Course</td>
                    <td>Action</td>
                </tr>
                <?php
                $i = 0;
                $selQry = "select * from tbl_admission a inner join tbl_studentregistration s on s.student_id=a.student_id";
                //echo $selQry;
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["student_name"]; ?></td>
                    <td>
                        <?php
                        $subcate = $row["subcategory_id"];
                        $delimiter = ",";

                        // Split the string into an array using the specified delimiter
                        $stringArray = explode($delimiter, $subcate);
                        foreach ($stringArray as $checked) {
                            $selsub = "select * from tbl_subcategory where subcategory_id='" . $checked . "'";
                            $datasub = mysql_query($selsub);
                            $rowsub = mysql_fetch_array($datasub);
                            echo $rowsub["subcategory_name"];
                            echo "<br>";
                        }
                        ?>
                    </td>
                    <td><a href="ViewTrainer.php?stid=<?php echo $row["student_id"] ?>" class="btn btn-primary">Assign</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
<?php
include("Foot.php");
ob_flush(); 
?>