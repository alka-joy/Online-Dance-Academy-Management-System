<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:lightslategray;color: black;">
<body>
<?php
ob_start();
include("Head.php");
session_start();
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
	$ins="insert into tbl_admission(admission_number,student_id,subcategory_id,grand_total,emi,count)values('$ran','".$_GET["student_id"]."','".$sub."','".$_POST["txttotal"]."','".$_POST["txtemi"]."','".$_POST["txtcount"]."')";
	mysql_query($ins);
	//echo $ins;
	header("location:StudentRegistration.php");
}


$sel="select * from tbl_studentregistration where student_id='".$_GET["student_id"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
?>
<br><br><br><br><br><br><br><br><br><br><br>
 <div class="container">
 <center><h1>Admission Details</h1></center>
        <form method="post">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <img src="../Assets/Files/User/<?php echo $row["student_photo"]?>" alt="imagepro" width="114" height="88" />
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td width="187"><?php echo $row["student_name"]?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?php echo $row["student_contact"]?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row["student_email"]?></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>
                                <?php 
                                    $sel="select * from tbl_category";
                                    $data=mysql_query($sel);
                                    while($row=mysql_fetch_array($data))
                                    {
                                ?>
                                <div class="form-check">
                                    <input type="checkbox" name="cate[]" id="cate" class="form-check-input cate" value="<?php echo $row["category_id"]?>" onclick="getSub()"/>
                                    <label class="form-check-label" for="cate"><?php echo $row["category_name"]?></label>
                                </div>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Subcategory</th>
                            <td id="subcat"><?php echo $row["category_name"]?></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td id="total"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="submit" name="btnsave" value="Add" class="btn btn-primary" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JavaScript if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>






</body>
</html>

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
			//alert(html);
			document.getElementById("total").innerHTML=html;
			//$("#subcat").html(html);
		}
	});
}
</script>
<?php
include("Foot.php");
ob_flush(); 
?>