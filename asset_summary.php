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
				Asset Type
			</th>
			<th>
				Count
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "SELECT asset_types.asset_type, 
						count(*) as count 
					FROM assets 
					LEFT JOIN asset_types ON assets.asset_type_id = asset_types.asset_type_id 
					WHERE asset_types.active=1 
					AND assets.active=1 
					GROUP BY asset_types.asset_type";
			
			$result = mysql_query($sql,$con);
			
			while($row=mysql_fetch_array($result))
			{
			?>
				<tr>
					<td style="border:1px solid; border-color:#1C1C1C; text-align:center;">
					<a href="?form=list_assets_by_type&asset_type=<?echo $row['asset_type']?>&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>" title="view list of <?echo $row['asset_type']?>s">
						<?echo $row['asset_type']?>
					</a>
					</td>
					<td style="border:1px solid; border-color:#1C1C1C; text-align:center;">
						<?echo $row['count']?>
					</td>
				</tr>
			<?
			}
		?>
	</tbody>