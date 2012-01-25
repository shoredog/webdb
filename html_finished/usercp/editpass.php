<?php
include '/include/header.php';
?>
        <div class="navigation">
            U bent hier: <b>Gebruikerspaneel</b>
        </div>
        
        <div class="content"><div class="paneelmenu">
            <div class="catbalk">
                Menu
            </div>
          	<div class="paneelbox">
                 - <a href="index.php" target="_self"><?php echo($alghome); ?></a><br />
                - <a href="settings.php" target="_self"><?php echo($gebpanforumsettings); ?></a><br />
                - <a href="editava.php" target="_self"><?php echo($gebpanchangeava); ?></a><br />
                - <a href="editsig.php" target="_self"><?php echo($gebpanchangesig); ?></a><br />
                - <a href="editpass.php" target="_self"><?php echo($gebpanchangepass); ?></a>
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
<?php
include '/include/footer.php';
?>
