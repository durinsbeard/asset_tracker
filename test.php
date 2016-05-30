<?
include('includes/connect.php');
$assettype = mysql_real_escape_string($_POST['assettype']);

if ($_POST['form']=="asset")
{
	if (!isset($_POST['tag']))
	{	
		echo "its set";
	}else 	
	{
		header('Location: index.php?form=asset&error=1');
	}
}
?>