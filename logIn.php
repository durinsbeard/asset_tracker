<script>
	$(document).ready(function() {
		$("#sub_button").css("display","none");
		//$('#myTable').tablesorter();
	});
</script>
<?php
	$value = "";
	if(isset($_GET['error']))
	{
		$value = "<div style='color:black; font-size:20px; margin:0 auto; width:350px; height:30px;'>Error Logging in; please check user name and password and try again.</div>";
	}
	echo $value;
?>
<br/><br/>

	<table id="logIn" >
		<tr>
			<td>
				User Name:
			</td>
			<td>
				<input name="uname" type="text" id="uname" size="30" />
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input name="password" type="password" id="password" size="30" />
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<center><input type="submit" value="LOGIN" class="wide"/></center>
			</td>
	</table>

