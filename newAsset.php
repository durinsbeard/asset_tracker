<?include("includes/connect.php");




if(!empty($_POST['assettype'])) 
{

	$asset_type = mysql_real_escape_string($_POST['assettype']);
	$typeSql = "select * from asset_types where asset_type_id = '".$asset_type."'";
	$typeQuery = mysql_query($typeSql,$con);
	$typeRow=mysql_fetch_array($typeQuery);
	?><center><legend style="margin-top:20px;color:#848484;">SELECT ASSET TYPE</legend></center>
	<center><div style='border:1px solid;black;border-radius:10px;color:#6E6E6E;width:800px;height:75px;border-color:#A4A4A4;'>
	<div class="wrapper" style="margin-top:20px;">
	<center>
	<div class="assetTab" >
		<a class="first" href="?form=newAsset&asset_type=2&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Access Point</a>
		<a href="?form=newAsset&asset_type=1&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Desktop</a>
		<a href="?form=newAsset&asset_type=4&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Digital Phone</a>
		<a href="?form=newAsset&asset_type=5&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">IP Phone</a>
		<a href="?form=newAsset&asset_type=8&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Ipad</a>
		<a href="?form=newAsset&asset_type=12&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Laptop</a>
		<a href="?form=newAsset&asset_type=3&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Printer</a>
		<a href="?form=newAsset&asset_type=13&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Server</a>
		<a href="?form=newAsset&asset_type=10&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>" class="last">Switch</a></div></center>
	</div>
	</div>
	</div>
	<div id="assets"></div>
	<pre>
	<form action="submit.php" method="post" onsubmit="return validate()" >
	<?
    if ($asset_type == "1")//Desktop
	{
	
	?>
	
	<fieldset id="newAssetFieldSet">
			<legend><font style="text-decoration:none;color:black;"><?echo "Add ". $typeRow['asset_type']?></font></legend>
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
			<legend><font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:black;"><?echo "Add ". $typeRow['asset_type']?></font></legend>
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
			<legend><font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:black;"><?echo "Add ". $typeRow['asset_type']?></font></legend>
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
			<legend><font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:black;"><?echo "Add ". $typeRow['asset_type']?></font></legend>
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
			<legend><font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:black;"><?echo "Add ". $typeRow['asset_type']?></font></legend>
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
			<legend><font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:black;"><?echo "Add ". $typeRow['asset_type']?></font></legend>
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
			<legend><font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:black;"><?echo "Add ". $typeRow['asset_type']?></font></legend>
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
}
?>