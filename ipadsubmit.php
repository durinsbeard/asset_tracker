<?
	include('includes/connect.php');
	
	
	
if ($assettype == '8')
{	
	$wired = mysql_real_escape_string($_POST['wiredMacAddress']);
	$wireless = mysql_real_escape_string($_POST['wirelessMacAddress']);
	$userid = mysql_real_escape_string($_POST['userid']);
	$date = date('d-m-Y');
	$sql = "UPDATE assets SET wired_mac_address = '".$wired."',wireless_mac_address = '".$wireless."'
			WHERE asset_id = '" .$assetid. "'";
		
	if(mysql_query($sql,$con))
	{
		
		
		$sql = "UPDATE tracking SET user_id ='".$userid."',start_date = '".$date."' 
				WHERE asset_id ='".$assetid."'";
			
		if(mysql_query($sql,$con))
		{
		
		header('Location: index.php?form=editasset');
		}
		
	}else
	{
		die('Could not insert data. ' . mysql_error());
	}
}
?>