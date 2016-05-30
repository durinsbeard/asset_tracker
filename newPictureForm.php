<script>


function validate()
{
	var file = document.getElementById("file").value;
	var tag = document.getElementById("tag").value;
	if (file == "NULL" || tag == "NULL")
	{
		alert("You must enter asset tag and image before submitting.");
		return false;
	}
}

</script>

<?php
	if(isset($_GET["error"]))
	{
		if($_GET["error"] == 1)
		{
			echo "<h3>File Name already exists. Rename and try again.</h3>";
		}
		else if($_GET["error"]==2)
		{
			echo "<h3>Please select an asset to attach this image to.</h3>";
		}
		else if ($_GET["error"]==3)
		{
			echo "<h3>Unspecified error. Please contact support - Error 3</h3>";
		}
		else if ($_GET["error"]==4)
		{
			echo "<h3>File Already Exists; Rename and try again.</h3>";
		}
	}
?>
<table id="contentTable">
	<td>
		Upload Image:
	</td>
	<td>
		<input type="file" name="file" id="file" value="NULL" id="file" />
		<input type="text" name="form" value="asset_image" style="display:none;" />
	</td>
</tr>
<tr>
	<td>
		Assign to Asset:
	</td>
	<td>
		<select name='asset' id='tag'>
	<option  value='NULL'>select asset tag</option>
	<?
	$sql = "SELECT asset_types.asset_type, asset_types.asset_type_id, assets.asset_tag, assets.asset_id
			FROM asset_types 
			LEFT OUTER JOIN assets ON asset_types.asset_type_id = assets.asset_type_id
			WHERE asset_types.asset_type_id !=4
			AND asset_types.asset_type_id !=5
			AND assets.active = 1
			ORDER BY asset_types.asset_type,assets.asset_tag";
			$query = mysql_query($sql,$con);
			$firstTime = true;
			
			while($row=mysql_fetch_array($query))
			{
				if($lastOptGrp != $row['asset_type'])
					{
						if(!$firstTime)
						{
							?>
								</optgroup>
							<?
						}
						?>
							<optgroup style="font-size:large; font-weight:Bold; color:#0B2161;" label="<?echo $row['asset_type']?>">
						<?
					}
				$firstTime = false;
				?>
					<option style="font-weight:normal; color:#A4A4A4;"value="<?echo $row['asset_id']?>" color="#6E6E6E"><?echo $row['asset_tag']?></option>
				<?
				$lastOptGrp = $row['asset_type'];
	}
	?>
	</optgroup>
	</select>
	</td>
</tr>
</table>
