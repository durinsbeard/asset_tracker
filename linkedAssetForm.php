<?

//include("connect.php");

if(!isset($_GET['asset_id']))
{
	header("location: index.php");
}

$id = mysql_real_escape_string($_GET['asset_id']);
$type = mysql_real_escape_string($_GET['asset_type']);
$sql = "SELECT * FROM assets WHERE active = 1 AND asset_id = '" .$id. "'";	
$result = mysql_query($sql,$con);
$row = mysql_fetch_array($result);

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
		}
	}
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		
	});
	</script>

<table id="assetInfoTable">
	
	
	<col align="right" style="background-color:#000000">
	<tr>
		<td >			
			Asset Type:
		</td>
		<td style="padding-right: 2cm;">			
			<?
				include('includes/listAssetTypes.php');
			?>
		</td>
	</tr>
	
	<tr>
		<td >			
			Asset Tag:
		</td>
		<td >			
			<?
				include('includes/assetsInclude.php');
			?>
			<input type="text" name="form" value="linkedAssetForm" style="display:none;"/>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Company:
		</td>
		<td width="50%">			
			<?
				include('includes/listCompanies.php');
			?>
		</td>
	</tr>
<?echo $row['wired_mac_address'];?>

<?if ($type == "Access Point")
{
		
	
 ?>
	<tr>
		<td width="50%">			
			IP Address:
		</td>
		<td>
			<?php
				include('includes/ipaddsInclude.php');
			?>
		</td>
	<tr>
		<td width="50%">			
			Wired Mac Address
		</td>
		<td width="50%">			
			<?php include('includes/wiredMacAddressInclude.php'); ?>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Wireless Mac Address
		</td>
		<td width="50%">			
			<?php include('includes/wirelessMacAddressInclude.php'); ?>
		</td>
	</tr>
<?}else if ($type == "Desktop" || $type == "Server" || $type == "Laptop")
{
?>
	<tr>
		<td width="50%">			
			IP Address:
		</td>
		<td>
			<?php
				include('includes/ipaddsInclude.php');
			?>
		</td>
	</tr>
	<tr>
		<td >			
			Operating System
		</td>
		<td style="padding-right: 2cm;">		
			<?
				include('includes/OSInclude.php');
			?>
		</td>
	</tr>
	<tr>
		<td >			
			OS Key:
		</td>
		<td style="padding-right: 2cm;">			
			<?php 
				include('includes/osKeyInclude.php');
			?>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Microsoft Office Version:
		</td>
		<td width="50%">			
			<?php include('includes/officeVersionInclude.php'); ?>
		</td>
	</tr>
	<tr>
		<td>			
			Office Key:
		</td>
		<td width="50%">			
			<?php include('includes/officeKeyInclude.php');?>
			<input type="text" name="form" value="linkedAssetForm" style="display:none;" />
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Wired Mac Address:
		</td>
		<td width="50%">			
			<?php include('includes/wiredMacAddressInclude.php'); ?>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Wireless Mac Address:
		</td>
		<td width="50%">			
			<?php include('includes/wirelessMacAddressInclude.php'); ?>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			User:
		</td>
		<td width="50%">			
			<?php include('includes/userInclude.php'); ?>
		</td>
	</tr>
	<?
}else if ($type == "Digital Phone")
{
?>
	<tr>
		<td width="50%">			
			Prefix:
		</td>
		<td width="50%">			
			<?php include('includes/prefixInclude.php'); ?>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Line Type:
		</td>
		<td width="50%">			
			Digital <input type="radio" name="phone_type" value="1" checked />&nbsp;&nbsp; IP &nbsp;&nbsp;&nbsp;<input type="radio" name="phone_type" value="2" />&nbsp;&nbsp;&nbsp; n/a: <input type="radio" name="phone_type" value="NULL"/>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Extension:
		</td>
		<td width="50%">			
			<input type="text" name="extension" />
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Phone Version:
		</td>
		<td width="50%">			
			<input type="text" name="version" />
		</td>
	</tr>
	<tr>
<?
}else if ($type == "IP Phone")
{
?>
	<tr>
		<td width="50%">			
			IP Address:
		</td>
		<td>
			<?php
				include('includes/ipaddsInclude.php');
			?>
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Line Type:
		</td>
		<td width="50%">			
			Digital <input type="radio" name="phone_type" value="1" />&nbsp;&nbsp; IP &nbsp;&nbsp;&nbsp;<input type="radio" name="phone_type" value="2" checked />&nbsp;&nbsp;&nbsp; n/a: <input type="radio" name="phone_type" value="NULL" />
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Extension:
		</td>
		<td width="50%">			
			<input type="text" name="extension" />
		</td>
	</tr>
	<tr>
		<td width="50%">			
			Phone Version:
		</td>
		<td width="50%">			
			<input type="text" name="version" />
		</td>
	</tr>
	<tr>
<?
}else if ($type == "Ipad")
{
?>
	<tr>
		<td width="50%">			
			Wireless Mac Address
		</td>
		<td>
			<?include('includes/wirelessMacAddressInclude.php');?>
		</td>
	<tr>
	</tr>
	<tr>
		<td width="50%">			
			Wired Mac Address
		</td>
		<td width="50%">			
			<?include('includes/wiredMacAddressInclude.php');?>
		</td>
	</tr>
<?
}else if ($type == "Printer" || $type == "Switch" || $type == "Access Point")
{
?>
	<tr>
		<td width="50%">			
			IP Address:
		</td>
		<td>
			<?php
				include('includes/ipaddsInclude.php');
			?>
		</td>
	<tr>
		<td width="50%">			
			Wireless Mac Address
		</td>
		<td>
			<?include('includes/wirelessMacAddressInclude.php');?>
		</td>
	<tr>
	<tr>
		<td width="50%">			
			Wired Mac Address
		</td>
		<td width="50%">			
			<?include('includes/wiredMacAddressInclude.php');?>
		</td>
	</tr>
<?
}
?>
	<tr>
		<td colspan="2" align="center" style="border:1px solid; border-color:#1C1C1C;">
			<?php
				include('includes/imagesInclude.php');
			?>
		</td>
	</tr>
</table>
	
			
	

	
	
			
