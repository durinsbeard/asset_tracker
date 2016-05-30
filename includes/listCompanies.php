<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);

if($form == "linkedAssetForm")
{	
	
	$sql = "SELECT assets.company_id, assets.asset_id,company.company_name
			FROM assets 
			left outer join company on
			assets.company_id = company.company_id 
			where assets.asset_id = '" .$asset_id. "'";
	$query = mysql_query($sql, $con);
	$row = mysql_fetch_array($query);
	echo $row['company_name'];
	
	
}else
{
	$sqlAssetCO = "SELECT assets.company_id, assets.asset_id,company.company_name
			FROM assets 
			left outer join company on
			assets.company_id = company.company_id 
			where assets.asset_id = '" .$asset. "'";

	$queryAssetCO = mysql_query($sqlAssetCO, $con);
	$rowAssetCO=mysql_fetch_array($queryAssetCO);
	if (!empty($rowAssetCO['company_id']))
	{
		?>
		<select name='company'>
			<option value='<?php echo $rowAssetCO['company_id']; ?>'><?php echo $rowAssetCO['company_name']?></option>
		<?	
		$sqlCO = "SELECT * FROM company order by company_name";
		$queryCO = mysql_query($sqlCO, $con);
		while ($rowCO=mysql_fetch_array($queryCO))
		{
		?>
			<option value='<?echo $rowCO['company_id']?>' ><?php echo $rowCO['company_name']?></option>
		<?
		}
		?>
		</select>
		<?
	}else
	{
		?>
		<select name='company'>
			<option value='NULL'>select company</option>
		<?	
		$sql = "SELECT * FROM company WHERE active = 1";
		$query = mysql_query($sql, $con);
		while ($row=mysql_fetch_array($query))
		{
		?>
			<option value='<?echo $row['company_id']?>' ><?echo $row['company_name']?></option>";
		<?
		}
		?>
		</select>
		<?
		
	}
}
mysql_close($con);
?>