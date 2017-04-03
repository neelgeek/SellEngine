<?php

if(isset($_POST))
{
	$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["upload"]["name"]);

	  if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file))
	   {
        echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="">
		
<input type="file" name="upload" id="upload">
<input type="submit" name="submit">
</form>
</body>
</html>



