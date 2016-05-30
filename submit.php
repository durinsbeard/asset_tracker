<?php
	echo "it made it to here."
	
	/*include('./includes/connect.php');

	$assettype = mysql_real_escape_string($_POST['assettype']);
		
		if (isset($_POST['tag']))
		{
			$tag = mysql_real_escape_string($_POST['tag']);
			$sqlDup="SELECT * FROM assets WHERE asset_tag = '".$tag."'";
			$checkDup=mysql_query($sqlDup,$con);
			if (mysql_num_rows($checkDup) <> 0
			{
				header('Location: index.php?form=asset&error=1');
			}else
			{
			
				if ($assettype	== '1')
				{	
					$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
					$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
					$opsys = mysql_real_escape_string($_POST['opsys']);
					$oskey = mysql_real_escape_string($_POST['oskey']);
					$office = mysql_real_escape_string($_POST['office']);
					$officeKey = mysql_real_escape_string($_POST['officeKey']);
					$company = mysql_real_escape_string($_POST['company']);
					$subnet_id = mysql_real_escape_string($_POST['subnets']);
					$lastOctet = mysql_real_escape_string($_POST['lastOctet']);
					$userid = mysql_real_escape_string($_POST['userid']);
					$date = date("d-m-Y");
					
					$sql = "INSERT IGNORE INTO assets (asset_type_id, wired_mac_address, wireless_mac_address, asset_tag, operating_system_id, os_key,
												office_version_id, office_key, ip_prefix_id, ip_suffix, company_id)
							VALUES ('" .$assettype. "','" .$wired. "','" .$wireless. "', '" .$tag. "','" .$opsys. "','" .$oskey. "',
									'" .$office. "','" .$officeKey. "','" .$subnet_id. "','" .$lastOctet. "', '".$company. "')";
					
					if(mysql_query($sql,$con))
					{
						$sql = $sql = "INSERT INTO tracking (user_id,start_date,asset_id) VALUES 
									   ('" .$userid. "','" .$date. "',(SELECT asset_id FROM assets WHERE asset_tag = '" .$tag. "'))";
						if(mysql_query($sql,$con))
						{
							$sql = "UPDATE  ip_suffixes SET active = '0', asset_id = 
									(SELECT asset_id FROM assets WHERE asset_tag = '" .$tag. "') 
									where ip_suffix = '" .$lastOctet. "'";
							
							if(mysql_query($sql,$con))
							{
								echo $sql;
								$sql = "UPDATE  assets SET ip_prefix_id = (SELECT ip_prefix_id FROM ip_prefixes WHERE ip_prefix = '".$subnet."') 
										WHERE asset_id = '".$tag."'";
								if(mysql_query($sql,$con))
								{
									header('Location: index.php?form=asset');
								}
							}
						}
					}else
					{
						die('Could not insert data. ' . mysql_error());
					}
				}else if ($assettype == '2' || $assettype == '3' || $assettype == '10')
				{
					$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
					$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
					$company = mysql_real_escape_string($_POST['company']);
					$subnet_id = mysql_real_escape_string($_POST['subnets']);
					$lastOctet = mysql_real_escape_string($_POST['lastOctet']);
					
					$sql = "INSERT IGNORE INTO assets (asset_type_id, wired_mac_address, wireless_mac_address, asset_tag,  ip_prefix_id, ip_suffix)
							VALUES ('" .$assettype. "','" .$wired. "','" .$wireless. "', '" .$tag. "','" .$subnet_id. "','" .$lastOctet. "')";
					
					
					if(mysql_query($sql,$con))
					{
						 $sql = "UPDATE  ip_suffixes SET active = '0', asset_id = 
									(SELECT asset_id FROM assets WHERE asset_tag = '" .$tag. "') 
									where ip_suffix = '" .$lastOctet. "'";
							
							if(mysql_query($sql,$con))
							{
								
								
								
								header('Location: index.php?form=asset');
							}
					}


				}else if ($assettype == '4')
				{
					$phonePrefix = mysql_real_escape_string($_POST['phonePrefix']);
					$extension = mysql_real_escape_string($_POST['extension']);
					$lotNumber = mysql_real_escape_string($_POST['lotNumber']);
					$sql = "INSERT IGNORE INTO assets (asset_type_id, asset_tag)
								VALUES ('" .$assettype. "', '" .$tag. "')";
					
					if(mysql_query($sql,$con))
					{
						$sql = "INSERT INTO phones (prefix_id, type, extension, serial_num,asset_id) VALUES ('".$phonePrefix."','1','".$extension."','".$lotNumber."',(SELECT asset_id
								FROM assets WHERE asset_tag = '" .$tag. "'))";
						
						if(mysql_query($sql,$con))
						{
							header('Location: index.php?form=asset');
						}else
						{
							die('Could not insert data. ' . mysql_error());
						}
						
					}

				}else if ($assettype == '5')
				{
					$phonePrefix = mysql_real_escape_string($_POST['phonePrefix']);
					$extension = mysql_real_escape_string($_POST['extension']);
					$lotNumber = mysql_real_escape_string($_POST['lotNumber']);
					$subnet_id = mysql_real_escape_string($_POST['subnets']);
					$lastOctet = mysql_real_escape_string($_POST['lastOctet']);
					$sql = "INSERT IGNORE INTO assets (asset_type_id, asset_tag,ip_prefix_id, ip_suffix)
								VALUES ('" .$assettype. "', '" .$tag. "','".$subnet_id."','".$lastOctet."')";
					
					if(mysql_query($sql,$con))
					{
						$sql = "INSERT INTO phones (prefix_id, type, extension, serial_num,asset_id) VALUES ('".$phonePrefix."','2','".$extension."','".$lotNumber."',(SELECT asset_id
								FROM assets WHERE asset_tag = '" .$tag. "'))";
						
						if(mysql_query($sql,$con))
						{
							$sql = "UPDATE  ip_suffixes SET active = '0', asset_id = 
									(SELECT asset_id FROM assets WHERE asset_tag = '" .$tag. "') 
									where ip_suffix = '" .$lastOctet. "'";
							
							if(mysql_query($sql,$con))
							{
								header('Location: index.php?form=asset');
							}
						}
						
					}else
					{
						die('Could not insert data. ' . mysql_error());
					}

				}else if ($assettype == '8')
				{
					$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
					$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
					$userid = mysql_real_escape_string($_POST['userid']);
					$date = date("d-m-Y");
					$sql = "INSERT IGNORE INTO assets (asset_type_id, wired_mac_address, wireless_mac_address, asset_tag, company_id)
							VALUES ('" .$assettype. "','" .$wired. "','" .$wireless. "', '" .$tag. "','".$company. "')";
					if(mysql_query($sql,$con))
					{
						$sql = "INSERT INTO tracking (user_id,start_date,asset_id) VALUES ('" .$userid. "','" .$date. "',(SELECT asset_id FROM assets WHERE asset_tag = '" .$tag. "'))";
						 if(mysql_query($sql,$con))
						{
							header('Location: index.php?form=asset');
						}
						
					}


				}else if ($assettype == '12')
				{
					$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
					$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
					$opsys = mysql_real_escape_string($_POST['opsys']);
					$oskey = mysql_real_escape_string($_POST['oskey']);
					$office = mysql_real_escape_string($_POST['office']);
					$officeKey = mysql_real_escape_string($_POST['officeKey']);
					$company = mysql_real_escape_string($_POST['company']);
					$userid = mysql_real_escape_string($_POST['userid']);
					$date = date("d-m-Y");
					
					
					$sql = "INSERT IGNORE INTO assets (asset_type_id, wired_mac_address, wireless_mac_address, asset_tag, operating_system_id, os_key,
							office_version_id, office_key, company_id)
							VALUES ('" .$assettype. "','" .$wired. "','" .$wireless. "', '" .$tag. "',
							'" .$opsys. "','" .$oskey. "','" .$office. "','" .$officeKey. "','".$company. "')";
					
					
					if(mysql_query($sql,$con))
					{
						$sql = "INSERT INTO tracking (user_id,start_date,asset_id) VALUES ('" .$userid. "','" .$date. "',(SELECT asset_id FROM assets WHERE asset_tag = '" .$tag. "'))";
						 
						 if(mysql_query($sql,$con))
						{
							header('Location: index.php?form=asset');
						}
					}else
					{
						die('Could not insert data. ' . mysql_error());
					}

				}else if ($assettype == '13')
				{
					$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
					$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
					$opsys = mysql_real_escape_string($_POST['opsys']);
					$oskey = mysql_real_escape_string($_POST['oskey']);
					$office = mysql_real_escape_string($_POST['office']);
					$officeKey = mysql_real_escape_string($_POST['officeKey']);
					$subnet_id = mysql_real_escape_string($_POST['subnets']);
					$lastOctet = mysql_real_escape_string($_POST['lastOctet']);
					
					$sql = "INSERT IGNORE INTO assets (asset_type_id, wired_mac_address, wireless_mac_address, asset_tag, operating_system_id, os_key,
												office_version_id, office_key, ip_prefix_id, ip_suffix)
							VALUES ('" .$assettype. "','" .$wired. "','" .$wireless. "', '" .$tag. "','" .$opsys. "','" .$oskey. "',
									'" .$office. "','" .$officeKey. "','" .$subnet_id. "','" .$lastOctet. "')";
					
					if(mysql_query($sql,$con))
					{
						
						
						$sql = "UPDATE  ip_suffixes SET active = '0', asset_id = 
									(SELECT asset_id FROM assets WHERE asset_tag = '" .$tag. "') 
									where ip_suffix = '" .$lastOctet. "'";
						
						if(mysql_query($sql,$con))
						{
							
							header('Location: index.php?form=asset');
						}
					}else
					{
						die('Could not insert data. ' . mysql_error());
					}

				}else
				{
					header('Location: index.php?form=asset&error=1');
				}
			}
		}*/
?>