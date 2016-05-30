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
 url: "selectUser.php",
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
//HTML Code
Country :
<select name='company'>
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

City :
<select name="userId" id="userId" >
<option selected="selected">--Select User--</option>
</select>