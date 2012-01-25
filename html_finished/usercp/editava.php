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
					if(isset($_POST['submitava']))
					{
						$img = getimagesize(filterInput($_POST['avatar']));
						if(!is_array($img))
						{
							echo("U heeft een ongeldige URL opgegeven.");
						}
						else
						{
							$_SESSION['user_ava'] = filterInput($_POST['avatar']);
						}
					}
					else
					{
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
include '/include/footer.php';
?>
