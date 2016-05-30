<link type="text/css" rel="stylesheet" href="css/style.css" />

<?php

include('includes/connect.php');
	$asset = ($_GET['asset']);;
	$sqlInfo = "select * from phones where asset_id = '".$asset."'";
	$queryInfo = mysql_query($sqlInfo,$con);
	$rowInfo=mysql_fetch_array($queryInfo);
	
	
	$sqlphone = "SELECT * FROM asset_types
	WHERE asset_type_id = (SELECT asset_type_id FROM assets WHERE asset_id = '".$asset."')";
	$queryphone = mysql_query($sqlphone,$con);
	$rowphone=mysql_fetch_array($queryphone);
	
 if ($rowphone['asset_type_id'] == "4")
		{
		?>
		<table id="contentTable">
		<tr>
		<td>			
			Prefix:
		</td>
		<td>			
			<?php include('includes/prefixInclude.php');?>
		</td>
		</tr>
		<tr>
			<td>			
				Extension:
			</td>
			<td>
				<input type='text' name='assetid' value='<?echo $asset?> ' style='display:none;' />
				<input type='text' name='assettype' value='<?echo $rowphone['asset_type_id']?>' style='display:none;' />
				<input type='text' name='form' value='editphones' style='display:none;' />
				<input type='text' name='extension' value='<?echo $rowInfo['extension']?>'/>
			</td>
		</tr>
		<tr>
			<td>			
				Lot Number:
			</td>
			<td>			
				<input type='text' name='lotNumber' value='<?echo $rowInfo['serial_num']?>'/>
			
		</tr>
		
		</table>
	<?	
	} if ($rowphone['asset_type_id'] == "5")
		{
		?>
		<table id="contentTable">
		<tr>
		<td>			
			Prefix:
		</td>
		<td>
					
		<?include('includes/prefixInclude.php');?>
			
	</select>
	
		</td>
		</tr>
		<tr>
			<td>			
				Extension:
			</td>
			<td>
				<input type='text' name='assetid' value='<?echo $asset ?>' style='display:none;' />
				<input type='text' name='assettype' value='<?echo $rowphone['asset_type_id']?>' style='display:none;' />
				<input type='text' name='form' value='editphones' style='display:none;' />
				<input type='text' name='extension' value='<?echo $rowInfo['extension']?>'/>
			</td>
		</tr>
		<tr>
			<td>			
				Lot Number:
			</td>
			<td>			
				<input type='text' name='lotNumber' value='<?echo $rowInfo['serial_num']?>'/>
			
		</tr>
		<tr>
			<td>			
			IP Address:
			</td>
			<td>
				<?include('includes/ipaddsInclude.php');?>
				<?
				$sql = "SELECT ip_prefix_id, ip_suffix
						FROM ip_suffixes
						WHERE asset_id ='" .$asset. "'";
				$query = mysql_query($sql,$con);
				$row=mysql_fetch_array($query);
				{
				
				?>	
				<input type='text' name="oldPrefix" value="<?echo $row['ip_prefix_id']; ?>"  />
				<input type='text' name="oldSuffix" value="<?echo $row['ip_suffix']; ?>"  />
				<?
				}
				?>
			
		</tr>
	</table>
	<?	
	}
	
?>