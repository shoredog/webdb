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
                Gebruikerspaneel
            </div>
            <div class="paneelbox">
                Welkom in het gebruikerspaneel! Hier kan u uw profiel naar behoefte aanpassen.
            </div>
            <div class="catbalk">
                Persoonlijk kladblok
            </div>
          	<div class="paneelbox">
      			<form action="#" method="post" name="kladblok">
                	<textarea name="kladbl" cols="10" rows="5" class="paneeltext">Hier kunt u informatie opslaan welke u later nog kunt gebruiken.</textarea>
                    <div align="right">
                    	<input name="submitkladblok" type="submit" value="Opslaan" />
                    </div>
                </form>
           	</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
<?php
include '/include/footer.php';
?>