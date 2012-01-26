<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title>Projectweek HTML 1</title>
</head>

<body>
    <div class="container">
        <div class="banner">
            <center><img src="logo.png" align="middle" /></center>
        </div>
        <div class="menu">
            <div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
    onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='yourlinklocationhere'">
                <b>Forum</b>
            </div>
            <div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
    onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='yourlinklocationhere'">
                <b>Gebruikers</b>
            </div>
            <div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
    onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='yourlinklocationhere'">
                <b>Registratie</b>
            </div>
            <div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
    onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='yourlinklocationhere'">
                <b>Log in</b>
            </div>
        </div>
        <div class="navigation">
            U bent hier: <b>Gebruikerspaneel</b>
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
                Gebruikerspaneel
            </div>
            <div class="paneelbox">
                Welkom in het gebruikerspaneel! Hier kan u uw profiel naar behoefte aanpassen.
            </div>
            <div class="catbalk">
                BB -> HTML en andersom enzo
            </div>
          	<div class="paneelbox">
			<form name="test" method="post">
			<textarea name="bbtest" cols="65" rows="9" class="paneelinvoer" style="width:100%"></textarea>
			<input name="submittaal" type="submit" value="Laat uitvoer zien..." />
			</form>
				<?php
				if(isset($_POST['submittaal']))
				{	
					$replace = $_POST['bbtest'];
					$replace = mysql_real_escape_string(htmlentities($replace));
					$bbarray = array("[b]","[/b]","[i]","[/i]",'[youtube]','[/youtube]','[u]','[/u]','[img]','[/img]','[code]','[/code]','[center]','[/center]','\r\n','\n','\r');
					$htmlarray = array("<b>","</b>","<i>","</i>",'<iframe width="100%" height="250px" src="http://www.youtube.com/embed/','?wmode=opaque" frameborder="0" allowfullscreen></iframe>','<u>','</u>','<img src="','" width="100%"','<textarea cols="65" rows="9" class="paneelinvoer" style="width:100%" disabled="disabled">','</textarea>','<center>','</center>','<br />','<br />','<br />');
					$replace = str_replace($bbarray, $htmlarray, $replace);
					echo($replace);
				}
				?>
           	</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
</div>
<div class="footer">
	&copy; 2012 - ShoreDog Power Services, Inc.&trade; (Powered by ShoreDog Forum Engine&reg;).
</div>
</body>
</html>
