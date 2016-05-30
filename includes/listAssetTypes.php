<?php
include('connect.php');
if(!isset($_GET['asset_id']))
{	
	?>
	<select name='assettype'>
	<option  value='NULL'>select asset type</option>
	<?
	$sql = "SELECT asset_categories.asset_category, asset_types.asset_type, asset_types.asset_type_id
			FROM asset_categories
			INNER JOIN asset_types ON asset_categories.asset_category_id = asset_types.asset_category_id
			order by asset_categories.asset_category";
	$query = mysql_query($sql,$con);
	$firstTime = true;
	while($row=mysql_fetch_array($query))
	{
		if($lastOptGrp != $row['asset_category'])
			{
				if(!$firstTime)
				{
					?>
						</optgroup>
					<?
				}
				?>
					<optgroup style="font-size:large; font-weight:Bold; color:#0B2161;" label="<?echo $row['asset_category']?>">
				<?
			}
		$firstTime = false;
		?>
			<option style="font-weight:normal; color:#A4A4A4;" value="<?echo $row['asset_type_id']?>"><?echo $row['asset_type']?></option>
		<?
		$lastOptGrp = $row['asset_category'];
	}
	?>
	</optgroup>
	</select>
	<?
	}else
	{
		$sql = "SELECT asset_type FROM asset_types WHERE asset_type_id = (SELECT asset_type_id FROM assets where asset_id = '" .$id. "')";
				
		$query = mysql_query($sql,$con);
		while($row=mysql_fetch_array($query))
		{
		
			echo $row['asset_type']; 
		
		}

	}
	?>