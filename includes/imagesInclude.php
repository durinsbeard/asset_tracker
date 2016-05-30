<?php
include('connect.php');
$id = ($_GET['asset_id']);
	
	
	$sql = "SELECT location from asset_images WHERE asset_id = '" .$id. "'";
	$query = mysql_query($sql,$con);
	while($row=mysql_fetch_array($query))
	{
	?>
		<img name="asset_image" id="asset_image" src="<?echo $row['location']?>">
	<?
	}

?>