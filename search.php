<?php
	include("includes/connect.php");
?>
<script src="JS/jquery.min.js" type="text/javascript"></script>
<script src="JS/jquery.caret.js" type="text/javascript"></script>
<script src="JS/jquery.ipaddress.js" type="text/javascript"></script>
<script src="JS/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
<script src="JS/jquery.maskedinput.js" type="text/javascript"></script>
<script>
 $(document).ready(function() {
	$('#sub_button').css("display","none");
		
 });
	
 function returnInfo(str) {
   if (str=="") {
     document.getElementById("assetInfo").innerHTML="";
     return;
   } 
   if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp=new XMLHttpRequest();
   } else { // code for IE6, IE5
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange=function() {
     if (xmlhttp.readyState==4 && xmlhttp.status==200) {
       document.getElementById("assetInfo").innerHTML=xmlhttp.responseText;
     }
   }
   xmlhttp.open("GET","assetInformation.php?asset_id="+str,true);
   xmlhttp.send();
   }
 
 function showHideIp() 
 {
	var checkBox = document.getElementById("showIP")
	if (checkBox.checked)
	{
		document.getElementById("assignIP").style.display="block";
	}else
	{
		document.getElementById("assignIP").style.display="none";
		document.getElementById("subnets").selectedIndex = 0;
		document.getElementById("lastOctet").selectedIndex = 0;
	}
 }
 </script>
 <fieldset>
 <legend>Search</legend>
 <table id="contentTable">
		<tr>
			<td>
				Search By Asset Tag:
			</td>
			<td>
				<input id="asset_id" name="asset_id" type='text'>
			</td>
			<td></td>
			<td>
				Search By User:
			</td>
			<td>
				 <input id="user_id" name="user_id" type='text'>
			</td>
		</tr>
 </table>
 </fieldset>
 <div id="assetInfo"></div>
 <div id="submitbutton">
 <td colspan="2" align="center">
	<input id="search" type="submit" value="Search" class="wide" onclick="returnInfo"/>
 </td>
 </div>
	
	