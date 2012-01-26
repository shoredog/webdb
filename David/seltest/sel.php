<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
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
?>

<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title>Projectweek HTML 1</title>
</head>

<body>
    <div class="container">
        <div class="banner">
        </div>
        <div class="menu">
            <div class="menuitem">
                <b><?php echo($algforum); ?></b>
            </div>
            <div class="menuitem">
                <b><?php echo($algusers); ?></b>
            </div>
            <div class="menuitem">
                <b><?php echo($algreg); ?></b>
            </div>
            <div class="menuitem">
                <b><?php echo($alglogin); ?></b>
            </div>
        </div>
        <div class="navigation">
            <?php echo($alglocatie); ?><b><?php echo($gebpantitle); ?></b>
        </div>
        
        <div class="content"><div class="paneelmenu">
            <div class="catbalk">
                Menu
            </div>
          	<div class="paneelbox">
                - Home<br />
                - Foruminstellingen<br />
                - Avatar wijzigen<br />
                - Signature wijzigen<br />
                - Wachtwoord wijzigen
           	</div>
        </div>
        <div class="paneelcontent">
       
            <div class="catbalk">
                Persoonlijk kladblok
            </div>
          	<div class="paneelbox">
				
				<?php
					if(isset($_POST['submitcss']))
					{
						echo($gebpancssupdate);
						echo('<br />');
					}
					else
					{
						echo('<span>'.$gebpanchoosecss.'</span>
							<form action="#" method="post" name="cssform">
								<select class="paneelinvoer" name="cssselector">
									<option value="style">ShoreDog Index</option>
									<option value="style2">ShoreDog Sunrise</option>
								</select>
								<div align="right">
									<input name="submitcss" type="submit" value="Opslaan" />
								</div>
							</form>');
					}
					if(isset($_POST['submittaal']))
					{
						echo($gebpanlangupdate);
					}
					else
					{
						echo('<span>'.$gebpanchooselang.'</span>
							<form action="#" method="post" name="taalform">
								<select class="paneelinvoer" name="taalselector">
									<option value="dutch">Nederlands</option>
									<option value="english">English</option>
								</select>
								<div align="right">
									<input name="submittaal" type="submit" value="Opslaan" />
								</div>
							</form>');
					}
				?>
      			
           	</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
</div>
<div class="footer">
	<div class="footerdivider1">
		<?php echo($algcontact) ?>
	</div>
	<div class="footerdivider2">
		<?php echo($algcopyright) ?>
	</div>
	<div class="footerdivider1">
		<?php echo($algrules) ?>
	</div>	
	
</div>
</body>
</html>
