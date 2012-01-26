<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$tijd = time();
	$username = "Dave";
	$merge = $username . $tijd;
	echo($merge);
	$enc = sha1($merge);
	echo("<br />");
	echo($enc);
	$enc = substr($enc,4,14);
	echo("<br />");
	echo($enc);
	do
	SELECT password FROM users
	while fetch array
	if is gelijk
	maak nieuwe
	$succes = false
	else
	$succes = true
	while succes = false
?>
</body>
</html>