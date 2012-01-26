<?php
session_start();
include("/include/config.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	if(isset($_POST['submitcss']))
	{
		$_SESSION['style'] = $_POST['cssselector'];
	}
	if(isset($_SESSION['user_style']))
		echo('<link href="styles/'.$_SESSION['user_style'].'/style.css" rel="stylesheet" type="text/css" />');
	else
		echo('<link href="styles/1/style.css" rel="stylesheet" type="text/css" />');
		
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
?>
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title>Shoredog</title>
</head>

<body>
	<div class="container">
        <div class="banner">
        </div>
        <div class="menu">
            <div class="menuitem" onClick="window.location.href='index.php'">
                <b>Forum</b>
            </div>
            <div class="menuitem" onClick="window.location.href='userpanel.php'">
                <b>Gebruikers</b>
            </div>
            <div class="menuitem" onClick="window.location.href='register.php'">
                <b>Registratie</b>
            </div>
			<?php
			if(!empty($_SESSION['user_rank'])){
				 echo "
					<div class=\"menuitem\" onClick=\"window.location.href='logout.php'\">
							<b>Log out</b>
					</div>";
			}
			else { 
				echo "
					<div class=\"menuitem\" onClick=\"window.location.href='login.php'\">
						<b>Log in</b>
					</div>";
			
			} ?>
        </div>
