<?
		
		include('./upload/connect.php');
		$allowed_extensions = array("jpg", "png", "gif");
		$extension = end(explode(".", $_FILES["file"]["name"]));
		
		
		if(($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") && in_array($extension, $allowed_extensions))
		{
			if($_FILES["file"]["error"] > 0)
			{
				header("location: index.php?form=asset_image&error=3");
			}
			else
			{
				if(file_exists("upload/" . $_FILES["file"]["name"]))
				{
					header("location: index.php?form=asset_image&error=4");
				}
				else
				{
					//move_uploaded_file($_FILES["file"]["tmp_name"],"./upload/" . $_FILES["file"]["name"]);
					echo $_FILES["file"]["name"];

					if(isset($_POST['assetid']))
					{
						$assetid = mysql_real_escape_string($_POST['assetid']);
						$file = $_FILES["file"]["name"];
						$imagePath = "upload/". $file;
						//echo $imagePath;
						
						
						$sql = "INSERT INTO asset_images (asset_id,location) VALUE ('" .$assetid. "','" .$imagePath. "')";
						if(mysql_query($sql,$con))
						{
							header("location: assetData.php?error=0");
						}
						else
						{
							header("location: assetData.php?error=3");
						}
					}
					else
					{
						 header("location: assetData.php?error=2");
					}
				}
			}
		}
		else
		{
			header("location: assetData.php?error=1");
		}
?>