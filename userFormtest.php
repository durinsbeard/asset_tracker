
<form action="new_user_submit.php" method="post" enctype="multipart/form-data">
			<center><legend style="margin-top:20px;color:#A4A4A4;">ENTER USER INFORMATION</legend></center>

		<table id="contentTable">
	
				</tr>
					<td style="white-space: nowrap;">			
						Company:
					</td>
					<td>
						<?include('includes/listCompanies.php');?>
					</td>
				</tr>
				<td style="white-space: nowrap;">			
						First Name:
					</td>
					<td>
						<input type="text" name="firstName" />
						
					</td>
				</tr>
				<tr>
					<td style="white-space: nowrap;">			
						Last Name:
					</td>
					<td>
						<input type="text" name="lastName" />
					</td>
				</tr>
				
				<tr>
					<td style="white-space: nowrap;">			
						E-Mail:
					</td>
					<td>
						<input type="text" name="email" />
						<input type="text" name="form" value="user" style="display:none;" />
					</td>
				</tr>	
	
		</table>
	
			
			<td colspan="2" align="center">
				<input id="sub_button" type="submit" value="submit" class="wide"/>
			</td>
			</form>
			
