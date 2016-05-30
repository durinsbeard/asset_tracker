<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<script src="JS/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="JS/jquery.min.js" type="text/javascript"></script>
<script src="JS/jquery.caret.js" type="text/javascript"></script>
<script src="JS/jquery.ipaddress.js" type="text/javascript"></script>
<script src="JS/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
<script src="JS/jquery.maskedinput.js" type="text/javascript"></script>
<script src="JS/pxgradient-1.0.3.js" type="text/javascript"></script> 
<script>
function validate()
{
	var tag = document.getElementsByName("tag").value;
	if (tag=="")
	{
	alert("You must enter an asset tag");
	return false;
	}
}	
</script>
<?php
$asset_type = ($_GET['assettype']);
include('includes/connect.php');
?>
<table id="contentTable" >
<tr>
	<td>			
		Asset Tag:
	</td>
	<td>			
		<input type="text" name="tag" id="tag" size="27"/>
	</td>
</tr>
</table>
<?				
if ($asset_type == "1")//Desktop
{
?>
<table id="contentTable" >
	<tr>
		<td>			
			Operating System:
		</td>
		<td>			
			<?include('includes/OSInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			OS Key:
		</td>
		<td>
			<?include('includes/OSKeyInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Microsoft Office Version:
		</td>
		<td>	
			<?include('includes/officeVersionInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Office Key:
		</td>
		<td>			
			<?include('includes/officeKeyInclude.php');?>
			<input type="text" name="form"  id="form" value="asset" style="display:none;" />
		</td>
	</tr>
	<tr>
		<td>			
			Wired Mac Address:
		</td>
		<td>			
			<?include('includes/wiredMacAddressInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Wireless Mac Address:
		</td>
		<td>
			<?include('includes/wirelessMacAddressInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			User:
		</td>
		<td>
			<?include('includes/userInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Company:
		</td>
		<td>
			<?include('includes/listCompanies.php');?>
		</td>
	</tr>
	<tr>
	<tr>
		<td>			
			IP Address:
		</td>
			<?include('includes/ipaddsInclude.php');?>
	</tr>
</table>
<?
}else if ($asset_type == "2" || $asset_type == "3" || $asset_type == "10")//Access Point, Printer, Switch
{
?>
<table id="contentTable">
	<tr>
		<td>			
			Wired Mac Address:
		</td>
		<td>			
			<input type="text" name="wiredMacAddress" id="wiredMacAddress" value="<?echo $row['wired_mac_address']?>"/>
		</td>
	</tr>
	<tr>
		<td>			
			Wireless Mac Address:
		</td>
		<td>
			<input type="text" name="form" id="form" value="asset" style="display:none;" />
			<input type="text" name="wirelessMacAddress" id="wirelessMacAddress" size="27" value="<?echo $row['wireless_mac_address']?>"/>
		</td>
	</tr>
	<tr>
		<td>			
			IP Address:
		</td>
			<?include('includes/ipaddsInclude.php');?>
	</tr>
</table>
<?
}else if ($asset_type == "8")//Ipad
{
?>
<table id="contentTable">
	<tr>
		<td>			
			Wired Mac Address:
		</td>
		<td>			
			<?include('includes/wiredMacAddressInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Wireless Mac Address:
		</td>
		<td>
			<input type="text" name="form" id="form" value="asset" style="display:none;" />
			<?include('includes/wirelessMacAddressInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			User:
		</td>
		<td>
			<?include('includes/userInclude.php');?>
		</td>
	</tr>
		<td>			
			Company:
		</td>
		<td>
			<?include('includes/listCompanies.php');?>
		</td>
	</tr>
</table>
<?
}else if ($asset_type == "4")//Digital Phone
{
?>
<table id="contentTable">
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
			Extension:
		</td>
		<td>
			<input type="text" name="form" id="form"  value="asset" style="display:none;" />
			<input type="text" name="extension"/>
		</td>
	</tr>
	<tr>
		<td>			
			Lot Number:
		</td>
		<td>			
			<input type="text" name="lotNumber" />
		</td>
	</tr>
</table>
<?	
}else if ($asset_type == "5")//IP Phone
{
?>
<table id="contentTable">
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
			Extension:
		</td>
		<td>
			<input type="text" name="form" id="form" value="asset" style="display:none;" />
			<input type="text" name="extension"/>
		</td>
	</tr>
	<tr>
		<td>			
			Lot Number:
		</td>
		<td>			
			<input type="text" name="lotNumber" />
		</td>
	</tr>
	<tr>
		<td>			
			IP Address:
		</td>
			<?include('includes/ipaddsInclude.php');?>
	</tr>
</table>
<?	
}else if ($asset_type == "12")//Laptop
{
?>
<table id="contentTable" >
	<tr>
		<td>			
			Operating System:
		</td>
		<td>			
			<?include('includes/OSInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			OS Key:
		</td>
		<td>
			<?include('includes/OSKeyInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Microsoft Office Version:
		</td>
		<td>	
			<?include('includes/officeVersionInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Office Key:
		</td>
		<td>			
			<?include('includes/officeKeyInclude.php');?>
			<input type='text' name='form' id="form" value='asset' style='display:none;' />
		</td>
	</tr>
	<tr>
		<td>			
			Wired Mac Address:
		</td>
		<td>			
			<?include('includes/wiredMacAddressInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Wireless Mac Address:
		</td>
		<td>
			<?include('includes/wirelessMacAddressInclude.php');?>
		</td>
	</tr>
		<tr>
		<td>			
			User:
		</td>
		<td>
			<?include('includes/userInclude.php');?>
		</td>
	</tr>
		<td>			
			Company:
		</td>
		<td>
			<?include('includes/listCompanies.php');?>
		</td>
	</tr>
</table>
<?
}else if ($asset_type == "13")//Server
{
?>
<table id="contentTable" >
	<tr>
		<td>			
			Operating System:
		</td>
		<td>			
			<?include('includes/OSInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			OS Key:
		</td>
		<td>
			<?include('includes/OSKeyInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Microsoft Office Version:
		</td>
		<td>	
			<?include('includes/officeVersionInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Office Key:
		</td>
		<td>			
			<?include('includes/officeKeyInclude.php');?>
			<input type="text" name="form" id="form" value="asset" style="display:none;" />
		</td>
	</tr>
	<tr>
		<td>			
			Wired Mac Address:
		</td>
		<td>			
			<?include('includes/wiredMacAddressInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			Wireless Mac Address:
		</td>
		<td>
			<?include('includes/wirelessMacAddressInclude.php');?>
		</td>
	</tr>
	<tr>
		<td>			
			IP Address:
		</td>
			<?include('includes/ipaddsInclude.php');?>
	</tr>
</table>
<?	
}
?>
<input id="sub_button" type="submit" value="Submit" class="wide" onclick="return validate()"/>