<?php
include('/include/header.php');
?>

        <div class="navigation">
            <?php echo($alglocatie); ?><b><?php echo($gebpantitle); ?></b>
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
        </div>>
        <div class="paneelcontent">
        	<div class="catbalk">
                <?php echo($gebpanforumsettings); ?>
            </div>
            <div class="paneelbox">
            	<div class="formulier">
                    <span><b><?php echo($gebpandiscussionview); ?></b></span>
                    <select class="paneelinvoer" name="weergave">
                        <option value="genest"><?php echo($gebpannested); ?></option>
                        <option value="lineair"><?php echo($gebpanlinear); ?></option>
                    </select>
                    <span><b><?php echo($gebpanlang); ?></b></span>
                    <select class="paneelinvoer" name="taal">
                        <option value="genest">Nederlands</option>
                        <option value="lineair">English</option>
                     </select>
          			<br />
               	</div>
            </div>
            <div class="catbalk">
                <?php echo($gebpanprofilesettings); ?>
            </div>
          	<div class="paneelbox">
                <div class="formulier">
                    <span>Geslacht</span>
                    <select class="paneelinvoer" name="geslacht">
                    	<option value="man">Man</option>
                    	<option value="vrouw">Vrouw</option>
                    	<option value="x">Zeg ik liever niet</option>
                	</select>
                    <br />
                    <span>Website</span>
                    <input name="site" type="text" maxlength="250" class="paneelinvoer" />
                    <br />
                    <span>Ondertitel</span>
                    <input name="ondertitel" type="text" maxlength="250" class="paneelinvoer" />
                    <br />
                    <span>Woonplaats</span>
                    <input name="locatie" type="text" maxlength="250" class="paneelinvoer" />
                    <br />
                    <span>E-mail</span>
                    <input name="email" type="text" maxlength="250" class="paneelinvoer" />
                    <br />
                    <span>Geboortedatum</span>
                    <select name="gebdag" class="paneelinvoer2" style="width:10%;">
						<?php
                            for($i=1;$i<32;$i++)
                            {
                                echo('<option value="'.$i.'">'.$i.'</option>');	
                            }
                        ?>
                    </select>
                    <select name="gebmaand" class="paneelinvoer2" style="width:25%;">
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
                    <select name="gebjaar" class="paneelinvoer2" style="width:15%;">
						<?php
                            for($i=2012;$i>1900;$i--)
                            {
                                echo('<option value="'.$i.'">'.$i.'</option>');	
                            }
                        ?>
                    </select>
                    <br />
                    <span>Zichtbaarheid</span>
                    <select class="paneelinvoer" name="leeftijdzichtbaar">
                        <option value="ja">Leeftijd en geboortedatum weergeven</option>
                        <option value="nee">Leeftijd en geboortedatum verbergen</option>
                    </select>
                    <br />
                </div>
            	<b>Interesses</b>
                <textarea name="interesse" cols="10" rows="8" class="paneeltext"></textarea>
                <b>Biografie</b>
                <textarea name="biografie" cols="10" rows="8" class="paneeltext"></textarea>
            </div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
<?php
include '/include/footer.php';
?>
