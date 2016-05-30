	<?php 
	if(!isset($_GET['asset_id']))
	{
		$id = mysql_real_escape_string($_GET['asset_id']);
	
	}
	?>
	<script>
	function showHideIp(value)
	{
		if (value== 2)
		{
			document.getElementById("showHideIp").style.display = "block";
			document.getElementById("showHideIpLabel").style.display = "block";
		}else{
			document.getElementById("showHideIp").style.display = "none";
			document.getElementById("showHideIpLabel").style.display = "none";
			document.getElementById("subnets").selectedIndex = 0;
			document.getElementById("lastOctet").selectedIndex = 0;
		}
	}
	</script>
<table id="contentTable">
	<tr>
		<td >			
			Asset Type:
		</td>
		<td>			
			<?include('includes/listAssetTypes.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Asset Tag:
		</td>
		<td>			
			<input type="text" name="tag" size="27"/>
		</td>
	</tr>
	<tr>
		<td>			
			Company:
		</td>
		<td>			
			<?php include('includes/listCompanies.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Wired Mac Address:
		</td>
		<td>			
			<input type="text" name="wiredMacAddress" id="wiredMacAddress" size="27" />
		</td>
	</tr>
	<tr>
		<td>			
			Wireless Mac Address:
		</td>
		<td>			
			<input type="text" name="wirelessMacAddress" id="wirelessMacAddress" size="27"/>
		<td>			
	</tr>
	<tr>
		

	<tr>
		<td>			
			Operating System:
		</td>
		<td>			
			<?php include('includes/OSInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			OS Key:
		</td>
		<td>			
			<input type="text" name="oskey" id="oskey" size="27"/>
		</td>
	</tr>
	<tr>
		<td>			
			Microsoft Office Version:
		</td>
		<td>			
			<?php include('includes/officeVersionInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Office Key:
		</td>
		<td>			
			<input type="text" name="officeKey" size="27" />
			<input type="text" name="form" value="asset" style="display:none;" />
		</td>
	</tr>
	<tr>
		<td>			
			Prefix:
		</td>
		<td>			
			<?php include('includes/prefixInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Line Type:
		</td>
		<td>			
			Digital <input type="radio" name="phone_type" value="1" />&nbsp;&nbsp; IP &nbsp;&nbsp;&nbsp;<input type="radio" name="phone_type" value="2" />&nbsp;&nbsp;&nbsp; n/a: <input type="radio" name="phone_type" value="" checked />
		</td>
	</tr>
	<tr>
		<td>			
			Extension:
		</td>
		<td>			
			<input type="text" name="extension"/>
		</td>
	</tr>
	<tr>
		<td>			
			User:
		</td>
		<td>			
			<?php include('includes/userInclude.php');?>
		</td>
	</tr>
	
</table>