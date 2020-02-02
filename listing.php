<?php
require 'app/start.php';
$objects = $s3->getIterator('ListObjects', [
	'Bucket' => $config['s3']['bucket']
]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="200" border="1">
  <thead>
    <tr>
      <th>File</th>
      <th>Download</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach($objects as $object):?>
    <tr>
      <td><?php echo $object['Key'];?></td>
      <td><a href="<?php echo $s3->getObjectUrl($config['s3']['bucket'], $object['Key']);?>" download="<?php echo $object['Key'];?>">Download</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>
