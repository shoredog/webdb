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
                <img src="logo.png" align="middle" />
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
                U bent hier: <b>postcomment</b>
            </div>
            <div class="content">
                <div class="catbalk">
                    New reply
                </div>
                <div class="forumhok">
                    <div class="formulier">
                        <span><b>Gebruikersnaam:</b></span>
                        <span>Tijmen Zwaan <a href="logout ofzo">change user</a></span>
                        <div class="profilefooter"></div>
                    </div>
                    <div class="formulier">
                        <span><b>Onderwerp:</b></span>
                        <input name="onderwerp" type="text" maxlength="250" class="paneelinvoer" />
                        <div class="profilefooter"></div>
                    </div>
                    <div class="formulier">
                        <span><b>Bericht:</b></span>
                        <textarea name="bericht" cols="60" rows="15" class="paneeltext">dit moet eigenlijk met javascript gevuld worden.</textarea>
                        <div class="profilefooter"></div>
                    </div>
                    <div>
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            &copy; 2012 - ShoreDog Power Services, Inc.&trade; (Powered by ShoreDog Forum Engine).
        </div>
    </body>
</html>
