<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);
if($form == "linkedAssetForm")
{
		
	
					
		$sql = "SELECT assets.operating_system_id, assets.asset_id,operating_systems.operating_system
			FROM assets 
			left outer join operating_systems on
			assets.operating_system_id =operating_systems.operating_system_id 
			where assets.asset_id = '" .$asset_id. "'";
	        
	$query = mysql_query($sql,$con);
	$row=mysql_fetch_array($query);

		 echo $row['operating_system'];
						
}else if (!empty($asset))
{
	
$sqlAssetOS = "SELECT assets.operating_system_id, assets.asset_id,operating_systems.operating_system
	FROM assets 
	left outer join operating_systems on
	assets.operating_system_id =operating_systems.operating_system_id 
	where assets.asset_id = '" .$asset. "'";

	$queryAssetOS = mysql_query($sqlAssetOS, $con);
	$rowAssetOS=mysql_fetch_array($queryAssetOS);
	
		?>
		<select name='opsys' id='opsys'>
			<option value='<?php echo $rowAssetOS['operating_system_id']; ?>'><?php echo $rowAssetOS['operating_system']?></option>
		<?	
		$sqlOS = "SELECT * FROM operating_systems order by operating_system_id";
		$queryOS = mysql_query($sqlOS, $con);
		while ($rowOS=mysql_fetch_array($queryOS))
		{
		?>
			<option value="<?echo $rowOS['operating_system_id']?>" ><?echo $rowOS['operating_system']?></option>
		<?
		}
		?>
		</select>
		<?
}else
{

	?>
		<select name='opsys' id='opsys'>
			<option value='NULL'>select operating system</option>
		<?	
		$sqlOS = "SELECT * FROM operating_systems order by operating_system_id";
		$queryOS = mysql_query($sqlOS, $con);
		while ($rowOS=mysql_fetch_array($queryOS))
		{
		?>
			<option value="<?echo $rowOS['operating_system_id']?>" ><?echo $rowOS['operating_system']?></option>
		<?
		}
		?>
		</select>
		<?

	
}
?>

