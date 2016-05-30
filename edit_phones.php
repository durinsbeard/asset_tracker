<?php
	include("includes/connect.php");
?>
<script>
 function returnInfo(str) {
   if (str=="") {
     document.getElementById("phoneData").innerHTML="";
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
       document.getElementById("phoneData").innerHTML=xmlhttp.responseText;
     }
   }
   xmlhttp.open("GET","phoneData.php?asset=" + str + "&rnd=" + Math.random(),true);
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
 </script>
 <table id="contentTable">
		<tr>
			<td>
				Asset Tag:
			</td>
			<td>
				<select name="extension" onchange="returnInfo(this.value)" >
					<option>select extension</option>

				<?php
					$sql = "SELECT asset_types.asset_type, asset_types.asset_type_id, assets.asset_tag, assets.asset_id
					FROM asset_types
					LEFT OUTER JOIN assets ON asset_types.asset_type_id = assets.asset_type_id
					WHERE asset_types.asset_type_id =4
					OR asset_types.asset_type_id =5
					ORDER BY asset_types.asset_type,assets.asset_tag";
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
									<optgroup style='font-size:large; font-weight:Bold; color:#0B2161;' label='<?echo $row['asset_type']?>' color="#1C1C1C;">
								<?
							}
						$firstTime = false;
						?>
							<option value='<?echo $row['asset_id']?>' name='phone_type' style='font-weight:normal; color:#A4A4A4;'><?echo $row['asset_tag']?></option>
						<?
						$lastOptGrp = $row['asset_type'];
					}
					?>
				</optgroup>
				</select>
			</td>
		</tr>
		
 </table>
		<div id="phoneData"></div>