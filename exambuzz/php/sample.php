<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unzipping Zip File Turorial</title>
</head>

<body>
<form action="sample.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><input type="submit" name="submit" value="Extract">
</form>

<?php

if(isset($_POST['submit']))
{
	$array = explode(".",$_FILES["file"]["name"]);
	$fileName = $array[0];
	$fileExtension = strtolower(end($array));
	
	if($fileExtension == "zip")
	{
		if(is_dir("unzips/".$fileName) == false)
		{
 move_uploaded_file($_FILES["file"]["tmp_name"],"tmp/".$_FILES["file"]["name"]);
			$zip = new ZipArchive();
			echo "Hello";
			$zip -> open("tmp/".$_FILES["file"]["name"]);
		
		    	$zip->extractTo($fileName);
		    	echo "Hello";
			for($num = 0; $num < $zip->numFiles; $num++)
			{
				$fileInfo = $zip->statIndex($num);
				echo "Extracting: ".$fileInfo["name"];
			
				echo "<br />";
			}
			
			$zip->close();
			unlink("tmp/".$_FILES["file"]["name"]);
		}
		else
		{
			echo $fileName." has already been unzipped";
		}
	}
	else
	{
		echo "Only .zip files are allowed";
	}
}

?>
</body>
</html>