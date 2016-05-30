<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);
if($form == "linkedAssetForm")
{
	$sql = "SELECT * FROM  assets where asset_id = '" .$asset_id. "'";
	        
	$query = mysql_query($sql,$con);
	$row=mysql_fetch_array($query);
	
	echo $row['os_key'];
	
}else if (!empty($asset))
{
	$sqlOSKey = "SELECT * FROM  assets where asset_id = '" .$asset. "'";
	        
	$queryOSKey = mysql_query($sqlOSKey,$con);
	while($rowOSKey=mysql_fetch_array($queryOSKey))
	{
	?>
		<input type='text' name='oskey' size='27' value='<?php echo $rowOSKey['os_key']; ?>'/>
	<?
	}
}else
{
	?>
		<input type='text' name='oskey' size='27' />
	<?
}
?>