<?php
include('connect.php');
$form = mysql_real_escape_string($_GET['form']);

if($form == "linkedAssetForm")
{
	
	$sql = "SELECT * FROM users where user_id = (select user_id from tracking where asset_id = '" .$asset_id. "')";
				
		$query = mysql_query($sql,$con);
		$row=mysql_fetch_array($query);
		
		
		echo $row['first_name']. " ".$row['last_name'];
		
		
	
	
}else if (!empty($asset))
{
	$sqlAssignedUser = "SELECT * FROM users where user_id = (select user_id from tracking where asset_id = '" .$asset. "')";
	$queryAssignedUser = mysql_query($sqlAssignedUser,$con);
	$rowAssignedUser=mysql_fetch_array($queryAssignedUser);

		?>
		<select name='userid'>
			<option value='<?php echo $rowAssignedUser['user_id']; ?>' ><?php echo $rowAssignedUser['first_name']. " ".$rowAssignedUser['last_name']?></option>
		<?	
		$sqlUser = "SELECT * FROM users order by first_name";
		$queryUser = mysql_query($sqlUser, $con);
		while ($rowUser=mysql_fetch_array($queryUser))
		{
		?>
			<option value="<?echo $rowUser['user_id']?>" ><?echo $rowUser['first_name']." ".$rowUser['last_name']?></option>
		<?
		}
		?>
		</select>
		<?
}else
{
		?>
		<select name='userid'>
			<option value='NULL' >select user</option>
		<?	
		$sqlUser = "SELECT * FROM users WHERE active = 1 order by first_name";
		$queryUser = mysql_query($sqlUser, $con);
		while ($rowUser=mysql_fetch_array($queryUser))
		{
		?>
			<option value="<?echo $rowUser['user_id']?>" ><?echo $rowUser['first_name']." ".$rowUser['last_name']?></option>
		<?
		}
		?>
		</select>
		<?

}

?>