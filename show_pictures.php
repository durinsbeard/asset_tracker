	<script>
		$(document).ready(function() {
			$('#sub_button').css("display","none");
		});
	</script>
	<th>
		Asset Tag
	</th>
	<th>
		Images
	</th>
	<th>
		Company
	</th>
</tr>
<tr>
	<?php
		$sql = "SELECT 	asset_tag,
						company_name,
						location
				FROM assets
				LEFT JOIN asset_images on assets.asset_id = asset_images.asset_id
				LEFT JOIN company on assets.company_id = company.company_id
				WHERE assets.active=1
				AND company.active=1
				AND location!=null
				ORDER BY asset_tag";
		$result = mysql_query($sql,$con);
		$identify = "";
		$image_number = 1;
		while($row=mysql_fetch_array($result))
		{
			if($identify == $row['asset_tag'])
			{
				echo "<td>{$row['asset_tag']}</td><td><a href='uploads/{$row['location']}'>Asset Image - {$image_number}</a></td><td>{$row['company_name']}</td></tr><tr>";
				$identify = $row['asset_tag'];
				$image_number++;
			}
			else
			{
				$image_number=1;
				echo "<td>{$row['asset_tag']}</td><td><a href='uploads/{$row['location']}'>Asset Image - {$image_number}</a></td><td>{$row['company_name']}</td></tr><tr>";
				$identify = $row['asset_tag'];
				$image_number++;
			}
		}
	?>