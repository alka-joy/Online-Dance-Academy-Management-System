<?php
ob_start();
session_start();
include("Head.php");
include(".../Assets/Connection/connection.php");

           $selvideos="select * from tbl_video v inner join tbl_subcategory s on s.subcategory_id=v.subcategory_id inner join tbl_trainer tr on tr.subcategory_id = s.subcategory_id inner join tbl_assigntrainer ast on ast.trainer_id	 = tr.trainer_id	 where ast.assign_id ='".$_GET["cid"]."'";
            $datavideo=mysql_query($selvideos);
            $i=0;
            while($rowvideo=mysql_fetch_array($datavideo))
            {
              $i++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="row justify-content-center">
      <div class="col-md-12">
        <table align="center">
            <tr>
                <td>
                <video width="320" height="240" controls>
                <source src="../Assets/Files/Video/<?php echo $rowvideo["video_file"]?>" type="video/mp4">
              </video>
                </td>
            </tr>
            <tr>
                <td>
                <?php echo $rowvideo["video_details"]?>

                </td>
            </tr>
        </table>
        
          
         
             
          <?php } ?>
      </div>
    </div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>