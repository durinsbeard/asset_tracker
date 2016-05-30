<script>
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		$('#myTable').tablesorter();
	});
</script>
</table>
<table id="myTable" class="tablesorter">
<thead>
	<tr>
		<th>
			Asset ID
		</th>
		<th>
			User
		</th>
		<th>
			Start Date
		</th>
		<th>
			End Date
		</th>
		<th>
			Reason Removed
		</th>
	</tr>
</thead>
<tbody class='report'>

<?php
	include('includes/connect.php');
	$asset = mysql_real_escape_string($_POST['assetTag']);
	
	$sql = "SELECT	asset.asset_tag,
					asset.wired_mac_address,
					asset.wireless_mac_address,
					asset.operating_system_id,
					asset.os_key,
					asset.office_version,
					asset.office_key,
					asset.ip_address_id,
					user_name,
					start_date,
					end_date,
					left_location,
					top_location,
					ip_address,
					email,
					reason_removed,
					atypes.asset_type
			FROM tracking_history as track
			WHERE asset.asset_tag = '" .$asset. "'
			LEFT OUTER JOIN (SELECT asset_id,
									asset_type,
									asset_tag,
									wired_mac_address,
									wireless_mac_address,
									operating_system_id,
									os_key,
									office_version,
									office_key,
									ip_address_id
							FROM assets_archive
							where active = '1') as asset on track.asset_id = asset.asset_id
			LEFT OUTER JOIN (SELECT asset_type,
									asset_type_id
							FROM asset_types) as atypes on asset.asset_type = atypes.asset_type_id
			LEFT OUTER JOIN (SELECT ip_address_id,
									ip_address
							FROM ip_addresses
							WHERE active = '1') as ip on asset.ip_address_id = ip.ip_address_id
			LEFT OUTER JOIN users as user on track.user_id = user.user_id
			order by asset.asset_tag";
			
	$query = mysql_query($sql,$con);
	
	while($row=mysql_fetch_array($query))
	{
		echo "<tr><td><a href='mailto:" .$row['asset_type'] ."'>" . $row['asset_tag'] . "</a></td>";
//		echo "<td><a href='#' onClick='copyToClipboard(\"" . $row['asset_tag'] . "\",\"" . $row['wired_mac_address'] . "\",\"" . $row['wireless_mac_address'] . "\",\"" . $row['operating_system_id'] . "\",\"" . $row['os_key'] . "\",\"" . $row['office_version'] . "\",\"" . $row['office_key'] . "\")' title='Wired MACID:" . $row['wired_mac_address'] . "<br />Wireless MACID:" . $row['wireless_mac_address'] . "<br />Asset Tag:" . $row['asset_tag'] . "<br />Operating System:" . $row['operating_system_id'] . "<br />OS Key:" . $row['os_key'] . "<br />Office Version" . $row['office_version'] . "<br />Office Key:" . $row['office_key'] . "'>" . $row['asset_type'] . "</a></td>";
		echo "<td><a style='display:block;' href='#' title='{$row['email']}'>{$row['user_name']}</a></td>";
		echo "<td>" . $row['start_date'] . "</td>";
		echo "<td>" . $row['end_date'] . "</td>";
		echo "<td>" . $row['reason_removed'] . "</td>";
//		echo "<tr id='" . $row['ip_address'] . "' class='report' style='display:none;'><td>Asset Tag:<br />" . $row['asset_tag'] . "</td><td>Wired Mac:<br />" . $row['wired_mac_address'] . "<br /><br />Wireless Mac:<br />" . $row['wireless_mac_address'] . "<td>Operating System:<br />" . $row['operating_system_id'] . "<br /><br />OS Key:<br /><div class='report_2'>" . $row['os_key'] . "</div></td><td>Office Version:<br />" . $row['office_version'] . "<br /><br />Office Key:<br /><div class='report_2'>" . $row['office_key'] . "</div></td><tr><td height='5px'></td></tr>";
		
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