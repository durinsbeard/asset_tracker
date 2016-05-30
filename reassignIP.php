<div id="content">
	<center><ul id="editAssetUl">
	<li <a href="?form=assetData&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>"></a>EDIT INFORMATION</li>
	<li><a href="?form=uploadImage&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">UPLOAD IMAGE</a></li>
	<li a href="?form=deactivate_asset&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">DEACTIVATE</li>
	</ul><center>



<form action="assign_ip.php" method="post" enctype="multipart/form-data" onsubmit="return validate('reasign_ip');">
<fieldset>
<legend><?echo $assetTag. "/".$row2['asset_type']?></legend>
<table id="contentTable">
<tr>
	<td style="white-space: nowrap;">			
		IP Address:			
	</td>
	<td>
		<?
		include('includes/connect.php');
		$sqlAssigned = "SELECT ip_prefixes.ip_prefix, assets.ip_suffix
						FROM ip_prefixes 
						INNER JOIN assets ON ip_prefixes.ip_prefix_id = assets.ip_prefix_id
						AND assets.asset_id ='" .$asset. "'";
		$queryAssigned = mysql_query($sqlAssigned,$con);
		$rowAssigned = mysql_fetch_array($queryAssigned);
			
		
		?><input name='olpIP' id='oldIP' value='<?echo $rowAssigned['ip_prefix'] . $rowAssigned['ip_suffix'];?>' readonly>
	</tr>
	<tr>
		<?
		$sql = "SELECT ip_prefixes.ip_prefix, ip_suffixes.ip_suffix
				FROM ip_prefixes 
				INNER JOIN ip_suffixes ON ip_prefixes.ip_prefix_id = ip_suffixes.ip_prefix_id
				AND ip_suffixes.asset_id ='" .$asset. "'";
		$query = mysql_query($sql,$con);
		$row=mysql_fetch_array($query);
		{
		
			
		?>	
		<input type="hidden" name="oldPrefix" value="<?echo $row['ip_prefix']; ?>"  />
		<input type="hidden" name="oldSuffix" value="<?echo $row['ip_suffix']; ?>"  />
		<?
		}
		?>
	<tr>
	<tr>
		<td style="white-space: nowrap;">			
		New IP Address:			
			
	</td>
	<td>
		
		
			<select name='subnets' id='subnets'>
			<option value="NULL">select</option>
			<?
			$sqlASub= "SELECT * FROM ip_prefixes";
			$queryASub = mysql_query($sqlASub,$con);
			while($rowASub=mysql_fetch_array($queryASub))
			{
				?>
				<option value="<?echo $rowASub['ip_prefix_id']?>"><?echo $rowASub['ip_prefix']?></option>
				
				<?
			}
			?>
			</select>
			<select name='lastOctet' id='lastOctet' >
			<option value='NULL' >select</option>
			<?php

				$sqlSuffix = "SELECT * FROM ip_suffixes WHERE active = 1";
				$querySuffix = mysql_query($sqlSuffix,$con);
				
				while($rowSuffix=mysql_fetch_array($querySuffix))
				{
					?>
						<option size='5' value="<?echo $rowSuffix['ip_suffix']?>"><?echo $rowSuffix['ip_suffix']?></option>
					<?
				}
			?>
			</select>
					
					
	</table>
	</fieldset>
		<td colspan="2" align="center">
				<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
</form>	