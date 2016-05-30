<?include("includes/connect.php");?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link href="css/jquery-ui.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />
<script src="JS/jquery-1.11.1.min.js" type="text/javascript"></script>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table id="contentTable" >
	<tr>
		<td>
	   <select name='assettype' onchange='this.form.submit();'>
	   
				<option  value='NULL'>select asset type</option>
				<?
				$sql = "SELECT asset_categories.asset_category, asset_types.asset_type, asset_types.asset_type_id
						FROM asset_categories
						INNER JOIN asset_types ON asset_categories.asset_category_id = asset_types.asset_category_id
						order by asset_categories.asset_category";
				$query = mysql_query($sql,$con);
				$firstTime = true;
				while($row=mysql_fetch_array($query))
				{
					if($lastOptGrp != $row['asset_category'])
						{
							if(!$firstTime)
							{
								?>
									</optgroup>
								<?
							}
							?>
								<optgroup style="font-size:large; font-weight:Bold; color:#0B2161;" label="<?echo $row['asset_category']?>">
							<?
						}
					$firstTime = false;
					?>
						<option style="font-weight:normal; color:#A4A4A4;" value="<?echo $row['asset_type_id']?>"><?echo $row['asset_type']?></option>
					<?
					$lastOptGrp = $row['asset_category'];
				}
				?>
				</optgroup>
				</select>
			</td>
		</tr>	
</table>
</form>
<?php

if(!empty($_POST['assettype'])) 
{

	$asset_type = mysql_real_escape_string($_POST['assettype']);
	$typeSql = "select * from asset_types where asset_type_id = '".$asset_type."'";
	$typeQuery = mysql_query($typeSql,$con);
	$typeRow=mysql_fetch_array($typeQuery);
	?><form action="submit.php" method="post" onsubmit="return validate()" >
	<input type="text" name="assettype"  id="assettype" value="<?echo $asset_type?>" style="display:none;" /><?
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