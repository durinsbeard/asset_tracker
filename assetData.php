<?
$id = mysql_real_escape_string($_GET['asset_id']);
$type = mysql_real_escape_string($_GET['asset_type']);
?>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<link href="css/jquery-ui.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />
		<script src="JS/jquery.min.js" type="text/javascript"></script>
		<script src="JS/jquery.caret.js" type="text/javascript"></script>
		<script src="JS/jquery.ipaddress.js" type="text/javascript"></script>
		<script src="JS/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
		<script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
		<script src="JS/jquery.maskedinput.js" type="text/javascript"></script>
		<script src="JS/pxgradient-1.0.3.js" type="text/javascript"></script> 
<?
		if ($asset_type == "1")//Desktop
	{
	
	?>
	<ul id="editAssetUL">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	
	<fieldset id="newAssetFieldSet">
			<legend><?echo "Enter ". $typeRow['asset_type']." infromation"?></legend>
		<table id="contentTable" >
		<tr>
			<td>			
				Asset Tag:
			</td>
			<td>			
				<input type="text" name="tag"  id="tag" />
			</td>
		</tr>
		
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
	</fieldset>
	<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
	</form>
	<?
	}else if ($asset_type == "2" || $asset_type == "3" || $asset_type == "10")//Access Point, Printer, Switch
	{
	?>
	<form action="submit.php" method="post" >
	<fieldset>
			<legend><?echo "Enter ". $typeRow['asset_type']." infromation"?></legend>
	<table id="contentTable">
		<tr>
			<td>			
				Asset Tag:
			</td>
			<td>			
				<input type="text" name="tag"  id="tag" />
			</td>
		</tr>
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
	</fieldset>
	<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
	</form>
	<?
	}else if ($asset_type == "8")//Ipad
	{
	?>
	<form action="submit.php" method="post" >
	<fieldset>
			<legend><?echo "Enter ". $typeRow['asset_type']." infromation"?></legend>
	<table id="contentTable">
		<tr>
			<td>			
				Asset Tag:
			</td>
			<td>			
				<input type="text" name="tag"  id="tag" />
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
	</fieldset>
	<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
	</form>
<?
}else if ($asset_type == "4")//Digital Phone
{
?>
<form action="submit.php" method="post" >
<fieldset>
			<legend><?echo "Enter ". $typeRow['asset_type']." infromation"?></legend>
<table id="contentTable">
	<tr>
			<td>			
				Asset Tag:
			</td>
			<td>			
				<input type="text" name="tag"  id="tag" />
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
</fieldset>
<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
</form>
<?	
}else if ($asset_type == "5")//IP Phone
{
?>
<form action="submit.php" method="post" >
<fieldset>
			<legend><?echo "Enter ". $typeRow['asset_type']." infromation"?></legend>
<table id="contentTable">
	<tr>
			<td>			
				Asset Tag:
			</td>
			<td>			
				<input type="text" name="tag"  id="tag" />
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
</fieldset>
<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
</form>
<?	
}else if ($asset_type == "12")//Laptop
{
?>
<form action="submit.php" method="post" >
<fieldset>
			<legend><?echo "Enter ". $typeRow['asset_type']." infromation"?></legend>
<table id="contentTable" >
	<tr>
			<td>			
				Asset Tag:
			</td>
			<td>			
				<input type="text" name="tag"  id="tag" />
			</td>
		</tr>
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
</fieldset>
</form>
<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
</form>
<?
}else if ($asset_type == "13")//Server
{
?>
<form action="submit.php" method="post" >
<fieldset>
			<legend><?echo "Enter ". $typeRow['asset_type']." infromation"?></legend>
<table id="contentTable" >
	<tr>
			<td>			
				Asset Tag:
			</td>
			<td>			
				<input type="text" name="tag"  id="tag" />
			</td>
		</tr>
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
</fieldset>
<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
			</td>
</form>
<?	
}

?>