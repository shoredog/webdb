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
    <?php $bannertip = array("Yes, this is dog.", "Have you tried turning it off and on again?", "RTFM!");
	$grootte = sizeof($bannertip);
	$random = rand(0, $grootte-1);
	echo('<center><img src="logo.png" align="middle" /></center><div class="bannerquotes">' . $bannertip[$random]); ?>
    </div>	
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
  <div class="content"><div class="catbalk">Gebruikerspaneel</div>
  <div class="forumhok">Welkom in het gebruikerspaneel! Hier kan u uw profiel naar behoefte aanpassen.</div>
  <div class="catbalk">Emailadres wijzigen</div>
  <div class="forumhok">
  <form action="#" method="post" name="changemail">
  <table width="100%" class="invoertabel">
    <tr>
    	<td width="50%">Uw nieuwe email adres:</td>
        <td><input name="email1" type="text" size="25" class="invoer" /></td>
    </tr>
    <tr>
    	<td>Uw email opnieuw opgeven:</td>
        <td><input name="email2" type="text" size="25" class="invoer" /></td>
    </tr>
    <td colspan="2" style="text-align:right">
        	<input name="sendmail" type="submit" value="Versturen" />
        </td>
  </table>
  </form>
  </div>
  <div class="catbalk">Wachtwoord wijzigen</div>
  <div class="forumhok">
  <form action="#" method="post" name="changepass">
  <table width="100%" class="invoertabel">
    <tr>
    	<td width="50%">Uw nieuwe wachtwoord:</td>
        <td><input name="pass1" type="password" size="25" class="invoer" /></td>
    </tr>
    <tr>
    	<td>Uw wachtwoord opnieuw opgeven:</td>
        <td><input name="pass2" type="password" size="25" class="invoer" /></td>
    </tr>
    <td colspan="2" style="text-align:right">
        	<input name="sendpass" type="submit" value="Versturen" />
        </td>
  </table>
  </form>
  </div>
  <div class="catbalk">Avatar wijzigen</div>
  <div class="forumhok">
  <form action="#" method="post" name="changepass">
  <table width="100%" class="invoertabel">
    <tr>
    	<td width="50%">Uw huidige avatar:</td>
        <td><img src="ava.jpg" width="100" height="100" /></td>
    </tr>
    <tr>
    	<td>Een nieuwe avatar opgeven:</td>
        <td><input name="newava" type="text" size="25" class="invoer" /></td>
    </tr>
    <td colspan="2" style="text-align:right">
        	<input name="sendava" type="submit" value="Versturen" />
        </td>
  </table>
  </form>
  </div>
  <div class="catbalk">Signature wijzigen</div>
  <div class="forumhok">
  <form action="#" method="post" name="changepass">
  <table width="100%" class="invoertabel">
    <tr>
    	<td>Uw huidige signature:</td>
    </tr>
    <tr>
    	<td><center><img src="http://weknowmemes.com/wp-content/uploads/2011/10/hello-yes-this-is-dog.png" /></center></td>
    </tr>
    <tr>
    	<td>Een nieuwe signature opgeven:</td>
    </tr>
    <tr>
    	<td><center><textarea name="newsig" cols="65" rows="9" class="invoer">[img]http://weknowmemes.com/wp-content/uploads/2011/10/hello-yes-this-is-dog.png[/img]</textarea></center></td>
    </tr>
    <td colspan="2" style="text-align:right">
        	<input name="sendsig" type="submit" value="Versturen" />
        </td>
  </table>
  </form>
  </div>
  <div class="catbalk">Overige instellingen wijzigen</div>
  <div class="forumhok">
  <form action="#" method="post" name="changepass">
  <table width="100%" class="invoertabel">
    <tr>
    	<td width="50%">Uw geslacht:</td>
        <td><select class="invoer">
  <option value="man">Man</option>
  <option value="vrouw">Vrouw</option>
  <option value="nb">Onbekend</option>
  <option value="tijmen">Tijmen</option>
</select></td>
    </tr>
    <tr>
    	<td>Uw interesses:</td>
        <td><textarea name="interesse" cols="35" rows="8" class="invoer"></textarea></td>
    </tr>
    <tr>
    	<td>Uw gebruikerstitel:</td>
        <td><input name="gebtit" type="text" size="25" class="invoer" /></td>
    </tr>
    <td colspan="2" style="text-align:right">
        	<input name="sendoverig" type="submit" value="Versturen" />
        </td>
  </table>
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
