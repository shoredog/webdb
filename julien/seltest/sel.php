<?php
include 'header.php';
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
                Persoonlijk kladblok
            </div>
          	<div class="paneelbox">
				
				<?php
					if(isset($_POST['submitcss']))
					{
						echo($cssupdate);
					}
					else
					{
						echo('<span>'.$choosecss.'</span>
							<form action="#" method="post" name="cssform">
								<select class="paneelinvoer" name="cssselector">
									<option value="style">ShoreDog Index</option>
									<option value="style2">ShoreDog Sunrise</option>
								</select>
								<div align="right">
									<input name="submitcss" type="submit" value="Opslaan" />
								</div>
							</form>');
					}
					if(isset($_POST['submittaal']))
					{
						echo($langupdate);
					}
					else
					{
						echo('<span>'.$chooselang.'</span>
							<form action="#" method="post" name="taalform">
								<select class="paneelinvoer" name="taalselector">
									<option value="dutch">Nederlands</option>
									<option value="english">English</option>
								</select>
								<div align="right">
									<input name="submittaal" type="submit" value="Opslaan" />
								</div>
							</form>');
					}
				?>
      			
           	</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
<?php
include 'footer.php';
?>