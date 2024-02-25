<?php
ob_start();
include("Head.php");
include("../Assets/Connection/connection.php");
session_start();
?>

<?php
if($_GET["sid"])
{
	
	$student_id=$_GET["sid"];
	$delQry="delete from tbl_admin where student_id='$sid'";
	mysql_query($delQry);
}
	?>
<br><br><br><br><br><br><br><br><br><br>
<center><h1>User Admission Details</h1></center>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center" cellpadding="10">
    <tr>
      <td>Sl. No</td>
    
      <td>Course</td>
      <td>Action</td>
    </tr>
   <?php
  $i=0;
   $selQry="select * from tbl_admission where student_id='".$_SESSION["student_id"]."'";
   //echo $selQry;
   //echo $selQry;
   $data=mysql_query($selQry);
   while($row=mysql_fetch_array($data))
   {
	   $i++;
	   ?>
       <tr>
       <td><?php echo $i?></td>
       
       <td><?php 
	   $subcate=$row["subcategory_id"];
//echo $subcate;
$delimiter = ",";

// Split the string into an array using the specified delimiter
$stringArray = explode($delimiter, $subcate);
foreach($stringArray as $checked)
{
	$selsub="select *  from tbl_subcategory where subcategory_id='".$checked."'";
	$datasub=mysql_query($selsub);
	$rowsub=mysql_fetch_array($datasub);
 echo $rowsub["subcategory_name"];
 echo "<br>";
}
	   ?></td>
       <td>
        <?php
        if($row["admission_status"]==1)
        {
        ?>
        <a href="AssignTrainerList.php?sms=<?php echo $_SESSION["student_id"]?>">View AssignedList</a></td></tr>
      
       <?php
        }
        else
        {
          $seldif="SELECT DATEDIFF(CURDATE(),payment_date) AS days_until_return
          FROM
              tbl_admission";
          //echo $seldif;
          $dataf=mysql_query($seldif);
          $rowdif=mysql_fetch_array($dataf);
          //echo $rowdif["days_until_return"];
          if($rowdif["days_until_return"]>=30)
          {
            ?>
          
            <a href="Payment.php?did=<?php echo $row["admission_id"] ?>">Pay Now</a>
            <?php
          }
          else
          {
            ?>
            <a href="AssignTrainerList.php?sms=<?php echo $_SESSION["student_id"]?>">View AssignedList</a>
            <?php
          }

          ?>
          
          <?php
        }
   }
   ?>
      </table>
      <br><br><br><br><br><br><br><br><br><br><br><br>
</form>
<?php
include("Foot.php");
ob_flush(); 
?>