<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);

if($form == "linkedAssetForm")
{	
	$sql= "SELECT * FROM  assets where asset_id = '" .$asset_id. "'";
	        
	$query = mysql_query($sql,$con);
	$row=mysql_fetch_array($query);
	
		echo $row['office_key']; 
	
	
}else if (!empty($asset))
{
	
	
	$sqlOVKey = "SELECT * FROM  assets where asset_id = '" .$asset. "'";
	$queryOVKey = mysql_query($sqlOVKey,$con);
	while($rowOVKey=mysql_fetch_array($queryOVKey))
	{
	?>
		<input type='text' name='officeKey' size='27' value='<?php echo $rowOVKey['office_key']; ?>'/>
	<?
	}
}else
{
	?><input type='text' name='officeKey' size='27' /><?
}
?>