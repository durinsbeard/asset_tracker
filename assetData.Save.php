<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?$asset = ($_GET['asset']);
$assetTag = ($_GET['asset_tag']);
include('includes/connect.php');
$sql2 = "SELECT * FROM asset_types
		 WHERE asset_type_id = (SELECT asset_type_id FROM assets WHERE asset_id = '".$asset."')";
$query2 = mysql_query($sql2,$con);
$row2=mysql_fetch_array($query2);
?>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<link href="css/jquery-ui.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />
		<script src="JS/jquery.min.js" type="text/javascript"></script>
		<script src="JS/jquery.caret.js" type="text/javascript"></script>
		<script src="JS/jquery.ipaddress.js" type="text/javascript"></script>
		<script src="JS/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
		<script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
		<script src="JS/jquery.maskedinput.js" type="text/javascript"></script>
		<script src="JS/pxgradient-1.0.3.js" type="text/javascript"></script> 
<script>
$(function(){
	$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "images/Calendar-icon.png",
		buttonImageOnly:true,
		buttonText: "Select a date",
		showWeek: true,
		showOtherMonths: true,
		selectOtherMonths:false,
		dateFormat: "yy-mm-dd"
	});
	$(document).tooltip();
	$('#ip').ipaddress({cidr:true});
});




jQuery(function($){
	$("#ip").mask("999.999.999");
	$("#wirelessMacAddress").mask("**:**:**:**:**:**");
	$("#wiredMacAddress").mask("**:**:**:**:**:**");
});
			
function validate(val)
{	
	var form = val;
	if (form == "deactivate_asset"){
		var disp = document.getElementById("disposition").value;
		if (disp=="NULL"){
			alert("You must select disposition before submitting.");
			return false;
		}else{
			if(confirm("Are you sure you want to deactivate <?echo $assetTag?>?")){
				return true;
			}else{
				return false;
			}
		}			
	}else if (form == "reasign_ip"){
		var subnet = document.getElementById("subnets").value;
		var lastOctet = document.getElementById("lastOctet").value;
		if (subnet=="NULL" || lastOctet=="NULL"){
		
			alert("You must select all octets before submitting.");
			return false;
		}else{
			if(confirm("Are you sure you want to assign this ip address to <?echo $assetTag?>?")){
				return true;
			}else{
				return false;
			}
		}			
	}else if (form == "manage_images"){
		var imageFile = document.getElementById("imageFile").value;
		if (imageFile==""){
			alert("You must select an image file before submitting.");
			return false;
		}else{
			if(confirm("Are you sure you want upload this image of <?echo $assetTag?>?")){
				return true;
			}else{
				return false;
			}
		}		
	}else if (form == "edit_asset"){
		if(confirm("Are you sure you want to edit <?echo $assetTag?>?")){
			return true;
		}else{
			return false;
		}
					
	}
}

</script>
</head>
<body>
<div class="tabs">
    
   <div class="tab">
       <input type="radio" id="tab-1" name="tab-group-1" checked>
       <label for="tab-1">Tab One</label>
       
      <div class="content">
          werwerwerwerw
       </div> 
   </div>
    
   <div class="tab">
       <input type="radio" id="tab-2" name="tab-group-1">
       <label for="tab-2">Tab Two</label>
       
       <div class="content">
           stuff
       </div> 
   </div>
    
    <div class="tab">
       <input type="radio" id="tab-3" name="tab-group-1">
       <label for="tab-3">Tab Three</label>
     
       <div class="content">
           stuff
       </div> 
   </div>
    
</div>
