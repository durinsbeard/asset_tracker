

<?PHP
	include("includes/connect.php");
	error_reporting(E_ALL);
	ini_set("display_errors",1);

	$user=trim(mysql_real_escape_string($_POST['user']));
	$tag=trim(mysql_real_escape_string($_POST['tag']));
	$date=trim(mysql_real_escape_string($_POST['date']));
	//echo $user;
	//echo $tag;
	
	$sql1="UPDATE tracking SET user_id=(select user_id from users where user_name='" .$user. "'), start_date='" .$date. "'
	WHERE asset_id = (SELECT asset_id FROM assets WHERE asset_tag = '" . $tag . "')";
    
	$update=mysql_query($sql1,$con);
	
	if (!$update){
		die('Could not update data. ' . mysql_error());
	}
	else{echo "Update was a success";}
	
	$sql2="INSERT INTO tracking_history
		    SELECT * FROM tracking WHERE asset_id = (SELECT asset_id FROM assets WHERE asset_tag = '" . $tag . "')";
			
	$insert=mysql_query($sql2,$con);
	
	if (!$insert){
		die('Could not insert data. ' . mysql_error());
	}
	else{echo "Insert was a success";}
	
	header("location: index.php?form=reassign_asset");
	
	
?>