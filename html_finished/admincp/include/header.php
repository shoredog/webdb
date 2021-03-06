<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
require("../include/functions.php");
include("../include/config.php");
mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
mysql_select_db($mysqldb);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	if(isset($_SESSION['user_style']))
	{
		$result = mysql_query("SELECT * FROM styles WHERE id = " .$_SESSION['user_style'] );
		$style = mysql_fetch_array($result);
		echo('<link href="../styles/'.$style['folder'].'/style.css" rel="stylesheet" type="text/css" />');
	}
	else
	{
		echo('<link href="../styles/shoredog_index/style.css" rel="stylesheet" type="text/css" />');
	}
	if(isset($_SESSION['user_lang']))
	{
		$result = mysql_query("SELECT * FROM langs WHERE id = " .$_SESSION['user_lang'] );
		$lang = mysql_fetch_array($result);
		$inc = "../lang/" . $lang['file'] . ".php";
		include($inc);
	}
	else
		include("../lang/english.php");
?>
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title>Adminpanel</title>
</head>

<body>
	<div class="container">
        <div class="banner">
        </div>
        <div class="menu">
            <div class="menuitemleft" onClick="window.location.href='../index.php'">
                <b><?php echo($algforum); ?></b>
            </div>
            <div class="menuitemleft" onClick="window.location.href='../usercp/index.php'">
                <b><?php echo($algusers); ?></b>
            </div>
            
			<?php
			if(!empty($_SESSION['user_rank'])){
				 echo "
					<div class=\"menuitemright\" onClick=\"window.location.href='../logout.php'\">
							<b>Log out</b>
					</div>
					<div class=\"menuitemright\" onClick=\"window.location.href='../profiel.php'\">
						<b>Profiel</b>
					</div>";
			}
			else { 
				echo "
					<div class=\"menuitemright\" onClick=\"window.location.href='../login.php'\">
						<b>Log in</b>
					</div>
					<div class=\"menuitemright\" onClick=\"window.location.href='../register.php'\">
						<b>Registreer</b>
					</div>";
			
			} ?>
        </div>
        <?php
			if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] < 2)
			{
				echo('<div class="content">');
				echo("Geen admin of niet ingelogd!");
				echo('</div>');
				include("include/footer.php");
				die();
			}
		?>
