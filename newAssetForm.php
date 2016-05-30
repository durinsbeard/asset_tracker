<table id="contentTable">
<tr>
	<td>
		Asset Category:
	</td>
	<td>
	<select name='assetCategory'>
		<option  value='NULL'>select asset category</option>
		<?
			include('includes/connect.php');
			$sql = "SELECT * FROM asset_categories";
			$result = mysql_query($sql,$con);
			while($row=mysql_fetch_array($result))
			{
				?>
					<option  size="15" value="<?echo $row['asset_category_id']?>" ><?echo $row['asset_category']?></option>
				<?
			}
		?>
	</select>
	</td>
</tr>
<tr>
	<td>
		Asset Type:
	</td>
	<td>
		<input type="text" name="assettype" size="27" />
		<input type="text" name="form" value="atype" style="display:none;" />
	</td>
</tr>
</table>