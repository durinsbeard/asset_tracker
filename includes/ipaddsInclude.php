<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);
if($form == "linkedAssetForm")	
{
	$sqlIP = "SELECT ip_prefixes.ip_prefix, assets.ip_suffix
			FROM ip_prefixes 
			INNER JOIN assets ON ip_prefixes.ip_prefix_id = assets.ip_prefix_id
			AND assets.asset_id ='" .$id. "'";
	$queryIP = mysql_query($sqlIP,$con);
	$rowIP = mysql_fetch_array($queryIP);
	
		
	echo $rowIP['ip_prefix'] . $rowIP['ip_suffix'];
	
}else if (!empty($asset))
{
		$sqlAssigned = "SELECT ip_prefixes.ip_prefix, assets.ip_suffix
			FROM ip_prefixes 
			INNER JOIN assets ON ip_prefixes.ip_prefix_id = assets.ip_prefix_id
			AND assets.asset_id ='" .$asset. "'";
			$queryAssigned = mysql_query($sqlAssigned,$con);
			$rowAssigned = mysql_fetch_array($queryAssigned);
			
		
			?><input name='olpIP' id='oldIP' value='<?echo $rowAssigned['ip_prefix'] . $rowAssigned['ip_suffix'];?>' readonly><?
		
		
		/*$sqlSub  = "SELECT * FROM ip_prefixes WHERE ip_prefix_id = (SELECT ip_prefix_id FROM assets WHERE asset_id = '" .$asset. "')";
		$querySub  = mysql_query($sqlSub,$con);
		$rowSub =mysql_fetch_array($querySub);
		?>
		<select name='subnets' id='subnets'>
		<option value="<?echo $rowSub['ip_prefix_id']?>"><?echo $rowSub['ip_prefix']?></option>
		<?
		$sqlASub= "SELECT * FROM ip_prefixes";
		$queryASub = mysql_query($sqlASub,$con);
		while($rowASub=mysql_fetch_array($queryASub))
		{
			?>
			<option value="<?echo $rowASub['prefix_id']?>"><?echo $rowASub['ip_prefix']?></option>
			
			<?
		}
		$sqlOct = "SELECT ip_suffix FROM ip_suffixes where asset_id = '" .$asset. "'";
		$queryOct = mysql_query($sqlOct,$con);
		$rowOct=mysql_fetch_array($queryOct);
		
		

		?>
		</select>
		<select name='lastOctet' id='lastOctet'>
		<option value='<?echo $rowOct['ip_suffix']?>' ><?echo $rowOct['ip_suffix']?></option>
		<?php

			$sqlSuffix = "SELECT * FROM ip_suffixes WHERE active = 1";
			$querySuffix = mysql_query($sqlSuffix,$con);
			
			while($rowSuffix=mysql_fetch_array($querySuffix))
			{
				?>
					<option size='5' value='<?echo $rowSuffix['ip_suffix']?>'><?echo $rowSuffix['ip_suffix']?> </option>
				<?
			}
		?>
		</select>
<?*/

}else
{
?>
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
		<?

}
?>
	