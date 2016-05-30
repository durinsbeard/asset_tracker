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
jQuery(function($){
				$("#ip").mask("999.999.999");
				$("#wirelessMacAddress").mask("**:**:**:**:**:**");
				$("#wiredMacAddress").mask("**:**:**:**:**:**");
			});
</script>
<?php
$asset = ($_GET['asset']);
include('includes/connect.php');

?>
	<table id="contentTable">
				<tr>
					<td>			
						Asset Type:
					</td>
					<td>
					<?
					$sql2 = "SELECT * FROM asset_types
							 WHERE asset_type_id = (SELECT asset_type_id FROM assets WHERE asset_id = '".$asset."')";
					$query2 = mysql_query($sql2,$con);
					$row2=mysql_fetch_array($query2);
					?>
						<input name='assetName' type='text' size="20" value='<?php echo $row2['asset_type']; ?>' readonly /></input>
						<input name='assettype' type='hidden' size="20" value='<?php echo $row2['asset_type_id']; ?>' readonly /></input>
					</td>
				</tr>
	
				
		
					<td>			
						IP Address:
					</td>
					<td>
						<?include('includes/ipaddsInclude.php');?>
					</tr>
					<tr>
						<?
						$sql = "SELECT ip_prefixes.ip_prefix, ip_suffixes.ip_suffix
									FROM ip_prefixes 
									INNER JOIN ip_suffixes ON ip_prefixes.ip_prefix_id = ip_suffixes.ip_prefix_id
								AND ip_suffixes.asset_id ='" .$asset. "'";
						$query = mysql_query($sql,$con);
						$row=mysql_fetch_array($query);
						{
						
							
						?>	
						<input type="hidden" name="oldPrefix" value="<?echo $row['ip_prefix']; ?>"  />
						<input type="hidden" name="oldSuffix" value="<?echo $row['ip_suffix']; ?>"  />
						<?
						}
						?>
					<tr>
					<tr>
					<td>			
						New IP Address:
					</td>
					<td>
						
						
							<select name='subnets' id='subnets'>
							<option value="NULL">select</option>
							<?
							$sqlASub= "SELECT * FROM ip_prefixes";
							$queryASub = mysql_query($sqlASub,$con);
							while($rowASub=mysql_fetch_array($queryASub))
							{
								?>
								<option value="<?echo $rowASub['ip_prefix_id']?>"><?echo $rowASub['ip_prefix']?></option>
								
								<?
							}
							?>
							</select>
							<select name='lastOctet' id='lastOctet' >
							<option value='NULL' >select</option>
							<?php

								$sqlSuffix = "SELECT * FROM ip_suffixes WHERE active = 1";
								$querySuffix = mysql_query($sqlSuffix,$con);
								
								while($rowSuffix=mysql_fetch_array($querySuffix))
								{
									?>
										<option size='5' value="<?echo $rowSuffix['ip_suffix']?>"><?echo $rowSuffix['ip_suffix']?></option>
									<?
								}
							?>
							</select>
					
					
	</table>