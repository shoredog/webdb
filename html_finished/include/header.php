<?php
session_start();
include("/include/config.php"); 
mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
mysql_select_db($mysqldb);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	if(isset($_SESSION['user_style']))
	{
		$result = mysql_query("SELECT * FROM styles WHERE id = " .$_SESSION['user_style'] );
		$style = mysql_fetch_array($result);
		echo('<link href="styles/'.$style['folder'].'/style.css" rel="stylesheet" type="text/css" />');
	}
	else
	{
		echo('<link href="styles/shoredog_index/style.css" rel="stylesheet" type="text/css" />');
	}
	if(isset($_SESSION['user_lang']))
	{
		$result = mysql_query("SELECT * FROM langs WHERE id = " .$_SESSION['user_lang'] );
		$lang = mysql_fetch_array($result);
		if(empty($lang['file']))
			$lang['file'] = "english";
		$inc = "lang/" . $lang['file'] . ".php";
		include($inc);
	}
	else
		include("lang/english.php");
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
