
<?php

include("../Connection/Connection.php");

$category = $_GET["cid"];
$categoryArray = explode(",", $category);

$selQry = "SELECT * FROM tbl_subcategory WHERE category_id IN (" . implode(",", $categoryArray) . ")";
$data = mysql_query($selQry);


while($row=mysql_fetch_array($data))

{

?>
<input  type="checkbox" name="sub[]" value="<?php echo $row["subcategory_id"]?>" onchange="getTotal()" />	<?php echo $row["subcategory_name"]?>
<?php
}
?>
