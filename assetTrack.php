<!doctype html>

 

<html lang="en">

<head>

  <meta charset="utf-8" />

  <title>Badge Management</title>
  <link rel="stylesheet" href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />

  <script>
 $(function() {
	$( "#tabs" ).tabs();
	//$('#inner-tabs-container').tabs();
	
});
</script>

</head>
<h1 id="header" ><img src="images/srclogistics.gif"></img></h1>
<body>

 <?php
	include('includes/connect.php');
	//error_reporting(E_ALL);
	//ini_set("display_errors",1);

	
?>

<div id="tabs">
<ul>
	<li><a href="#tabs-1">List Assets</a></li>
	<li><a href="#tabs-2">Assigned Assets</a></li>
	<li><a href="#tabs-3">Asset Summary</a></li>
	
</ul>

 <div id="tabs-1">
<script>
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		$('#myTable').tablesorter();
		});
</script>
</table>
<table class="tablesorter" id="myTable">
<thead>
	<tr>
		<th class="report_3">
			Asset Type
		</th>
		<th class="report_3">
			Asset ID
		</th>
		<th class="report_3">
			IP Address
		</th>
	</tr>
</thead>
<tbody>
<?php
	$sql = "SELECT 	t.asset_type as type,
					a.asset_id,
					a.wired_mac_address as wired,
					a.wireless_mac_address as wireless,
					a.asset_tag as tag,
					a.operating_system_id as os,
					a.office_version as office,
					ip.ip_address as ip
			FROM assets a
			LEFT JOIN ip_addresses ip on a.ip_address_id = ip.ip_address_id
			LEFT JOIN asset_types t on a.asset_type = t.asset_type_id
			order by a.asset_tag";
	$result = mysql_query($sql,$con);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr class='report_3'><td>{$row['type']}</td><td><a href='?form=edit_asset&asset_id={$row['asset_id']}' title='Wired Mac:<br/> {$row['wired']} <br/> Wireless Mac:<br/> {$row['wireless']} <br/> OS: {$row['os']} <br/> Office: {$row['office']} '>{$row['tag']}</a></td><td>{$row['ip']}</td>";
	}
?>
</tbody>
</div>

  
<div id="tabs-2">
  
	




  </div>

 
 
 
 <div id="tabs-3">
	
	<script>
	$(document).ready(function() {
		$('#sub_button').css("display","none");
		$('#myTable').tablesorter();
		});
</script>
</table>
<table id='myTable' class='tablesorter'>
	<thead>
		<tr>
			<th>
				Asset Type
			</th>
			<th>
				Count
			</th>
		</tr>
	</thead>

		<?php
			$sql = "SELECT asset_types.asset_type, 
						count(*) as count 
					FROM assets 
					LEFT JOIN asset_types ON assets.asset_type = asset_type_id 
					WHERE asset_types.active=1 
					AND assets.active=1 
					GROUP BY asset_types.asset_type";
			
			$result = mysql_query($sql,$con);
			
			while($row=mysql_fetch_array($result))
			{
				echo "<tr><td>{$row['asset_type']}</td><td>{$row['count']}</td></tr>";
			}
		?>
	
 

</div>




 

 

</body>

</html>

