<?php
include('connect.php');
if(!isset($_GET['asset_id']))
{	
	?>
	<select name='asset' id='tag'>
	<option  value='NULL'>select asset tag</option>
	<?
	$sql = "SELECT asset_types.asset_type, asset_types.asset_type_id, assets.asset_tag, assets.asset_id
			FROM asset_types 
			LEFT OUTER JOIN assets ON asset_types.asset_type_id = assets.asset_type_id
			WHERE asset_types.asset_type_id !=4
			AND asset_types.asset_type_id !=5
			AND assets.active = 1
			ORDER BY asset_types.asset_type,assets.asset_tag";
			$query = mysql_query($sql,$con);
			$firstTime = true;
			
			while($row=mysql_fetch_array($query))
			{
				if($lastOptGrp != $row['asset_type'])
					{
						if(!$firstTime)
						{
							?>
								</optgroup>
							<?
						}
						?>
							<optgroup style="font-size:large; font-weight:Bold; color:#0B2161;" label="<?echo $row['asset_type']?>">
						<?
					}
				$firstTime = false;
				?>
					<option style="font-weight:normal; color:#A4A4A4;"value="<?echo $row['asset_id']?>" color="#6E6E6E"><?echo $row['asset_tag']?></option>
				<?
				$lastOptGrp = $row['asset_type'];
	}
	?>
	</optgroup>
	</select>
	<?
	}else
	{$sql = "SELECT * FROM assets WHERE asset_id = '" .$id. "'";
	        
	$query = mysql_query($sql,$con);
	while($row=mysql_fetch_array($query))
	{
	?>
		<?php echo $row['asset_tag']; ?>
	<?
	}

	}
	?>





