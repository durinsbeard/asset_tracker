<?
include('includes/connect.php');
if(isset($_POST['companyId']))
{
$companyId=$_POST['companyId'];
$sql="select * from users where company_id = '".$companyId."' order by first_name";
$query=mysql_query($sql,$con);
$firstInitial="";
while($row=mysql_fetch_array($query))
{
                              
	//Use strtoupper for consistent lettering.
	if($firstInitial!=substr(strtoupper($row['first_name']),0,1))
	{
		if ($firstInitial != "")
		{
			echo "</optgroup>";
		}
//you were passing a variable that would always be one off.  You needed to pass the substr of section (not the firstinitial value checker).
//Consider…the first pass…firstrinital = “”…and the substr = A.  You want it to view A.  Second pass…firstinital = A…and the substr = B…you want it to be B.
		echo '<optgroup label='. substr(strtoupper($row['first_name']),0,1).'>';
    }      
	echo "<option value=".$row['user_id'].">".$row['first_name']." ".$row['last_name']."</option>";
    $firstInitial=strtoupper(substr($row['first_name'],0,1));
}
//The if statement is unnecessary.  When it reaches the bottom and exits the loop, there must ALWAYS be a an exit to the optgroup as the last hurrah.
echo '</optgroup>';
                              
}             
?>
 
 
