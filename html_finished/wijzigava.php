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
                - Home<br />
                - Foruminstellingen<br />
                - Avatar wijzigen<br />
                - Signature wijzigen<br />
                - Wachtwoord wijzigen
           	</div>
        </div>
        <div class="paneelcontent">
            <div class="catbalk">
               	Uw huidige avatar
            </div>
          	<div class="paneelbox">
      			<center>
                	<img src="ava.jpg" height="100" width="100" />
                </center>
			</div>
            <div class="catbalk">
               	 Een nieuwe avatar opgeven
            </div>
          	<div class="paneelbox">
      			<table width="100%"  class="invoertabel">
                	<tr>
                    	<td width="40%"><b>Link naar avatar</b></td>
                        <td>
                        	<input name="avatar" type="text" maxlength="250" class="paneelinvoer" />
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
