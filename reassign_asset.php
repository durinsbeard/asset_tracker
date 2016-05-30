<?php
	include("includes/connect.php");
	
	
	$sql1 = "SELECT asset_tag FROM assets
			 WHERE asset_tag <> ''
			 ORDER BY asset_tag";
			
	$result1 = mysql_query($sql1,$con);
	
	$sql2 = "SELECT user_name from users
			 ORDER BY user_name";
	$result2 = mysql_query($sql2,$con);
?>
<table id="contentTable">
	<td>
		Asset Tag:
	</td>
		<td>
			<?php include('includes/assetsInclude.php'); ?>
		</td>
	</tr>
		<tr>
			<td>
				User:
			</td>
			<td>
				<?php include('includes/userInclude.php'); ?>
			</td>
		<tr>
		<tr>
			<td>
				Company:
			</td>
			<td>
				<?php include('includes/listCompanies.php'); ?>
			</td>
<tr>
	<td>
		Date Reassigned:
	</td>
	<td>
		<input type="text" name="form" value="reassign_asset" style="display:none;" />
		<input type="text" name="date" id="date" value="<?echo date('Y-m-d');?>" />
		<script>
		
		$( "#date" ).datepicker({
			showOn: "button",
			buttonImage: "images/Calendar-icon.png",
			buttonImageOnly:true,
			buttonText: "Select a date",
			showWeek: true,
			showOtherMonths: true,
			selectOtherMonths:false,
			dateFormat: "yy-mm-dd"
		});
		</script>
	</td>
	<td>
		
	</td>
</tr>
</table>
		
