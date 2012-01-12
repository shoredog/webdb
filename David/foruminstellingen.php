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
                Foruminstellingen
            </div>
          	<div class="paneelbox">
      			<table width="100%"  class="invoertabel">
                	<tr>
                    	<td width="40%"><b>Discussieweergave</b></td>
                        <td>
                        	<select class="paneelinvoer" name="weergave">
                      			<option value="genest">Geneste weergave</option>
                      			<option value="lineair">Lineaire weergave</option>
                     		</select>
                    	</td>
                    </tr>
                    <tr>
                    	<td width="40%"><b>Taal</b></td>
                        <td>
                        	<select class="paneelinvoer" name="taal">
                      			<option value="genest">Nederlands</option>
                      			<option value="lineair">English</option>
                     		</select>
                    	</td>
                    </tr>
                </table>
			</div>
            <div class="catbalk">
                Profielinstellingen
            </div>
          	<div class="paneelbox">
      			<table width="100%"  class="invoertabel">
                	<tr>
                    	<td width="40%"><b>Geslacht</b></td>
                        <td>
                        	<select class="paneelinvoer" name="geslacht">
                      			<option value="man">Man</option>
                      			<option value="vrouw">Vrouw</option>
                                <option value="x">Zeg ik liever niet</option>
                     		</select>
                    	</td>
                    </tr>
                    <tr>
                    	<td width="40%"><b>Website</b></td>
                        <td>
                        	<input name="site" type="text" maxlength="250" class="paneelinvoer" />
                    	</td>
                    </tr>
                    <tr>
                    	<td width="40%"><b>Ondertitel</b></td>
                        <td>
                        	<input name="ondertitel" type="text" maxlength="250" class="paneelinvoer" />
                    	</td>
                    </tr>
                    <tr>
                    	<td width="40%"><b>Woonplaats</b></td>
                        <td>
                        	<input name="locatie" type="text" maxlength="250" class="paneelinvoer" />
                    	</td>
                    </tr>
                    <tr>
                    	<td width="40%"><b>E-mail</b></td>
                        <td>
                        	<input name="email" type="text" maxlength="250" class="paneelinvoer" />
                    	</td>
                    </tr>
                    <tr>
                    	<td width="40%"><b>Geboortedatum</b></td>
                        <td>
                        	<select name="gebdag" class="paneelinvoer2">
                            	<?php
									for($i=1;$i<32;$i++)
									{
										echo('<option value="'.$i.'">'.$i.'</option>');	
									}
								?>
                      		</select>
                            <select name="gebmaand" class="paneelinvoer2">
                            	<option value="januari">Januari</option>
                                <option value="februai">Februari</option>
                                <option value="maart">Maart</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="augustus">Augustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                            <select name="gebjaar" class="paneelinvoer2">
                            	<?php
									for($i=2012;$i>1900;$i--)
									{
										echo('<option value="'.$i.'">'.$i.'</option>');	
									}
								?>
                      		</select>
                    	</td>
                    </tr>
                    <tr>
                    	<td width="40%"><b>Zichtbaarheid</b></td>
                        <td>
                        	<select class="paneelinvoer" name="leeftijdzichtbaar">
                      			<option value="ja">Leeftijd en geboortedatum weergeven</option>
                      			<option value="nee">Leeftijd en geboortedatum verbergen</option>
                     		</select>
                    	</td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<b>Interesses</b>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<textarea name="interesse" cols="10" rows="8" class="paneeltext"></textarea>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<b>Biografie</b>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<textarea name="biografie" cols="10" rows="8" class="paneeltext"></textarea>
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
