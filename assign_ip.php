<?
		include('includes/connect.php');
		$assettype = mysql_real_escape_string($_POST['assettype']);
		$assetid = mysql_real_escape_string($_POST['assetid']);
		
		$oldSuffix = mysql_real_escape_string($_POST['oldSuffix']);
		$oldPrefix = mysql_real_escape_string($_POST['oldPrefix']);
		
		if (isset($_POST['subnets']) && isset($_POST['lastOctet']))
		{
			$subnet_id = mysql_real_escape_string($_POST['subnets']);
			$lastOctet = mysql_real_escape_string($_POST['lastOctet']);
			
				$sql = "UPDATE assets SET ip_prefix_id = '".$subnet_id."', ip_suffix = '".$lastOctet."'
						WHERE asset_id = '" .$assetid. "'";
				echo $sql;
			if(mysql_query($sql,$con))
			{
				
				$sql = "UPDATE  ip_suffixes SET active = '0', asset_id = 
							(SELECT asset_id FROM assets WHERE asset_id = '" .$assetid. "') 
							where ip_suffix = '" .$lastOctet. "'";
				
					if(mysql_query($sql,$con))
					{
						$sql = "UPDATE ip_suffixes SET active = 1, asset_id = 0
								WHERE ip_suffix = '".$oldSuffix."' AND ip_prefix_id = 
								(SELECT ip_prefix_id FROM ip_prefixes WHERE ip_prefix = '".$oldPrefix."')";
								
						if(mysql_query($sql,$con))
						{		
							header('Location: index.php?form=reassignip');
						}
					}
			}else
			{
				die('Could not insert data. ' . mysql_error());
			}
		
		}
		
	}
?>