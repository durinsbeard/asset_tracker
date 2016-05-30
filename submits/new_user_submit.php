<?
include('../includes/connect.php');
$first_name = mysql_real_escape_string($_POST['firstName']);
$last_name = mysql_real_escape_string($_POST['lastName']);
$email = mysql_real_escape_string($_POST['email']);
$company = mysql_real_escape_string($_POST['company']);

$sql= "insert into users (first_name, last_name, email, company_id) values ('".$first_name."','".$last_name."','".$email."','".$company."')";
if(mysql_query($sql,$con))
{
	header('Location: index.php?form=user');

}else
{
	die('Could not insert data. ' . mysql_error());
}

?>