<?php
	include('../includes/connect.php');

	$assettype = mysql_real_escape_string($_POST['assettype']);
	$assetid = mysql_real_escape_string($_POST['assetid']);
	

	if ($assettype	== '1')
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
			
				
			
				$sql = "UPDATE assets SET wired_mac_address = '".$wired."',wireless_mac_address = '".$wireless."',
						operating_system_id = '".$opsys."', os_key = '".$oskey."',office_version_id = '".$office."',
						office_key = '".$officeKey."', company_id = '".$company."'
						WHERE asset_id = '" .$assetid. "'";
				if(mysql_query($sql,$con))
				{
					$sql = "UPDATE tracking SET user_id = '" .$userid. "',start_date = '" .$date. "'
							WHERE asset_id = '" .$assetid. "'";
					if(mysql_query($sql,$con))
					{
						header('Location: assetData.php');
					}
				}else
				{
					die('Could not insert data. ' . mysql_error());
				}
				
	}else if ($assettype == '2' || $assettype == '3' || $assettype == '10')
	{
				$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
				$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
				$sql = "UPDATE assets SET wired_mac_address = '".$wired."',wireless_mac_address = '".$wireless."'
						WHERE asset_id = '" .$assetid. "'";
				
				if(mysql_query($sql,$con))
				{
				
					header('Location: assetData.php');
				}else
				{
					die('Could not insert data. ' . mysql_error());
				}
	}else if ($assettype == '8')
	{
				$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
				$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
				$userid = mysql_real_escape_string($_POST['userid']);
				$company = mysql_real_escape_string($_POST['company']);
				$date = date("d-m-Y");
				$sql = "UPDATE assets SET wired_mac_address = '".$wired."',
						wireless_mac_address = '".$wireless."',company_id = '".$company."'
						WHERE asset_id = '" .$assetid. "'";
				
				if(mysql_query($sql,$con))
				{
					if (!empty($userid))
					{
						$sql = "UPDATE tracking SET user_id = '" .$userid. "',start_date = '" .$date. "'
								WHERE asset_id = '" .$assetid. "'";
						echo $sql;
						if (mysql_query($sql,$con))
						{
							
							header('Location: assetData.php');
						}else
						{
							die('Could not insert data. ' . mysql_error());
						}
										
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
				$sql = "UPDATE assets SET wired_mac_address = '".$wired."',wireless_mac_address = '".$wireless."',
						operating_system_id = '".$opsys."', os_key = '".$osKey."',office_version_id = '".$office."',
						office_key = '".$officeKey."',company_id = '".$company."'
						WHERE asset_id = '" .$assetid. "'";
				if(mysql_query($sql,$con))
				{
					$sql = "UPDATE tracking SET user_id = '" .$userid. "',start_date = '" .$date. "'
							WHERE asset_id = '" .$assetid. "'";
					if(mysql_query($sql,$con))
					{
						header('Location: assetData.php');
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
				$sql = "UPDATE assets SET wired_mac_address = '".$wired."',wireless_mac_address = '".$wireless."',
						operating_system_id = '".$opsys."', os_key = '".$oskey."',office_version_id = '".$office."',
						office_key = '".$officeKey."',company_id = '".$company."'
						WHERE asset_id = '" .$assetid. "'";
				echo $sql;
				if(mysql_query($sql,$con))
				{
					header('Location: assetData.php');
				}
				else
				{
					die('Could not insert data. ' . mysql_error());
				}
	}else if ($assettype == '4' || $assettype == '3')
	{
			$phonePrefix = mysql_real_escape_string($_POST['phonePrefix']);
			$extension = mysql_real_escape_string($_POST['extension']);
			$lotNumber = mysql_real_escape_string($_POST['lotNumber']);
			$sql = "UPDATE phones SET prefix_id = '".$phonePrefix."', extension = '".$extension."', serial_num = '".$lotNumber."'
					WHERE asset_id  = '" .$assetid. "'";
			if(mysql_query($sql,$con))
			{
				header('Location: assetData.php');
			}else
			{
				die('Could not insert data. ' . mysql_error());
			}
	
	}
?>