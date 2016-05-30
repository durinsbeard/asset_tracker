<?
//else if ($_POST['form']=="afile")
	//{
	
		include('includes/connect.php');
		$allowed_extensions = array("jpg", "png", "gif","txt","pdf","docx","xlsx","xls");
		$extension = end(explode(".", $_FILES["file"]["name"]));
		
		if(($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg")
			 || ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "text/plain") || ($_FILES["file"]["type"] == "application/msword") 
			 || ($_FILES["file"]["type"] == "application/excel") || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && in_array($extension, $allowed_extensions))
		{
			if($_FILES["file"]["error"] > 0)
			{
				
			header("location: index.php?form=upload_documentation&error=3");
			}
			else
			{
				if(file_exists("upload/documentation/" . $_FILES["file"]["name"]))
				{
					header("location: index.php?form=upload_documentation&error=4");
				}
				else
				{
					move_uploaded_file($_FILES["file"]["tmp_name"],"upload/documentation/" . $_FILES["file"]["name"]);

					if(isset($_POST['title']))
					{
						$title = mysql_real_escape_string($_POST['title']);
						$file = $_FILES["file"]["name"];
						$filePath = "upload/documentation/" . $file;
						
						$sql = "INSERT INTO it_documentation (doc_title, doc_location) VALUE ('" .$title. "','" .$filePath. "')";
						if(mysql_query($sql,$con))
						{
							header("location: index.php?form=upload_documentation");
						}
						else
						{
							header("location: index.php?form=upload_documentation&error=3");
						}
					}
					else
					{
						header("location: index.php?form=upload_documentation&error=2");
					}
				}
			}
		}
		else
		{
						header("location: index.php?form=upload_documentation&error=1");
		}
?>