<?


$id = mysql_real_escape_string($_GET['asset_id']);
$type = mysql_real_escape_string($_GET['asset_type']);


?>
<script>
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		$('#myTable').tablesorter();
		});
</script>
</table>
<table  id="reportTable" style="border-collapse:separate; border-spacing:2px;">
<thead style='background: #1C1C1C; color:#FFFFFF;'>
	<tr>
		<th>
			Asset Type
		</th>
		<th>
			Asset Tag
		</th>
		<th>
			Edit Asset
		</th>
	</tr>
</thead>
<tbody>
<?php
	$sql = "SELECT t.asset_type as type,
			a.asset_id,
			a.wired_mac_address as wired,
			a.wireless_mac_address as wireless,
			a.asset_tag as tag,
			a.operating_system_id as os,
			a.office_version_id as office,
			img.location
			FROM assets a
			LEFT JOIN asset_types t on a.asset_type_id = t.asset_type_id
			LEFT JOIN asset_images img on a.asset_id = img.asset_id
			WHERE a.active = 1 AND t.asset_type = '".$type."'
			order by a.asset_tag;";
	$result = mysql_query($sql,$con);
	while($row=mysql_fetch_array($result))
	{
	?>
		<tr>
			<td style="border:1px solid; border-color:#1C1C1C; text-align:center;">
				<?echo $row['type']?>
			</td>
			<td style="border:1px solid; border-color:#1C1C1C; text-align:center;">
				<a style="display:block;" <a href="?form=linkedAssetForm&asset_id=<?echo$row['asset_id']?>&asset_type=<?echo $row['type']?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>" title="view asset info">
					<?echo $row['tag']?>
				</a>
			</td>
			<td style="border:1px solid; border-color:#1C1C1C; text-align:center;">
				<a href="?form=assetData&asset=<?echo $row["asset_id"]?>&asset_tag=<?echo $row['tag']?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>"><img style="border: 0;" src='images/rsz_1418689941_list-edit.png' alt='edit' title='edit asset' /></a> 
				<!--<a onClick=window.open("assetData.php?asset=<?//echo $row["asset_id"]?>&asset_tag=<?//echo $row['tag']?>","Ratting","width=800,height=500,0,status=0,scrollbars=1").focus(); ;><img style="border: 0;" src='images/rsz_1418689941_list-edit.png' alt='edit' title='edit asset' /></a>-->
			</td>
		</tr>
	<?
	}
	
?>
</tbody>