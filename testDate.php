<?php
	include("includes/connect.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
	<head>
		<title>
			Asset Tracking
		</title>
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />
		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="jquery.caret.js" type="text/javascript"></script>
		<script src="jquery.ipaddress.js" type="text/javascript"></script>
		<script src="jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
		<script src="jquery.tablesorter.min.js" type="text/javascript"></script>
		<style>
			label {
				display: inline-block;
				width: 5em;
			}
			fieldset div {
				margin-bottom: 2em;
			}    
			fieldset .help {k
				display: inline-block;
			}    
			.ui-tooltip {
				max-width:210px;
			}
		</style>
		<script>
			$(function(){
				$( "#datepicker" ).datepicker({
					showOn: "button",
					buttonImage: "images/calendar.gif",
					buttonImageOnly:true,
					buttonText: "Select a date",
					showWeek: true,
					showOtherMonths: true,
					selectOtherMonths:false,
					dateFormat: "yy-mm-dd"
				});
				$( document ).tooltip();
				$('#ip').ipaddress({cidr:true});
			});
			function copyToClipboard (asset_tag, wiredMac, wirelessMac, os, oskey, office, officekey) {
				prompt("Clipboard:", "Asset Tag: " + asset_tag + "     Wired Mac: " + wiredMac + "     Wireless Mac: " + wirelessMac + "	Operating System:" + os + "	OS Key:" + oskey + "	Office:" + office + "	Office Key:" + officekey);
			}
			function hide(id) {
				var hide = document.getElementById(id);
				
				if(hide.style.display == "none")
				{
					hide.style.display = "block";
				} else
				{
					hide.style.display = "none";
				}
			}
		</script> 

<script>
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		$('#ipadds').val(<?php echo $row['ip_address_id']; ?>);
		$('#operatingsystem').val(<?php echo "'{$row['operating_system_id']}'"; ?>);
		$('#office').val(<?php echo "'{$row['office_version']}'"; ?>);
		$('#myTable').tablesorter();
		});
</script>

</form>
<form  method='post'>
	<table>
	
	<td>
		Date Reassigned:
	</td>
	<td>
		<input type="text" name="form" value="date" style="display:none;" />
		<input type="text" name="date" id="date" />
		<script>
		$( "#date" ).datepicker({
			showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly:true,
			buttonText: "Select a date",
			showWeek: true,
			showOtherMonths: true,
			selectOtherMonths:false,
			dateFormat: "yy-mm-dd"
		});
		</script>
		<?php
		$date = trim(mysql_real_escape_string($_POST['date']));
		if (isset($_POST['date'])){ 
			if(is_string($date)){
				echo "Date is a string";
			}else{
				echo "Date is not a string";
			}
		}
		
		
		
		
		?>
	</td>
</tr>
		
		<tr>
			<td align="center" colspan='2'>
				<input style="display:none;" name="asset" type="text" value="<?php echo $id; ?>" />
				<input type="submit" value="Save Changes" />
			</td>
		</tr>
	
	</table>
</form>