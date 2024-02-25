<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color:lightslategray;color: black;">
<body>
<?php
ob_start();
session_start();
include("Head.php");
include(".../Assets/Connection/connection.php");
if(isset($_POST["btnsave"]))
{
	$sub="";
	$subcat=$_POST["sub"];
	foreach($subcat as $checked)
	{
	if($sub=="")
	{
		$sub.=$checked;
	}
	else
	{
		$sub.=",".$checked;
	}
	}
	$ran=rand(100000,999999);
	$ins="insert into tbl_admission(admission_number,student_id,subcategory_id,grand_total,emi,count)values('$ran','".$_SESSION["student_id"]."','".$sub."','".$_POST["txttotal"]."','".$_POST["txtemi"]."','".$_POST["txtcount"]."')";
	mysql_query($ins);
	echo $ins;
	header("location:HomePage.php");
}
$sel="select * from tbl_studentregistration where student_id='".$_SESSION["student_id"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
?>
<br><br><br><br><br><br><br>
<div class="container">
  <center><h1>Admission Details</h1></center>
    <form id="form3" name="form3" method="post" action="">
      <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
          <th>
            <img src="../Assets/Files/User/<?php echo $row["student_photo"] ?>" alt="imagepro" width="114" height="88" />
          </th>
        </tr>
      </table>
      <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
          <th>Name</th>
          <td>
            <?php echo $row["student_name"] ?>
            <label for="txt_name"></label>
           
          </td>
        </tr>
        <tr>
          <th>Contact</th>
          <td>
            <?php echo $row["student_contact"] ?>
            <label for="txt_contact"></label>
           
          </td>
        </tr>
        <tr>
          <th>Email</th>
          <td>
            <?php echo $row["student_email"] ?>
            <label for="txt_email"></label>
            
          </td>
        </tr>
        <tr>
          <th>Category</th>
          <td>
            <?php
            $sel = "select * from tbl_category";
            $data = mysql_query($sel);
            while ($row = mysql_fetch_array($data)) {
            ?>
              <input type="checkbox" name="cate[]" id="cate" class="cate" value="<?php echo $row["category_id"] ?>" onclick="getSub()" />
              <?php echo $row["category_name"] ?>
            <?php
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>Subcategory</th>
          <td id="subcat">
          </td>
        </tr>
        <tr>
          <th>Grand Total</th>
          <td id="total">
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="btnsave" value="Add" /></td>
        </tr>
      </table>
    </form>
  </div></body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getSub()
{
   var checkboxes = document.querySelectorAll('input[name="cate[]"]:checked');
        var selectedValues = Array.from(checkboxes).map(function (checkbox) {
            return checkbox.value;
        });
        console.log(selectedValues);
	// var did=document.getElementsByName("cate").value;
	// alert(did);
	$.ajax({
		url:"../Assets/AjaxPages/AjaxAdmission.php?cid="+selectedValues.join(","),
		success: function(html){
			//alert(html);
			document.getElementById("subcat").innerHTML=html;
			
			//$("#subcat").html(html);
		}
	});
}
function getTotal()
{
   var checkboxes = document.querySelectorAll('input[name="sub[]"]:checked');
        var selectedValues = Array.from(checkboxes).map(function (checkbox) {
            return checkbox.value;
        });
        console.log(selectedValues);
	// var did=document.getElementsByName("cate").value;
	// alert(did);
	$.ajax({
		url:"../Assets/AjaxPages/AjaxTotal.php?cid="+selectedValues.join(","),
		success: function(html){
			//alert(html);
			document.getElementById("total").innerHTML=html;
			//$("#subcat").html(html);
		}
	});
}
</script>