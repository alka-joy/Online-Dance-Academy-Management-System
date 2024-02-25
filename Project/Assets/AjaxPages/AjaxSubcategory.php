

<?php

include("../Connection/Connection.php");

$category=$_GET["cid"];

$selQry="select * from tbl_subcategory where category_id='$category'";

$data=mysql_query($selQry);

while($row=mysql_fetch_array($data))

{

?>
<input  type="checkbox" name="sub[]" value="<?php echo $row["subcategory_id"]?>"  />	<?php echo $row["subcategory_name"]?>
<?php
}
?>
