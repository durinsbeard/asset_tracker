<?
$asset = ($_GET['asset']);
$assetTag = ($_GET['asset_tag']);
echo $asset;
echo $assetTag;
?>


<div id="content">
	<center><ul id="editAssetUl">
	<li><a href="?form=assetData&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">EDIT INFORMATION</a></li>
	<li> <a href="?form=reassignIP&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">ASSIGN/REASSIGN IP</li>
	<li> <a href="?form=deactivate_asset&asset=<?echo $asset?>&asset_tag=<?echo $assetTag?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">DEACTIVATE</li>
	</ul><center>
<form action="upload_image_submit.php" method="post" enctype="multipart/form-data" onsubmit="return validate('manage_images');">
	<table id="contentTable">
		<td style="white-space: nowrap;">			
			Upload Image:
		</td>
		<td>
			<input type="file" name="imageFile" id="imageFile" value="NULL"/>
			<input type="text" name="form" value="asset_image" style="display:none;" />
			<input type="text" name="assettype" id="assettype"  value="<?echo $row2['asset_type_id']?>" style="display:none;" />
			<input type="text" name="assetid" id="assetid"  value="<?echo $asset?>" style="display:none;" />
		</td>
	</tr>
	<tr>
	
	</tr>
	</table>
	
	<td colspan="2" align="center">
		<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
	</td>
</form>