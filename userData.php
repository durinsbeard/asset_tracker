<script>
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		//$('#myTable').tablesorter();
	});
</script>
</table>
<table id="reportTable" style="border-collapse:separate; border-spacing:2px;">
<thead style='background: #1C1C1C; color:#FFFFFF;'>
	<tr>
		<th>
			User
		</th>
		<th>
			Start Date
		</th>
		<th>
			Asset ID
		</th>
		<th>
			Asset Type
		</th>
	</tr>
</thead>
<tbody>

<?php
	$firstInitial = ($_GET['firstInitial']);
	include('includes/connect.php');
	$sql = "SELECT	asset.asset_tag,
					asset.asset_id,
					asset.wired_mac_address,
					asset.wireless_mac_address,
					asset.operating_system_id,
					asset.os_key,
					asset.office_version_id,
					asset.office_key,
					asset.ip_address_id,
					first_name,
					last_name,
					start_date,
					left_location,
					top_location,
					ip_address,
					email,
					atypes.asset_type
			FROM tracking as track 
			LEFT OUTER JOIN (SELECT asset_id,
									asset_type_id,
									asset_tag,
									wired_mac_address,
									wireless_mac_address,
									operating_system_id,
									os_key,
									office_version_id,
									office_key,
									ip_address_id
							FROM assets
							where active = '1') as asset on track.asset_id = asset.asset_id
			LEFT OUTER JOIN (SELECT asset_type,
									asset_type_id
							FROM asset_types) as atypes on asset.asset_type_id = atypes.asset_type_id
			LEFT OUTER JOIN (SELECT ip_address_id,
									ip_address
							FROM ip_addresses
							WHERE active = '1') as ip on asset.ip_address_id = ip.ip_address_id
			LEFT OUTER JOIN users as user on track.user_id = user.user_id
			WHERE user.active = '1' 
			AND user.first_name LIKE '$firstInitial%'
			AND track.end_date is null
			order by first_name";
			
	$query = mysql_query($sql,$con);
	
	while($row=mysql_fetch_array($query))
	{
	?>
		<tr>
			<td style='border:1px solid; border-color:#1C1C1C; text-align:center;'>
				
					<?echo $row['first_name']." ".$row['last_name']?>
			</td >
			<td style='border:1px solid; border-color:#1C1C1C; text-align:center;'>
				<?echo $row['start_date']?>
			</td>
			<!--<td><a href='#' onClick='copyToClipboard(\"" . $row['asset_tag'] . "\",\"" . $row['wired_mac_address'] . "\",\"" . $row['wireless_mac_address'] . "\",\"" . $row['operating_system_id'] . "\",\"" . $row['os_key'] . "\",\"" . $row['office_version'] . "\",\"" . $row['office_key'] . "\")' title='Wired MACID:" . $row['wired_mac_address'] . "<br />Wireless MACID:" . $row['wireless_mac_address'] . "<br />Asset Tag:" . $row['asset_tag'] . "<br />Operating System:" . $row['operating_system_id'] . "<br />OS Key:" . $row['os_key'] . "<br />Office Version" . $row['office_version'] . "<br />Office Key:" . $row['office_key'] . "'>" . $row['asset_type'] . "</a></td>";-->
			<td style='border:1px solid; border-color:#1C1C1C; text-align:center;'>
				<a style="display:block;" <a href="?form=linkedAssetForm&asset_id=<?echo$row['asset_id']?>&asset_type=<?echo $row['asset_type']?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>" title="view asset info">
					<?echo $row['asset_tag']?>
				</a>
			</td>
			<td style='border:1px solid; border-color:#1C1C1C; text-align:center;'>
				<?echo $row['asset_type']?>
			</td>
		</tr>
		<!--echo "<tr id='" . $row['ip_address'] . "' class='report' style='display:none;'><td>Asset Tag:<br />" . $row['asset_tag'] . "</td><td>Wired Mac:<br />" . $row['wired_mac_address'] . "<br /><br />Wireless Mac:<br />" . $row['wireless_mac_address'] . "<td>Operating System:<br />" . $row['operating_system_id'] . "<br /><br />OS Key:<br /><div class='report_2'>" . $row['os_key'] . "</div></td><td>Office Version:<br />" . $row['office_version'] . "<br /><br />Office Key:<br /><div class='report_2'>" . $row['office_key'] . "</div></td><tr><td height='5px'></td></tr>";-->
	<?	
	}
?>
</tbody>
<script>
$(function(){
	$(document).load({
		$('#submitbutton').toggle();
	});
}
</script>