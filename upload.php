<?php
use Aws\s3\Exception\S3Exception;

require 'app/start.php';


if(isset($_FILES['file'])){
	$name =	 $_FILES['file']['name'];
	$ext = explode(".", $name);
	$ext = strtolower(end($ext));
	
	//Temporary details
	$key = md5(uniqid());
	$tmp_file_name = $key.".".$ext;
	$tmp_file_path = "files/".$tmp_file_name;
	
	move_uploaded_file($FILES['name']['tmp_name'],$tmp_file_path);
	
	try{
		$s3->putObject([
			'Bucket' => $config['s3']['bucket'],
			'Key' => "uploads/".$name,
			'Body' => fopen($tmp_file_path,'rb'),
			'ACL' => 'public-read'
		]);
		unlink($tmp_file_path);
	}catch(S3Exception $e){
		die("There was an error while uploading that file");
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form method="POST" action="upload.php" enctype="multipart/form-data">
    	<input type="file" name="file"  />
        <input type="submit" name="submit" value="Upload" />
    </form>
</body>
</html>


