<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>
<?php
ob_start();
session_start();
include("Head.php");
include(".../Assets/Connection/connection.php");

if(isset($_POST["button"]))
{
	$video=$_FILES["fileField"]["name"];
	$path=$_FILES["fileField"]["tmp_name"];
	move_uploaded_file($video,"../Assets/Files/Video/".$video);
	
	$ins="insert into tbl_video(video_file,subcategory_id,video_details,trainer_id)values('".$video."','".$_POST["subcat"]."','".$_POST["txtdetails"]."','".$_SESSION["trainer_id"]."')";
	mysql_query($ins);
	header("location:uploadvideo.php");
}

if($_GET["did"])
{
	
	$did=$_GET["did"];
	$delQry="delete from tbl_video where video_id='$did'";
	echo $delQry;
	mysql_query($delQry);
	header("location:uploadvideo.php");
}
$sel="select * from tbl_trainer where trainer_id='".$_SESSION["trainer_id"]."'";
//echo $sel;

$data=mysql_query($sel);
$row=mysql_fetch_array($data);
$subcate=$row["subcategory_id"];
//echo $subcate;
$delimiter = ",";

// Split the string into an array using the specified delimiter
$stringArray = explode($delimiter, $subcate);
//echo $stringArray;

?>
<br><br><br><br><br><br><br><br><br><br>
<div class="container">
<center><h1>UploadVideo</h1></center>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <table class="table table-bordered" align="center" cellpadding="10">
          <tr>
            <th>Video</th>
            <td><input type="file" class="form-control" name="fileField" id="fileField" required/></td>
          </tr>
          <tr>
            <th>Details</th>
            <td><textarea class="form-control" name="txtdetails" id="txtdetails" cols="45" rows="5" required></textarea></td>
          </tr>
          <tr>
            <th>Subcategory</th>
            <td>
              <?php foreach($stringArray as $checked) {
                $selsub="select *  from tbl_subcategory where subcategory_id='".$checked."'";
                $datasub=mysql_query($selsub);
                $rowsub=mysql_fetch_array($datasub);
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="subcat" value="<?php echo $rowsub["subcategory_id"]?>" />
                <label class="form-check-label"><?php echo $rowsub["subcategory_name"]?></label>
              </div>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" class="btn btn-primary" name="button" id="button" value="Save" />
              <input type="submit" class="btn btn-secondary" name="button2" id="button2" value="Cancel" />
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <table class="table table-bordered" align="center" cellpadding="10">
          <tr>
            <th>Sl.No</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Video</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
          <?php
            $selvideos="select * from tbl_video v inner join tbl_subcategory s on s.subcategory_id=v.subcategory_id inner join tbl_category c on c.category_id=s.category_id where v.trainer_id='".$_SESSION["trainer_id"]."'";
            $datavideo=mysql_query($selvideos);
            $i=0;
            while($rowvideo=mysql_fetch_array($datavideo))
            {
              $i++;
          ?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $rowvideo["category_name"]?></td>
            <td><?php echo $rowvideo["subcategory_name"]?></td>
            <td>
              <video width="320" height="240" controls>
                <source src="../Assets/Files/Video/<?php echo $rowvideo["video_file"]?>" type="video/mp4">
              </video>
            </td>
            <td><?php echo $rowvideo["video_details"]?></td>
            <td><a href="uploadvideo.php?did=<?php echo $rowvideo["video_id"]?>">Delete</a></td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </form>
</div>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
