<?php
include '/include/header.php';
?>
        <div class="navigation">
            U bent hier: <b>Administratiepaneel</b>
        </div>
        
        <div class="content">
			<center><h1>Administratiepaneel</h1></center>
				<div class="paneelmenu">
					<div class="catbalk">
						Menu
					</div>
					<div class="paneelbox">
						- Home<br />
						- Gebruiker bewerken<br />
						- Topic moderation<br />
						- Categoriemanagement<br />
						- Forummanagement<br />
						- Algemene instellingen
					</div>
				</div>
			<div class="paneelcontent">
				<div class="catbalk">
					Administratiepaneel
				</div>
				<div class="paneelbox">
					Welkom in het administratiepaneel! Hier kan u verschillende aspecten van het forum naar wens aanpassen.
				</div>
				<div class="catbalk">
					Adminkladblok
				</div>
				<div class="paneelbox">
					<form action="#" method="post" name="kladblok">
						<textarea name="kladbl" cols="10" rows="5" class="paneeltext">Hier kunt u informatie opslaan welke zichtbaar is voor u en andere admins.</textarea>
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