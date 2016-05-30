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
	
 function returnInfo() {
 
	var user = document.getElementById("endUser").value;
	if (user=="") {
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
   xmlhttp.open("GET","searchByUser.php?endUser="+user+ "&rnd=" + Math.random(),true);;
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
 <table id="contentTable">
		<tr>
			<td>
				Enter User:
			</td>
			<td>
				 <input type='text' id="endUser" name="endUser" >
			</td>
			<td>
				<input type='button' id="search"  value="Search" onclick="returnInfo()">
			</td>
				
		</tr>
 </table>

<div id="assetInfo"></div>
 
	
	