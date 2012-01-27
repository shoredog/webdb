<?php
include 'include/header.php';
if(isset($_POST['submitava']))
{
	$succes = false;
	if(isImage(filterInput($_POST['avatar'])))
	{
		$succes = true;	
	}
	if($succes == true)
	{
		$_SESSION['user_ava'] = filterInput($_POST['avatar']);
		$query = sprintf("UPDATE users SET avatar = '%s' WHERE user_id = %s", $_SESSION['user_ava'], $_SESSION['user_id']);
		mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
		mysql_select_db($mysqldb);
		mysql_query($query);
		mysql_close();	
	}
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
               	Uw huidige avatar
            </div>
          	<div class="paneelbox">
      			<center>
                	<?php
						if(isset($_SESSION['user_ava']))
						{
							printf("<img src='%s' height=\"100px\" width=\"100px\" />", $_SESSION['user_ava']);
						}
					?>
                </center>
			</div>
            <div class="catbalk">
               	 Een nieuwe avatar opgeven
            </div>
          	<div class="paneelbox">
      			<div class="formulier">
                	<?php
					if(isset($succes) && $succes == true)
					{
						echo("Uw avatar is geupdate.");	
					}
					else
					{
						if(isset($succes) && $succes == false)
							echo("<span style=\"color:red; font-weigth:bold; width:100%;\">U heeft een verkeerde URL opgegeven. <i>(Toegestane bestandstypen: jpg, png, gif, bmp)</i></span>");
					?>
                        <span>Link naar avatar</span>
                        <form name="editava" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input name="avatar" type="text" maxlength="250" class="paneelinvoer" style="width:37%" />
                            <input name="submitava" type="submit" value="Opslaan" style="width:20%" />
                            
                        </form>
                    <?php
					}
					?>
                </div>
			</div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
<?php
include 'include/footer.php';
?>
