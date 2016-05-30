<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);

if($form == "linkedAssetForm")
{
	


		$sql = "SELECT assets.office_version_id, assets.asset_id,office_versions.office_version
			FROM assets 
			left outer join office_versions on
			assets.office_version_id = office_versions.office_version_id
			where assets.asset_id = '" .$asset_id. "'";
	        
	$query = mysql_query($sql,$con);
	$row=mysql_fetch_array($query);
	
		echo $row['office_version'];
		

			
}else if (!empty($asset))

{	
	
$sqlAssetOV = "SELECT assets.office_version_id, assets.asset_id,office_versions.office_version
	FROM assets 
	left outer join office_versions on
	assets.office_version_id =office_versions.office_version_id 
	where assets.asset_id = '" .$asset. "'";

	$queryAssetOV = mysql_query($sqlAssetOV, $con);
	$rowAssetOV=mysql_fetch_array($queryAssetOV);

		?>
		<select name='office'>
			<option value='<?php echo $rowAssetOV['office_version_id']; ?>'><?php echo $rowAssetOV['office_version']?></option>
		<?	
		$sqlOV = "SELECT * FROM office_versions order by office_version";
		$queryOV = mysql_query($sqlOV, $con);
		while ($rowOV=mysql_fetch_array($queryOV))
		{
		?>
			<option value="<?echo $rowOV['office_version_id']?>" ><?echo $rowOV['office_version']?></option>
		<?
		}
		?>
		</select>
		<?

}else
{
		?>
		<select name='office'>
			<option value='NULL'>select office version</option>
		<?	
		$sqlListOV = "SELECT * FROM office_versions order by office_version";
		$queryListOV = mysql_query($sqlListOV, $con);
		while ($rowListOV=mysql_fetch_array($queryListOV))
		{
		?>
			<option value="<?echo $rowListOV['office_version_id']?>" ><?echo $rowListOV['office_version']?></option>
		<?
		}
		?>
		</select>
		<?

}
?>