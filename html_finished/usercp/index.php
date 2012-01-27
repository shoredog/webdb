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
            <?php
				if(isset($_POST['submitkladblok']))
				{
					mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
					mysql_select_db($mysqldb);
					mysql_query("UPDATE users SET notitions='" . filterInput($_POST['kladbl']) . "' WHERE user_id =" . $_SESSION['user_id']) or die(mysql_error());
					$_SESSION['notitions'] = filterInput($_POST['kladbl']);
					echo("Uw kladblok is bijgewerkt.");	
				}
			?>
      			<form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post" name="kladblok">
                	<textarea name="kladbl" cols="10" rows="5" class="paneeltext"><?php echo(isset($_SESSION['notitions']))?($_SESSION['notitions']):($gebpannotepadempty) ?></textarea>
                    <div align="right">
                    	<input name="submitkladblok" type="submit" value="Opslaan" />
                    </div>
                </form>
           	</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
<?php
include('include/footer.php');
?>