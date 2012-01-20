
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
include("../include/config.php"); 
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	if(isset($_POST['submitcss']))
	{
		$_SESSION['style'] = $_POST['cssselector'];
	}
	if(isset($_SESSION['style']))
		echo('<link href="../styles/'.$_SESSION['style'].'/style.css" rel="stylesheet" type="text/css" />');
	else
		echo('<link href="../styles/shoredog_index/style.css" rel="stylesheet" type="text/css" />');
		
	if(isset($_POST['submittaal']))
	{
		$_SESSION['lang'] = $_POST['taalselector'];
	}
	if(isset($_SESSION['lang']))
	{
		$inc = "../lang/" . $_SESSION['lang'] . ".php";
		include($inc);
	}
	else
		include("../lang/dutch.php");
?>
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title>Userpanel</title>
</head>

<body>
	<div class="container">
        <div class="banner">
        </div>
        <div class="menu">
            <div class="menuitem" onClick="window.location.href='../index.php'">
                <b><?php echo($algforum); ?></b>
            </div>
            <div class="menuitem" onClick="window.location.href='../users/index.php'">
                <b><?php echo($algusers); ?></b>
            </div>
            <div class="menuitem" onClick="window.location.href='../register.php'">
                <b><?php echo($algreg); ?></b>
            </div>
            <div class="menuitem" onClick="window.location.href='../login.php'">
                <b><?php echo($alglogin); ?></b>
            </div>
        </div>
