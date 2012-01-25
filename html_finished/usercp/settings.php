<?php
include('/include/header.php');
mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die("Er is een fout opgetreden.");
mysql_select_db($mysqldb) or die("Er is een fout opgetreden.");
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
                <?php echo($gebpanforumsettings); ?>
            </div>
            <div class="paneelbox">
            	<div class="formulier">
                	<?php
						if(isset($_POST['senduserform']))
						{
							$succes = true;
							$fouten = array();
							$querys = array();
							echo("En nu moet het gedoe verwerkt worden.<br />");
							if(strcmp($_POST['weergave'], $_SESSION['user_tview']) != 0)
							{
								echo("De forumweergave moet worden geupdate.<br />");
								$querys[] = sprintf("viewtype = '%s'", $_POST['weergave']);	
							}
							if(strcmp($_POST['taal'], $_SESSION['user_lang']) != 0)
							{
								echo("De taal moet worden geupdate.<br />");	
								$querys[] = sprintf("lang = '%s'", $_POST['taal']);
							}
							if(strcmp($_POST['cssselector'], $_SESSION['user_style']) != 0)
							{
								echo("De stijl moet worden geupdate.<br />");	
								$querys[] = sprintf("style = '%s'", $_POST['cssselector']);
							}
							if(strcmp($_POST['geslacht'], $_SESSION['user_sex']) != 0)
							{
								echo("Het geslacht moet worden geupdate.<br />");	
								$querys[] = sprintf("sex = '%s'", $_POST['geslacht']);
							}
							if(strcmp($_POST['site'], $_SESSION['user_site']) != 0)
							{
								echo("De website moet worden geupdate.<br />");	
								$querys[] = sprintf("personal_site = '%s'", filterInput($_POST['site']));
							}
							if(strcmp($_POST['ondertitel'], $_SESSION['user_subtitle']) != 0)
							{
								echo("De subtitel moet worden geupdate.<br />");
								$querys[] = sprintf("sub_title = '%s'", filterInput($_POST['ondertitel']));	
							}
							if(strcmp($_POST['locatie'], $_SESSION['user_location']) != 0)
							{
								echo("De locatie moet worden geupdate.<br />");	
								$querys[] = sprintf("location = '%s'", filterInput($_POST['locatie']));
							}
							if(strcmp($_POST['email'], $_SESSION['user_email']) != 0)
							{
								echo("De email moet worden geupdate.<br />");
								$querys[] = sprintf("email = '%s'", filterInput($_POST['email']));	
							}
							if((strcmp($_POST['gebdag'], date("d", strtotime($_SESSION['user_date_of_birth']))) != 0) || (strcmp($_POST['gebmaand'], date("n", strtotime($_SESSION['user_date_of_birth']))) != 0) || (strcmp($_POST['gebjaar'], date("Y", strtotime($_SESSION['user_date_of_birth']))) != 0))
							{
								echo("De geboortedag moet worden geupdate.<br />");
								$querys[] = sprintf("date_of_birth = '%s-%s-%s'", $_POST['gebjaar'], $_POST['gebmaand'], $_POST['gebdag']);	
							}
							if(strcmp($_POST['leeftijdzichtbaar'], $_SESSION['user_show_dob']) != 0)
							{
								echo("De zichtbaarheid van de geboortedatum moet worden geupdate.<br />");
								$querys[] = sprintf("show_dob = '%s'", $_POST['leeftijdzichtbaar']);	
							}
							if(strcmp($_POST['interesse'], $_SESSION['user_interests']) != 0)
							{
								echo("De interesses moeten worden geupdate.<br />");
								$querys[] = sprintf("interests = '%s'", $_POST['interesse']);	
							}
							if(strcmp($_POST['biografie'], $_SESSION['user_bio']) != 0)
							{
								echo("De biografie moet worden geupdate.<br />");	
								$querys[] = sprintf("biography = '%s'", $_POST['biografie']);
							}
							$updatequery = "UPDATE users SET ";
							foreach($querys as $item)
							{
								$updatequery .= $item . ", ";
							}
							$updatequery = substr($updatequery,0,-2);
							$updatequery .= " WHERE user_id = '" . $_SESSION['user_id'] . "'";
							echo("De uit te voeren query: <br /><br />" . $updatequery);
							echo('</div>');
						}
						if(!isset($succes) || $succes == false)
						{
					?>
                	<form action=<?php echo($_SERVER['PHP_SELF']) ?> method="post">
                    	<span><b><?php echo($gebpandiscussionview); ?></b></span>
                        <select class="paneelinvoer" name="weergave">
                            <option value="0"<?php echo ''.(strcmp($_SESSION['user_tview'], '0') == 0)?' SELECTED':''; ?>><?php echo($gebpannested); ?></option>
                            <option value="1"<?php echo ''.(strcmp($_SESSION['user_tview'], '1') == 0)?' SELECTED':''; ?>><?php echo($gebpanlinear); ?></option>
                        </select>
                        <br />
                        <span><b><?php echo($gebpanlang); ?></b></span>
                        <select class="paneelinvoer" name="taal">
                            <?php
                                $result = mysql_query("SELECT * FROM langs");
                                while($row = mysql_fetch_array($result))
                                {
                                    echo('<option value="'.$row['id'].'"'.((strcmp($_SESSION['user_lang'], $row['id']) == 0)?' SELECTED':'').'>'.$row['name'].'</option>');
                                }
                            ?>
                         </select>
                         <br />
                         <span><b><?php echo($gebpanstyle); ?></b></span>
                        <select class="paneelinvoer" name="cssselector">
                            <?php 
                            $result = mysql_query("SELECT * FROM styles");
                            while($row = mysql_fetch_array($result))
                            {
                                echo('<option value="'.$row['id'].'"'.((strcmp($_SESSION['user_style'], $row['id']) == 0)?' SELECTED':'').'>'.$row['title'].'</option>');
                            }
                            ?>
                        </select>
                        <br />
                    </div>
                </div>
                <div class="catbalk">
                    <?php echo($gebpanprofilesettings); ?>
                </div>
                <div class="paneelbox">
                    <div class="formulier">
                        <span><?php echo($gebpansex); ?></span>
                        <select class="paneelinvoer" name="geslacht">
                            <option value="m"<?php echo ''.(strcmp($_SESSION['user_sex'], 'm') == 0)?' SELECTED':''; ?>><?php echo($gebpanman); ?></option>
                            <option value="v"<?php echo ''.(strcmp($_SESSION['user_sex'], 'v') == 0)?' SELECTED':''; ?>><?php echo($gebpanwoman); ?></option>
                            <option value="x"<?php echo ''.(strcmp($_SESSION['user_sex'], 'x') == 0)?' SELECTED':''; ?>><?php echo($gebpannosex); ?></option>
                        </select>
                        <br />
                        <span><?php echo($gebpansite); ?></span>
                        <input name="site" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($_SESSION['user_site']) ?>" />
                        <br />
                        <span><?php echo($gebpansubtitle); ?></span>
                        <input name="ondertitel" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($_SESSION['user_subtitle']) ?>" />
                        <br />
                        <span><?php echo($gebpanplace); ?></span>
                        <input name="locatie" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($_SESSION['user_location']) ?>" />
                        <br />
                        <span><?php echo($gebpanmail); ?></span>
                        <input name="email" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($_SESSION['user_email']) ?>" />
                        <br />
                        <span><?php echo($gebpandob); ?></span>
                        <select name="gebdag" class="paneelinvoer2" style="width:10%;">
                            <?php
                                for($i=1;$i<32;$i++)
                                {
                                    echo('<option value="'.$i.'"'.((strcmp(date("d", strtotime($_SESSION['user_date_of_birth'])), $i) == 0)?' SELECTED':'').'>'.$i.'</option>');	
                                }
                            ?>
                        </select>
                        <select name="gebmaand" class="paneelinvoer2" style="width:25%;">
                            <?php
                                for($i=1;$i<13;$i++)
                                {
									$arrayindex = $i-1;
                                    echo('<option value="'.$i.'"'.((strcmp(date("n", strtotime($_SESSION['user_date_of_birth'])), $i) == 0)?' SELECTED':'').'>'.$algmonths[$arrayindex].'</option>');	
                                }
                            ?>
                        </select>
                        <select name="gebjaar" class="paneelinvoer2" style="width:15%;">
                            <?php
                                for($i=2012;$i>1900;$i--)
                                {
                                    echo('<option value="'.$i.'"'.((strcmp(date("Y", strtotime($_SESSION['user_date_of_birth'])), $i) == 0)?' SELECTED':'').'>'.$i.'</option>');	
                                }
                            ?>
                        </select>
                        <br />
                        <span><?php echo($gebpanvis); ?></span>
                        <select class="paneelinvoer" name="leeftijdzichtbaar">
                            <option value="1"<?php echo ''.(strcmp($_SESSION['user_show_dob'], '1') == 0)?' SELECTED':''; ?>><?php echo($gebpanvistrue); ?></option>
                            <option value="0"<?php echo ''.(strcmp($_SESSION['user_show_dob'], '0') == 0)?' SELECTED':''; ?>><?php echo($gebpanvisfalse); ?></option>
                        </select>
                        <br />
                    </div>
                    <b><?php echo($gebpaninterest); ?></b>
                    <textarea name="interesse" cols="10" rows="8" class="paneeltext"><?php echo($_SESSION['user_interests']); ?></textarea>
                    <b><?php echo($gebpanbio); ?></b>
                    <textarea name="biografie" cols="10" rows="8" class="paneeltext"><?php echo($_SESSION['user_bio']); ?></textarea>
                    <div align="right">
                    	<input name="senduserform" type="submit" value="Verzenden" />
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
include '/include/footer.php';
?>
