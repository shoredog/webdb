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
        </div>
        <div class="paneelcontent">
            <div class="catbalk">
               	Uw huidige signature
            </div>
          	<div class="paneelbox">
      			<center>
                	<img src="http://1.bp.blogspot.com/_bBlNFyLU7Ik/TSzrlWs8kNI/AAAAAAAABgc/Gm91ApIeJPA/s1600/Woodrow_wilson_signature.png" width="300" />
                </center>
			</div>
            <div class="catbalk">
               	 Uw signature bewerken
            </div>
          	<div class="paneelbox">
      			<textarea name="signature" cols="10" rows="8" class="paneeltext">Haha tijmen is gay</textarea>
			</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
<?php
include '/include/footer.php';
?>
