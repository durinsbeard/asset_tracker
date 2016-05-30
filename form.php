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
	}else
	{
		echo "<h3>The image was successfully uploaded.</h3>";
	}
?>
<?include("includes/connect.php");?>

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