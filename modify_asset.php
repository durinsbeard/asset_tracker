
<p>Here I am </p>
<?php
	include("includes/connect.php");

	$tag = mysql_real_escape_string($_POST['tag']);
	$wired = mysql_real_escape_string($_POST['wired']);
	$wireless = mysql_real_escape_string($_POST['wireless']);
	$os = mysql_real_escape_string($_POST['operatingsystem']);
	$oskey = mysql_real_escape_string($_POST['oskey']);
	$office = mysql_real_escape_string($_POST['office']);
	$officekey = mysql_real_escape_string($_POST['officekey']);
	$ip = mysql_real_escape_string($_POST['ipadds']);
	$asset = mysql_real_escape_string($_POST['asset']);
	for($i=1; $i<= 255; $i++){
		$sql = "INSERT INTO ip_ip_suffix (ip_suffix) VALUES '" . $i . "'";
		
		if(mysql_query($sql,$con))
		{
			header("location: index.php?form=edit_asset");
		}
		else
		{
			
			die();
			
		}
	}
?>
