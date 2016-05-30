<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);

if($form == "linkedAssetForm")
{
	$sql = "SELECT * FROM phone_prefixes WHERE prefix_id = (SELECT prefix_id FROM phones where asset_id = '".$asset_id."')";
	$query = mysql_query($sql,$con);
	$row=mysql_fetch_array($query);
	echo $row['prefix'];
	
}else if (!empty($assetid))
{
	$sqlPhonePrefix = "SELECT * FROM phone_prefixes 
			WHERE prefix_id = (SELECT prefix_id FROM phones WHERE asset_id = '".$assetid."')";
	$queryPhonePrefix = mysql_query($sqlPhonePrefix,$con);
	$rowPhonePrefix = mysql_fetch_array($queryPhonePrefix);
	
	

	?>
	<select name='phonePrefix' id='phonePrefix'>
		<option value='<?echo $rowPhonePrefix['prefix_id']?>'><?echo $rowPhonePrefix['prefix']?></option>
	<?php
		$sqlPrefix = "SELECT * FROM phone_prefixes order by prefix";
		$queryPrefix = mysql_query($sqlPrefix,$con);
		while($rowPrefix=mysql_fetch_array($queryPrefix))
		{
			 ?>
			 <option value="<?echo $rowPrefix['prefix_id']?>"><?echo $rowPrefix['prefix']?></option>
			 <?		 
		}
	?>
	</select>
	<?
}else
{

$sql = "SELECT * FROM phone_prefixes order by prefix";
	$query = mysql_query($sql,$con);
	?>
	<select name='phonePrefix' id='phonePrefix'>
		<option value='NULL'>prefix</option>
	<?php
		while($row=mysql_fetch_array($query))
		{
			 ?>
			 <option value="<?echo $row['prefix_id']?>"><?echo $row['prefix']?></option>
			 <?		 
		}
	?>
	</select>
	<?
}
?>