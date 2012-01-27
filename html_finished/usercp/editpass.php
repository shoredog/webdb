<?php
include 'include/header.php';
if(isset($_POST['submitpass']))
{
	$succes = true;
	$errors = array();
	mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
	mysql_select_db($mysqldb);
	$query = sprintf("SELECT password FROM users WHERE user_id = %s", $_SESSION['user_id']);
	$result = mysql_query($query);
	$output = mysql_fetch_array($result);
	$oldpass = $output['password'];
	if(sha1(filterInput($_POST['huidigpw'])) != $oldpass)
	{
		$errors[] = "U heeft uw huidige wachtwoord verkeerd ingevuld";
		$succes = false;
	}
	if(filterInput($_POST['newpw1']) !== filterInput($_POST['newpw2']))
	{
		$errors[] = "Uw nieuwe wachtwoorden komen niet overeen.";
		$succes = false;
	}
	if($succes == true)
	{
		$encoded = sha1(filterInput($_POST['newpw1']));
		$query = sprintf("UPDATE users SET password = '%s' WHERE user_id = %s", $encoded, $_SESSION['user_id']);
	}
	mysql_close();	
}
?>
        <div class="navigation">
            U bent hier: <b>Gebruikerspaneel</b>
        </div>
        
        <div class="content">
        	<div class="paneelmenu">
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
               	Wachtwoord wijzigen
            </div>
          	<div class="paneelbox">
            	<div class="formulier">
                	<?php
						if(isset($succes) && $succes == true)
							echo("Uw wachtwoord is succesvol geupdate.");
						if(isset($succes) && $succes == false)
						{
							echo('<b><span style="color:red; width:auto">De volgende fouten zijn opgetreden:</span></b><br />');
							echo('<ul>');
							foreach($errors as $error)
								echo("<li>$error</li>\n");
							echo('</ul>');		
						}
						if(!isset($succes) || $succes == false)
						{
					?>
                	<form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post">
                        <span>Uw huidige wachtwoord</span>
                        <input name="huidigpw" type="password" maxlength="250" class="paneelinvoer" />
                        <br />
                        <span>Uw nieuwe wachtwoord</span>
                        <input name="newpw1" type="password" maxlength="250" class="paneelinvoer" />
                        <br />
                        <span>Uw nieuwe wachtwoord</span>
                        <input name="newpw2" type="password" maxlength="250" class="paneelinvoer" />
                        <br />
                        <div align="right">
                            <input name="submitpass" type="submit" value="Opslaan" style="width:20%;" />
                        </div>
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
