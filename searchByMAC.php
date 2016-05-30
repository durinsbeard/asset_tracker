<script src="JS/jquery-1.11.1.min.js" type="text/javascript"></script>
<table id="reportTable" style="border-collapse:separate; border-spacing:2px;">
<thead style='background: #1C1C1C; color:#FFFFFF;'>
	<tr>
		<th>
			Wired MAC Address
		</th>
		<th>
			Wireless MAC Address
		</th>
		<th>
			Asset Tag
		</th>
		<th>
			Asset Type
		</th>
		<th>
			Edit Asset
		</th>
	</tr>
</thead>
<tbody>
<?
include("includes/connect.php");

$mac = ($_GET['mac']);	
$sql = "SELECT	assets.asset_tag, assets.asset_id, assets.wired_mac_address, 
        assets.wireless_mac_address, asset_types.asset_type
        FROM assets
        LEFT OUTER JOIN asset_types 
        ON assets.asset_type_id = asset_types.asset_type_id
        WHERE assets.wired_mac_address != 'NULL'
		AND assets.wired_mac_address != ''
		AND assets.wireless_mac_address != 'NULL'
		AND assets.wireless_mac_address != ''
		AND assets.wired_mac_address like '%".$mac."%'
		AND assets.wireless_mac_address like '%".$mac."%'";
				
		
	$query = mysql_query($sql,$con);
	
	while($row=mysql_fetch_array($query))
	{
	?>
		<tr>
			<td style='border:1px solid; border-color:#1C1C1C;'>
				
					<font color="#FFFFFF"><?echo $row['wired_mac_address']?></font>
				</a>
			</td >
			<td style='border:1px solid; border-color:#1C1C1C'>
				<?echo $row['wireless_mac_address']?>
			</td>
			<!--<td><a href='#' onClick='copyToClipboard(\"" . $row['asset_tag'] . "\",\"" . $row['wired_mac_address'] . "\",\"" . $row['wireless_mac_address'] . "\",\"" . $row['operating_system_id'] . "\",\"" . $row['os_key'] . "\",\"" . $row['office_version'] . "\",\"" . $row['office_key'] . "\")' title='Wired MACID:" . $row['wired_mac_address'] . "<br />Wireless MACID:" . $row['wireless_mac_address'] . "<br />Asset Tag:" . $row['asset_tag'] . "<br />Operating System:" . $row['operating_system_id'] . "<br />OS Key:" . $row['os_key'] . "<br />Office Version" . $row['office_version'] . "<br />Office Key:" . $row['office_key'] . "'>" . $row['asset_type'] . "</a></td>";-->
			<td style='border:1px solid; border-color:#1C1C1C;'>
				<a style="display:block;" <a href="?form=linkedAssetForm&asset_id=<?echo$row['asset_id']?>&asset_type=<?echo $row['asset_type']?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>" title="<?echo $row['asset_type']?>">
					<font color="#FFFFFF"><?echo $row['asset_tag']?></font>
				</a>
			</td>
			<td style='border:1px solid; border-color:#1C1C1C;'>
				<?echo $row['asset_type']?>
			</td>
				<td style="border:1px solid; border-color:#1C1C1C;">
				<a href="javascript:void(0);"
				onClick=window.open("assetData.php?asset=<?echo $row["asset_id"]?>&asset_tag=<?echo $row['asset_tag']?>","Ratting","width=800,height=500,0,status=0,scrollbars=1").focus(); ;><img style="border: 0;" src='images/rsz_1418689941_list-edit.png' alt='edit' title='edit asset' /></a> 
			</td>
		</tr>
		<!--echo "<tr id='" . $row['ip_address'] . "' class='report' style='display:none;'><td>Asset Tag:<br />" . $row['asset_tag'] . "</td><td>Wired Mac:<br />" . $row['wired_mac_address'] . "<br /><br />Wireless Mac:<br />" . $row['wireless_mac_address'] . "<td>Operating System:<br />" . $row['operating_system_id'] . "<br /><br />OS Key:<br /><div class='report_2'>" . $row['os_key'] . "</div></td><td>Office Version:<br />" . $row['office_version'] . "<br /><br />Office Key:<br /><div class='report_2'>" . $row['office_key'] . "</div></td><tr><td height='5px'></td></tr>";-->
	<?	
	}
	flush();
?>
</tbody>