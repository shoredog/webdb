<?php

echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
';

session_start(); 

echo '
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
';

	if(isset($_POST['submitcss']))
	{
		$_SESSION['style'] = $_POST['cssselector'];
	}
	if(isset($_SESSION['style']))
		echo('<link href="'.$_SESSION['style'].'" rel="stylesheet" type="text/css" />');
	else
		echo('<link href="style.css" rel="stylesheet" type="text/css" />');
		
	if(isset($_POST['submittaal']))
	{
		$_SESSION['lang'] = $_POST['taalselector'];
	}
	if(isset($_SESSION['lang']))
	{
		$inc = "/lang/" . $_SESSION['lang'] . ".php";
		include($inc);
	}
	else
		include("/lang/english.php");

echo '
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title>Projectweek HTML 1</title>
</head>

<body>
	<div class="container">
        <div class="banner">
        </div>
        <div class="menu">
            <div class="menuitem">
                <b>Forum</b>
            </div>
            <div class="menuitem">
                <b>Gebruikers</b>
            </div>
            <div class="menuitem">
                <b>Registratie</b>
            </div>
            <div class="menuitem">
                <b>Log in</b>
            </div>
        </div>
';

?>