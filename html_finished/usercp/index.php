<?php
include('include/header.php');
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
        </div>
        
        <div class="paneelcontent">
            <div class="catbalk">
                <?php echo($gebpantitle); ?>
            </div>
            <div class="paneelbox">
                <?php echo($gebpanwelcome); ?>
            </div>
            <div class="catbalk">
                <?php echo($gebpannotepad); ?>
            </div>
          	<div class="paneelbox">
      			<form action="#" method="post" name="kladblok">
                	<textarea name="kladbl" cols="10" rows="5" class="paneeltext"><?php echo($gebpannotepadempty) ?></textarea>
                    <div align="right">
                    	<input name="submitkladblok" type="submit" value="Opslaan" />
                    </div>
                </form>
           	</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
<?php
include('/include/footer.php');
?>