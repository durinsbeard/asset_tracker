
<?php
	session_start();
	include('includes/connect.php');
	$user = mysql_real_escape_string($_GET['user']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
	<head>
		<title>
			Asset Tracking
		</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<link href="css/jquery-ui.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />
		<script src="JS/jquery.min.js" type="text/javascript"></script>
		<script src="JS/jquery.caret.js" type="text/javascript"></script>
		<script src="JS/jquery.ipaddress.js" type="text/javascript"></script>
		<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
		<script src="JS/jquery.maskedinput.js" type="text/javascript"></script>
		<script src="JS/pxgradient-1.0.3.js" type="text/javascript"></script> 
		<script>
		$(document).ready(function() { 
			$("#reportTable").tablesorter(); 
		}); 
    
		
		function stopRKey(evt)
		{ 
		  var evt = (evt) ? evt : ((event) ? event : null); 
		  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
		  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
		} 
		document.onkeypress = stopRKey; 
		
		function validate(form){
			alert(form);
			/*if (form == "aps"){
				var tag = document.getElementById("tag").value;
				var subnets = document.getElementById("subnets").value;
				var lastOctet = document.getElementById("lastOctet").value;
				if (tag==""){
					alert("You must enter an asset tag.");
					return false;
				}else if (subnets=="NULL"){
					alert("You must select a full IP address.");
					return false;
					
				}else if (lastOctet=="NULL"){
					alert("You must select a full IP address.");
					return false;
				}else{
					if(confirm("Are you sure that you want to submit?")){
						return true;
					}
					else{
						return false;
					}
				}
			}else{
				if (tag==""){
					alert("You must enter an asset tag.");
					return false;
				}else{
					if(confirm("Are you sure that you want to submit?")){
						return true;
					}
					else{
						return false;
					}
				}
			}*/	
		}
		
	
		
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
			
			$("#submitbutton").click( function() {
				$.post( $("#myForm").attr("action"),
				$("#myForm :input").serializeArray(),
				function(info){ $("#result").html(info);
			});
			clearInput();
			});
			$("#myForm").submit( function() {
				return false;
			});
			function clearInput()
			{
				$("#myForm :input").each( function() {
				$(this).val('');
				});
			}

			
			/*function copyToClipboard (asset_tag, wiredMac, wirelessMac, os, oskey, office, officekey)
			{
				prompt("Clipboard:", "Asset Tag: " + asset_tag + "     Wired Mac: " + wiredMac + "     Wireless Mac: " + wirelessMac + "	Operating System:" + os + "	OS Key:" + oskey + "	Office:" + office + "	Office Key:" + officekey);
			}*/
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
			function changeHeader(header)
			{
				document.getElementById("Header").innerHTML = header;
			}
		</script> 
	</head>
	<body>
		<div id="Container">
			<div id="Header">
			<h2 ></h2>
			</div>
			
			<div id="LeftNav">
			<?php
			if(isset($_SESSION['logged_in']))
			{
				?><h2>ASSET TRACKER</h2><?
				include("navigation.php");
				
				
			}
			?>
			</div>
			<div id="Content">
				<?
				if(!isset($_GET['form']))
				{
					$form = "";
					?><form action="login_check.php" method="post"><?
					
				}else
				{
					$form = mysql_real_escape_string($_GET['form']);
					?><form method="post" enctype="multipart/form-data"><?
				}
				
				?>
						
					<table>
						<tr>
							<?php
								if ($form == "SearchByUser")
								{
									include('searchByUserForm.php');
									?><script>changeHeader("Search By User")</script><?
								}else if ($form == "SearchByMAC")
								{
									include('searchByMACForm.php');
									?><script>changeHeader("Search By MAC Address")</script><?
								}else if ($form == "reassignip")
								{
									include('reassignIP.php');
									?><script>changeHeader("Reassign IP Address")</script><?
								}else if ($form == "asset")
								{
									include('new_asset.php');
									?><script>changeHeader("New Asset")</script><?
								}else if ($form == "atype")
								{
									include('newAssetForm.php');
									?><script>changeHeader("New Asset Type")</script><?
								}else if ($form == "ipadds")
								{
									include('ipaddsForm.php');
								}else if ($form == "user")
								{
									include('userForm.php');
									?><script>changeHeader("New User")</script><?
								
								}else if ($form == "alphabeticalTabs")
								{
									include('alphabeticalTabs.php');
									?><script>changeHeader("Choose users first initial")</script><?
								}else if($form == "asset_summary")
								{
									include('asset_summary.php');
									?><script>changeHeader("Asset Summary")</script><?
								}else if($form == "list_assets")
								{
									include('list_assets.php');
									?><script>changeHeader("List Assets")</script><?
								}else if($form == "images")
								{
									include('newPictureForm.php');
								}else if ($form == "checkout")
								{
									include('checkout.php');
								}else if ($form == "checkin")
								{
									include('checkin.php');
								}else if ($form == "company")
								{
									include('newCompanyForm.php');
								}else if ($form == "editphones")
								{
									include('edit_phones.php');
									?><script>changeHeader("Edit Phones")</script><?
								
								}else if ($form == "showpictures")
								{
									include('show_pictures.php');
								}else if ($form == "deactivate_asset")
								{
									include('deactivate_asset.php');
									?><script>changeHeader("Deactivate Asset")</script><?
								
								}else if($form == "deactivate_user")
								{
									include('deactivate_user.php');
									?><script>changeHeader("Deactivate User")</script><?
								
								}else if ($form == "print_list")
								{
									include('print_list.php');
								
								}else if ($form == "reassign_asset")
								{
									include('reassign_asset.php');
									?><script>changeHeader("Reassign Asset")</script><?
								}else if ($form == "editasset")
								{
									include('edit_asset_details.php');
									?><script>changeHeader("Edit Asset")</script><?
								
								}else if ($form == 'asset_history')
								{
									include('asset_history_form.php');
								
								}else if ($form == 'linkedAssetForm')
								{
									include('linkedAssetForm.php');
									?><script>changeHeader("Asset Information")</script><?
								}else if ($form == 'asset_image')
								{
									include('newPictureForm.php');
									?><script>changeHeader("Upload Asset Image")</script><?
								}else if ($form == 'upload_documentation')
								{
									include('documentation_form.php');
									?><script>changeHeader("Upload IT Documentation")</script><?
								}else if ($form == 'display_documentation')
								{
									include('displayDocumentation.php');
									?><script>changeHeader("IT Documentation")</script><?
								}else if ($form == 'list_assets_by_type')
								{
									include('list_assets_by_type.php');
									?><script>changeHeader("List by Type")</script><?
								}else if ($form == 'landingPage')
								{
									include('landingPage.php');
									?><script>changeHeader("Information Technology Asset Management")</script><?
									//echo $_SESSION['logged_in'];
								}else if ($form == 'assetData')
								{
									include('assetData.php');
									?><script>changeHeader("Edit Information")</script><?
								}else if ($form == 'uploadImage')
								{
									include('uploadImage.php');
									?><script>changeHeader("Upload Image")</script><?
								}else if ($form == 'deactivate_asset')
								{
									include('deactivage_asset.php');
									?><script>changeHeader("Deactivate")</script><?
								}else if ($form == 'reassignIP')
								{
									include('reassignIP.php');
									?><script>changeHeader("Reassign IP")</script><?
								}else
								{
									//include('assetForm.php');
									include("login.php");
									?><script>changeHeader("Information Technology Asset Management")</script><?
								
								} 
								?>
						</tr>
						<tr>
							<span id="result" ></span>
							<!--<div id="submitbutton">
								<td colspan="2" align="center">
									<input id="sub_button" type="submit" value="submit" class="wide" onclick="return validate()" />
								</td>
							</div>-->
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
	