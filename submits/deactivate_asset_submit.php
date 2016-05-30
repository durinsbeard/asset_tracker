<?
include('../includes/connect.php');
if (isset($_POST['disposition']))
{
	$asset = mysql_real_escape_string($_POST['assetid']);
	$date = mysql_real_escape_string($_POST['removed']);
	$disposition_id = mysql_real_escape_string($_POST['disposition']);
	
	$sql = "UPDATE assets SET active = 0, disposition_id = '" .$disposition_id. "' WHERE asset_id = '" .$asset. "'";
	if(mysql_query($sql,$con))
	{
		$sql = "UPDATE tracking SET end_date = '" .$date. "', disp =  '" .$disposition_id. "' WHERE asset_id  = '" .$asset. "'";
		mysql_query($sql,$con);
		header("location: assetData.php");
	}else
	{
		die('Could not insert data. ' . mysql_error());
	}
}

	
	?>	