<?

$assettype = mysql_real_escape_string($_POST['assettype']);


if ($_POST['form']=="editphones")
{
		
			echo $assettype;
		
			
			/*$phonePrefix = mysql_real_escape_string($_POST['phonePrefix']);
			$extension = mysql_real_escape_string($_POST['extension']);
			$lotNumber = mysql_real_escape_string($_POST['lotNumber']);
			$sql = "UPDATE phones SET prefix_id = '".$phonePrefix."', extension = '".$extension."', serial_num = '".$lotNumber."'
					WHERE asset_id  = '" .$assetid. "'))";
				
				if(mysql_query($sql,$con))
				{
					header('Location: index.php?form=asset');
				}else
				{
					die('Could not insert data. ' . mysql_error());
				}
				
		}else if ($assettype == '5')
		{
			$phonePrefix = mysql_real_escape_string($_POST['phonePrefix']);
			$extension = mysql_real_escape_string($_POST['extension']);
			$lotNumber = mysql_real_escape_string($_POST['lotNumber']);
			$subnet_id = mysql_real_escape_string($_POST['subnets']);
			$lastOctet = mysql_real_escape_string($_POST['lastOctet']);
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
		}*/
}
?>