
<center><ul id="editAssetUl">
	<li <a href="?form=assetData&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>"></a>EDIT INFORMATION</li>
	<li><a href="?form=uploadImage&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">UPLOAD IMAGE</a></li>
	<li a href="?form=reassignIP&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">ASSIGN/REASSIGN IP</li>
	</ul><center>
<form action="deactivate_asset_submit.php" method="post" enctype="multipart/form-data" onsubmit="return validate('deactivate_asset');">
<fieldset>
<legend><?echo "Deactivate ". $assetTag. "/".$row2['asset_type']?></legend>
<table id="contentTable">
<tr>
	<td style="white-space: nowrap;">			
	Disposition:
		
	</td>
	<td>
		<select name="disposition" id="disposition">
			<option value='NULL'>select disposition</option>
			<?php
				$sql = "SELECT 	* FROM asset_disposition ORDER BY dis_value";
				$result = mysql_query($sql,$con);
				while($row=mysql_fetch_array($result))
				{
					echo "<option value='{$row['dis_id']}'>{$row['dis_value']}</option>";
				}
			?>
		</select>
		<input type="text" name="assettype" id="assettype"  value="<?echo $row2['asset_type_id']?>" style="display:none;" />
		<input type="text" name="assetid" id="assetid"  value="<?echo $asset?>" style="display:none;" />
	</td>
</tr>
<tr>
	<td style="white-space: nowrap;">			
						Remove Date:
		
	</td>
	<td>
		<input type="text" name="form" value="deactivate_asset" style="display:none;" />
		<input type="text" name="removed" id="removed" value="<?echo date('Y-m-d');?>" />
		<script>
		$("#removed" ).datepicker({
			showOn: "button",
			buttonImage: "images/Calendar-icon.png",
			buttonImageOnly:true,
			buttonText: "Select a date",
			showWeek: true,
			showOtherMonths: true,
			selectOtherMonths:false,
			dateFormat: "yy-mm-dd"
		});
		</script>
	</td>
</tr>
</table>
	</fieldset>
		<td colspan="2" align="center">
				<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
</form>	