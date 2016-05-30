<?
include('includes/connect.php');
?>
<link href="css/jquery-ui.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.css" />
<script src="JS/jquery.min.js" type="text/javascript"></script>
<script src="JS/jquery.caret.js" type="text/javascript"></script>
<script src="JS/jquery.ipaddress.js" type="text/javascript"></script>
<script src="JS/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
<script src="JS/jquery.maskedinput.js" type="text/javascript"></script>
<script src="JS/pxgradient-1.0.3.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function()
 {
 $("#company").change(function()
 {
var companyId=$(this).val();
var dataString = 'companyId='+ companyId;

 $.ajax
 ({
 type: "POST",
 url: "selectUsers.php",
 data: dataString,
 cache: false,
 success: function(html)
 {
 $("#userId").html(html);
 } 
 });

 });

 });
</script>

Company :
<select name='company' id='company'>
	<option value='NULL'>select company</option>
		<?	
		$sql = "SELECT * FROM company WHERE active = 1";
		$query = mysql_query($sql, $con);
		while ($row=mysql_fetch_array($query))
		{
		?>
		<option value='<?echo $row['company_id']?>' ><?echo $row['company_name']?></option>";
		<?
		}
		?>
</select>
<br/><br/>

user :
<select name="userId" id="userId" >
<option selected="selected">--Select User--</option>
</select>