<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<script src="JS/jquery.min.js" type="text/javascript"></script>
<script src="JS/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$(":input").inputmask();
	});
</script>
<?
include("connect.php");
$form = mysql_real_escape_string($_GET['form']);
if($form == "linkedAssetForm")
{		
	
	$sql = "SELECT * FROM assets where asset_id = '" .$asset_id. "'";
	        
	$query = mysql_query($sql,$con);
	$row=mysql_fetch_array($query);
	
	
	echo $row['wired_mac_address'];
	
	
	
}else if (!empty($asset))
{
	$sqlWiredMAC = "SELECT * FROM assets where asset_id = '" .$asset. "'";
	        
	$queryWiredMAC = mysql_query($sqlWiredMAC,$con);
	while($rowWiredMAC=mysql_fetch_array($queryWiredMAC))
	{
	?>
		<input type='text' name='wiredMacAddress' id='wiredMacAddress' size='27' value='<?php echo $rowWiredMAC['wired_mac_address']; ?>'/>
		
		
	<?
	}

}else
{
	?>
		<input type='text' name='wiredMacAddress' id='wiredMacAddress' size='27'/>
		
	<?
}
?>
</html>