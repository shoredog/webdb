<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Projectweek HTML 1</title>
</head>

<body>
<div class="container">
    <div class="banner">
    	<img src="logo.png" align="middle" />
    </div>
    <div class="menu">
    	<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
		onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='index.php'">
    		<b>Forum</b>
    	</div>
        <div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
		onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='yourlinklocationhere'">
    		<b>Gebruikers</b>
    	</div>
        <div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
		onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='register.php'">
    		<b>Registratie</b>
    	</div>
        <div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
		onMouseOut="this.style.backgroundColor='#333333';" onClick="window.location.href='login.php'">
    		<b>Log in</b>
    	</div>
    </div>
    <div class="navigation">
    	U bent hier: <b>Log in</b>
    </div>
	<div class="content">
		<h1>Log in</h1>
		<div class="catbalk">
			Log in
		</div>
		<div class="forumhok">
			<div class="loginbox">
				<b>Vul hier uw login gegevens in:</b><p />
				<form>
				<div class="loginform">
					Gebruikersnaam:<br />
					<input type="text" name="username" /><p />
					Wachtwoord:<br />
					<input type="password" name="password" />
				</div>
				<p />
				<input type="submit" value="Log in" /><input type="submit" value="Registreer" />
				</form>
			</div>
		</div>
	</div>  
</div>
<div class="footer">
	&copy; 2012 - ShoreDog Power Services, Inc.&trade; (Powered by ShoreDog Forum Engine).
</div>
</body>
</html>
