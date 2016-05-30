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
		
	
		<!--<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />-->
		<script src="JS/jquery.min.js" type="text/javascript"></script>

		
		<script src="JS/jquery.inputmask.bundle.js" type="text/javascript"></script>
		
		<script>
		$(document).ready(function(){
			$(":input").inputmask();
		});
		</script>
	<body>				
							
							<input data-inputmask="'mask': '**-**-**-**-**-**'" />
							
	</body>
</html>
	