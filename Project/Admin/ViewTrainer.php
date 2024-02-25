<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/connection.php");
if(isset($_GET["student_id"]))
{
	$_SESSION["student_id"]=$_GET["student_id"];
}
if(isset($_GET["id"]))
{
	$ins="insert into tbl_assigntrainer(trainer_id,student_id)values('".$_GET["id"]."','".$_SESSION["student_id"]."')";
	mysql_query($ins);
	header("location:UserAdmissionDetails.php");
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
<center><h1>ViewTrainer</h1></center>
        <table class="table table-bordered table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>SlNo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Courses</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "select * from tbl_trainer";
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["trainer_name"]; ?></td>
                    <td><?php echo $row["trainer_email"]; ?></td>
                    <td><img src="../Assets/Files/Trainer/<?php echo $row["trainer_photo"]; ?>" width="150" height="150" /></td>
                    <td>
                        <?php
                        $subcate = $row["subcategory_id"];
                        $delimiter = ",";

                        // Split the string into an array using the specified delimiter
                        $stringArray = explode($delimiter, $subcate);
                        foreach ($stringArray as $checked) {
                            $selsub = "select *  from tbl_subcategory where subcategory_id='" . $checked . "'";
                            $datasub = mysql_query($selsub);
                            $rowsub = mysql_fetch_array($datasub);
                            echo $rowsub["subcategory_name"];
                            echo "<br>";
                        }
                        ?>
                    </td>
                    <td><a href="viewTrainer.php?id=<?php echo $row["trainer_id"]; ?>" class="btn btn-primary">Assign</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div></body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>