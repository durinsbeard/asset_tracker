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
		//$('#myTable').tablesorter();
	});
	
	jQuery(function($){
		$("#ip").mask("999.999.999");
		$("#wirelessMacAddress").mask("**:**:**:**:**:**");
		$("#wiredMacAddress").mask("**:**:**:**:**:**");
	});
	
  function returnInfo(str) {
	window.open("assetData.php?asset="+str,"Ratting","width=800,height=500,0,status=0,scrollbars=1");
	//alert("hello");
	
	
	/*$('#sub_button').css("display","block");
   if (str=="") {
     document.getElementById("assetData").innerHTML="";
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
	
       document.getElementById("assetData").innerHTML=xmlhttp.responseText;
     }
   }
   xmlhttp.open("GET","assetData.php?asset=" + str + "&rnd=" + Math.random(),true);
   xmlhttp.send();*/
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
 <?
 $value = "";
 if(isset($_GET['error']))
	{
		$value = "<div style='color:black; font-size:20px; margin:0 auto; width:350px; height:30px;'>Successfully updated asset.</div>";
	}
	echo $value;
 ?>
 <table id="contentTable">
		<tr>
			<td>
				Asset Tag:
			</td>
			<td>
				<select name="assetid" onchange="returnInfo(this.value)" >
					<option>select asset tag</option>

			<?
			$sql = "SELECT asset_types.asset_type, asset_types.asset_type_id, assets.asset_tag, assets.asset_id
					FROM asset_types
					LEFT OUTER JOIN assets ON asset_types.asset_type_id = assets.asset_type_id
					WHERE asset_types.asset_type_id !=4
					AND asset_types.asset_type_id !=5
					ORDER BY asset_types.asset_type";
			$query = mysql_query($sql,$con);
			$firstTime = true;
			
			while($row=mysql_fetch_array($query))
			{
				if($lastOptGrp != $row['asset_type'])
					{
						if(!$firstTime)
						{
							?>
								</optgroup>
							<?
						}
						?>
							<optgroup style="font-size:large; font-weight:Bold; color:#0B2161;" label="<?echo $row['asset_type']?>">
						<?
					}
				$firstTime = false;
				?>
					<option style="font-weight:normal; color:#A4A4A4;"value="<?echo $row['asset_id']?>" color="#6E6E6E"><?echo $row['asset_tag']?></option>

				<?
				$lastOptGrp = $row['asset_type'];
	}
	?>
	</optgroup>
	</select>
	</td>
		</tr>
</table>

<div id="assetData"></div>
	