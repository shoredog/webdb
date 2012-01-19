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
									  onMouseOut="this.style.backgroundColor='#333333';" 
									  onClick="window.location.href='index.php'">
					<b>Forum</b>
				</div>
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';" 
									  onClick="window.location.href='profiel.php'">
					<b>Profiel</b>
				</div>
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';"
									  onClick="window.location.href='register.php'">
					<b>Registratie</b>
				</div>
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';"
									  onClick="window.location.href='login.php'">
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
               	Wachtwoord wijzigen
            </div>
          	<div class="paneelbox">
      			<table width="100%"  class="invoertabel">
                	<tr>
                    	<td width="50%"><b>Uw oude wachtwoord</b></td>
                        <td>
                        	<input name="ondertitel" type="password" maxlength="250" class="paneelinvoer" />
                    	</td>
                    </tr>
                    <tr>
                    	<td width="50%"><b>Uw nieuwe wachtwoord</b></td>
                        <td>
                        	<input name="site" type="password" maxlength="250" class="paneelinvoer" />
                    	</td>
                    </tr>
                    <tr>
                    	<td width="50%"><b>Nogmaals uw nieuwe wachtwoord</b></td>
                        <td>
                        	<input name="ondertitel" type="password" maxlength="250" class="paneelinvoer" />
                    	</td>
                    </tr>
           		</table>
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
