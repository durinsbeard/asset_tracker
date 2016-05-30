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

	<form action="edit_asset_submit.php" method="post" enctype="multipart/form-data" onsubmit="return validate('edit_asset')">
			<fieldset>
			<legend> Edit <?echo $assetTag. "/".$row2['asset_type']?></legend>
			<table id="contentTable" >
				<tr>
					<td style="white-space: nowrap;">			
						Operating System:
					</td>
					<td>			
						<?include('includes/OSInclude.php');?>
					</td>
				</tr>
				<tr>
					<td style="white-space: nowrap;">			
						OS Key:
					</td>
					<td>
						<?include('includes/OSKeyInclude.php');?>
					</td>
				</tr>
				<tr>
					<td style="white-space: nowrap;">			
						Microsoft Office Version:
					</td>
					<td>	
						<?
						include('includes/officeVersionInclude.php');
						?>
					</td>
				</tr>
				<tr>
					<td style="white-space: nowrap;">			
						Office Key:
					</td>
					<td>			
						<?include('includes/officeKeyInclude.php');?>
						<input type="text" name="form" id="form"  value="editasset" style="display:none;" />
						<input type="text" name="assettype" id="assettype"  value="<?echo $row2['asset_type_id']?>" style="display:none;" />
						<input type="text" name="assetid" id="assetid"  value="<?echo $asset?>" style="display:none;" />
					</td>
				</tr>
				<tr>
					<td style="white-space: nowrap;">			
						Wired Mac Address:
					</td>
					<td>			
						<?include('includes/wiredMacAddressInclude.php');?>
					</td>
				</tr>
				<tr>
					<td style="white-space: nowrap;">			
						Wireless Mac Address:
					</td>
					<td>
					<?include('includes/wirelessMacAddressInclude.php');?>
					</td>
				</tr>
		</table>
		</fieldset>
		<td colspan="2" align="center">
			<input id="sub_button" type="submit" value="SUBMIT" class="wide"/>
		</td>
		</form>
		