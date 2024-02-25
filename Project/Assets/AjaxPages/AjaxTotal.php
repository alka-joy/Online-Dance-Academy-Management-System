<?php

include("../Connection/Connection.php");

$category = $_GET["cid"];
$categoryArray = explode(",", $category);

$selQry = "SELECT * FROM tbl_subcategory WHERE subcategory_id IN (" . implode(",", $categoryArray) . ")";
$data = mysql_query($selQry);
$total=0;
$count=0;
while($row=mysql_fetch_array($data))
{
	$count=$count+1;
$total=$total+$row["subcategory_rate"];


}
$maxtotal=$total-2000;
$installmentrate=$maxtotal/$count;

echo "Total To Pay:".$total." Total No of Installments :".$count." EMI Amount :".$installmentrate;
?>
<input type="hidden" name="txttotal" value="<?php echo $maxtotal?>" />
<input type="hidden" name="txtcount" value="<?php echo $count?>" />
<input type="hidden" name="txtemi" value="<?php echo $installmentrate?>" />