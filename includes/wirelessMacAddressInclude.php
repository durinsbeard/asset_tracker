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
				$('#<%ip%>').mask("999.999.999");
				$("#wirelessMacAddress").mask("**:**:**:**:**:**");
				$("#wiredMacAddress").mask("**:**:**:**:**:**");
			});
</script>
<?
include("includes/connect.php");
$form = mysql_real_escape_string($_GET['form']);

if($form == "linkedAssetForm")
{	
	
	$sql = "SELECT * FROM assets where asset_id = '" .$asset_id. "'";
	       
	$query = mysql_query($sql,$con);
	$row=mysql_fetch_array($query);
	echo $row['wireless_mac_address'];
	
}else if (!empty($asset))
{
	$sqlWirelessMAC = "SELECT * FROM assets where asset_id = '" .$asset. "'";
	        
	$queryWirelessMAC = mysql_query($sqlWirelessMAC,$con);
	while($rowWirelessMAC=mysql_fetch_array($queryWirelessMAC))
	{
	?>
		<input type="text" name="wirelessMacAddress" id="wirelessMacAddress" size="27" value="<?php echo $rowWirelessMAC['wireless_mac_address']; ?>"/>
	<?
	}

}else
{
	?><input type="text" name="wirelessMacAddress" id="wirelessMacAddress" size="27" /><?
}
?>
</html>