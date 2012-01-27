<?php
include 'include/header.php';
if(isset($_POST['submitsig']))
{
	$succes = true;
	$_SESSION['user_sig'] = filterInput($_POST['signature']);
	$query = sprintf("UPDATE users SET signature = '%s' WHERE user_id = %s", $_SESSION['user_sig'], $_SESSION['user_id']);
	mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
	mysql_select_db($mysqldb);
	mysql_query($query);
	mysql_close();	
}
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
                	<?php echo(bbToHtml($_SESSION['user_sig']))  ?>
			</div>
            <div class="catbalk">
               	 Uw signature bewerken
            </div>
          	<div class="paneelbox">
            	<?php
					if(isset($succes) && $succes == true)
					{
						echo("Uw signature is geupdate.");	
					}
					else
					{
						
					?>
                    	<form name="editava" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <textarea name="signature" cols="10" rows="8" class="paneeltext"><?php echo(str_replace("\\r\\n", "&#10;", $_SESSION['user_sig']))  ?></textarea>
                            <div align="right">
                            	<input name="submitsig" type="submit" value="Opslaan" style="width:20%" />
                            </div>
                        </form>
                    <?php
					}
					?>
      			
			</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
<?php
include 'include/footer.php';
?>
