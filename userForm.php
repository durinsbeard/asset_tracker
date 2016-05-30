<div>
<form action="submit.php" method="post">
			
		<table id="contentTable">
			<tr>
				<td style="white-space: nowrap;">			
						<font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:white;">First Name:</font>
					</td>
					<td>
						<input type="text" name="firstName" />
						
					</td>
				</tr>
				<tr>
					<td style="white-space: nowrap;">			
						<font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:white;">Last Name:</font>
					</td>
					<td>
						<input type="text" name="lastName" />
					</td>
				</tr>
				<tr>
				<tr>
					<td style="white-space: nowrap;">			
						<font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:white;">E-Mail:</font>
					</td>
					<td>
						<input type="text" name="email" />
						<input type="text" name="form" value="user" style="display:none;" />
					</td>
				</tr>
					<td style="white-space: nowrap;">			
						<font style="text-shadow:1px 1px 0px #0a2694;text-decoration:none;color:white;">Company:</font>
					</td>
					<td>
						<?include('includes/listCompanies.php');?>
					</td>
				</tr>
				
			</table>
			
			<td colspan="2" align="center">
				<input id="sub_button" type="submit" value="submit" class="wide"/>
			</td>
			</form>
			</div>