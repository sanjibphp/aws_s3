<?php
require 'app/start.php';

$object = 'uploads/upload_file.txt';
$url = $s3->getObjectUrl($config['s3']['bucket'], $object, '+10 minute');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="<?php echo $url;?>" download="<?php echo $object;?>">Download</a>
</body>
</html>
