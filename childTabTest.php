<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
<link href="css/jquery-ui.css" rel="stylesheet">
<!--<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />-->
<!--<link type="text/css" rel="stylesheet" href="css/style.css" />-->
<link href="css/jquery-ui.css" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />-->
<script src="JS/jquery.min.js" type="text/javascript"></script>
<script src="JS/jquery.caret.js" type="text/javascript"></script>
<script src="JS/jquery.ipaddress.js" type="text/javascript"></script>
<script src="JS/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
<script src="JS/jquery.maskedinput.js" type="text/javascript"></script>
<script src="JS/pxgradient-1.0.3.js" type="text/javascript"></script> 
<script>
function fnExcelReport() {
  var uri = 'data:application/vnd.ms-excel;base64,'
, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p];      }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById('reportTable')
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
 }
}

$(document).ready(function() {
    $('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = $(this).attr('href');

        // Show/Hide Tabs
        //$('.tabs ' + currentAttrValue).show().siblings().hide();
		$('.tabs ' + currentAttrValue).siblings().slideUp(400);
		$('.tabs ' + currentAttrValue).delay(400).slideDown(400);
	
		// Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});

function stopRKey(evt)
{ 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 
document.onkeypress = stopRKey; 

$(function(){
$( "#datepicker" ).datepicker({
	showOn: "button",
	buttonImage: "images/Calendar-icon.png",
	buttonImageOnly:true,
	buttonText: "Select a date",
	showWeek: true,
	showOtherMonths: true,
	selectOtherMonths:true,
	dateFormat: "mm-dd-yy"
});
$(document).tooltip();
});

function returnInfo(str){
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	if (str==""){
     document.getElementById("billingData").innerHTML="";
     return;
   }
   if (window.XMLHttpRequest){
    // code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp=new XMLHttpRequest();
   }else { // code for IE6, IE5
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange=function() {
     if (xmlhttp.readyState==4 && xmlhttp.status==200){
	
       document.getElementById("billingData").innerHTML=xmlhttp.responseText;
     }
   }
   xmlhttp.open("GET","billingData.php?from=" + from + "&to=" + to + "&rnd=" + Math.random(),true);
   xmlhttp.send();
}

</script>
<?php
	include('includes/connect.php');
	if(isset($_GET['error']))
	{
		echo "<h3>Error submitting data to database.</h3>";
	}
?>
<title>Bobcat Billing</title>
<h1 style="color:red; text-align:center;">THIS IS FOR TESTING PURPOSES ONLY</h1>
<div class="tabs">
	<ul class="tab-links">
        <li class="active"><a href="#tab1">Billing Report</a></li>
        <li><a href="#tab2">Adjust Billing Info</a></li>
        <!--<li><a href="#tab3">Tab #3</a></li>
        <li><a href="#tab4">Tab #4</a></li>-->
    </ul>
	<div id="content">
		<div id="tab1" class="tab active">
			<fieldset id="search"><legend >Bobcat Billing Report</legend>
				<fieldset  id="date"><legend align="center">Date Range</legend>
				<table align="center">
					<thead>
						<th>
							<font style="font-weight:bold;">From</font>
						</th>
						<th>
							<font style="font-weight:bold;">To</font>
						</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="text" name="from" id="from" value="<?echo date('Y-m-d');?>" />
								<script>
								$("#from" ).datepicker({
									showOn: "button",
									buttonImage: "images/calendar.gif",
									buttonImageOnly:true,
									buttonText: "Select a date",
									showWeek: true,
									showOtherMonths: true,
									selectOtherMonths:true,
									dateFormat: "yy-mm-dd"
								});
								</script>
							</td>
							<td>
								<input type="text" name="to" id="to" value="<?echo date('Y-m-d');?>" />
								<script>
								$("#to" ).datepicker({
									showOn: "button",
									buttonImage: "images/calendar.gif",
									buttonImageOnly:true,
									buttonText: "Select a date",
									showWeek: true,
									showOtherMonths: true,
									selectOtherMonths:true,
									dateFormat: "yy-mm-dd"
								});
								</script>
							</td>
							<td>
								<input id="sub_button" type="submit" value="Submit" class="wide" onclick="returnInfo('submit')" />
							</td>
						</tr>
					</tbody>
				</table>
				</fieldset>
			</fieldset>
			<iframe id="txtArea1" style="display:none"></iframe>

		<div id="billingData"></div>
		</div>
		 <div id="tab2" class="tab">
			<fieldset id="search"><legend >Adjust Bobcat Billing Info</legend>
				<fieldset  id="date"><legend align="center">Billing Criteria</legend>
					<table id="reportTable" style="border-collapse:separate; border-spacing:2px;">
						<thead>
							<th width="1%" style="white-space:nowrap;">
								Price
							</th>
							<th width="1%" style="white-space:nowrap;">
								Weight
							</th>
						</thead>
						<tbody>
							<tr>
								<td style='border:1px solid; border-color:#1C1C1C; text-align:center; white-space:nowrap;'>
									1.31
									<input type="text" name="price" id="price" value="enter price" style="display:none;"/>
								</td>
								<td style='border:1px solid; border-color:#1C1C1C; text-align:center; white-space:nowrap;'>
									<input type="text" name="weight" id="weight" value="select weight"style="display:none;"/>
								<td width="1%" style='text-align:left;'>	
									<input id="sub_button" type="submit" value="Edit" class="wide" onclick="returnInfo('submit')" />
								</td>
								</td>
							</tr>
						</tbody>
					</table>	
				</fieldset>
			</fieldset>
		</div>
	</div>
</div>
</html>