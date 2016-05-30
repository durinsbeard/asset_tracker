<?php
	if(isset($_GET['error']))
	{
		echo "<h3>Error submitting data to database.</h3>";
	}
?>
<table id="contentTable">	
	<td>
		First Name:
	</td>
	<td>
	<?php include('includes/userInclude.php');?>
	</td>
</tr>
<tr>
	<td>
		Remove Date:
	</td>
	<td>
		<input type="text" name="form" value="deactivate_user" style="display:none;" />
		<input type="text" name="removed" id="removed" value="<?echo date('Y-m-d');?>" />
		<script>
		$( "#removed" ).datepicker({
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
</tr>
</table>