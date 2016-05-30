<script>
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		$('#myTable').tablesorter();
		});
</script>
</table>
<table  id="reportTable" style="border-collapse:separate; border-spacing:2px;">
<thead style='background: #1C1C1C; color:#FFFFFF;' onMouseOver="style.cursor:pointer;">
	<tr>
		<th>
			Asset Type
		</th>
		<th>
			Asset ID
		</th>
	</tr>
</thead>
<tbody>
<?php
	
	$sql = "SELECT 	t.asset_type as type,
					a.asset_id,
					a.wired_mac_address as wired,
					a.wireless_mac_address as wireless,
					a.asset_tag as tag,
					a.operating_system_id as os,
					a.office_version_id as office,
					ip.ip_address as ip,
					img.location
			FROM assets a
			LEFT JOIN ip_addresses ip on a.ip_address_id = ip.ip_address_id
			LEFT JOIN asset_types t on a.asset_type_id = t.asset_type_id
			LEFT JOIN asset_images img on a.asset_id = img.asset_id
			WHERE a.active = 1
			order by a.asset_tag";
	$result = mysql_query($sql,$con);
	while($row=mysql_fetch_array($result))
	{
	?>
		<tr>
			<td style="border:1px solid; border-color:#1C1C1C; text-align:center;">
				<?echo $row['type']?>
			</td>
			<td style="border:1px solid; border-color:#1C1C1C; text-align:center">
				<a href="?form=linkedAssetForm&asset_id=<?echo $row['asset_id']?>&asset_type=<?echo $row['type']?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">
					<font color="#FFFFFF"><?echo $row['tag']?></font>
				</a>
			</td>
		</tr>
	<?
	}
	
?>
</tbody>