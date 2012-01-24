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
                	<form action=<?php echo($_SERVER['PHP_SELF']) ?> method="post">
                    	<?php
							$query = "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id'];
							$result = mysql_query($query);
							$userinfo = mysql_fetch_array($result);
						?>
                        <span><b><?php echo($gebpandiscussionview); ?></b></span>
                        <select class="paneelinvoer" name="weergave">
                            <option value="0"<?php echo ''.(strcmp($userinfo['viewtype'], '0') == 0)?' SELECTED':''; ?>><?php echo($gebpannested); ?></option>
                            <option value="1"<?php echo ''.(strcmp($userinfo['viewtype'], '1') == 0)?' SELECTED':''; ?>><?php echo($gebpanlinear); ?></option>
                        </select>
                        <br />
                        <span><b><?php echo($gebpanlang); ?></b></span>
                        <select class="paneelinvoer" name="taal">
                            <?php
                                $result = mysql_query("SELECT * FROM langs");
                                while($row = mysql_fetch_array($result))
                                {
                                    echo('<option value="'.$row['id'].'"'.((strcmp($userinfo['lang'], $row['id']) == 0)?' SELECTED':'').'>'.$row['name'].'</option>');
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
                                echo('<option value="'.$row['id'].'"'.((strcmp($userinfo['style'], $row['id']) == 0)?' SELECTED':'').'>'.$row['title'].'</option>');
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
                            <option value="m"<?php echo ''.(strcmp($userinfo['sex'], 'm') == 0)?' SELECTED':''; ?>><?php echo($gebpanman); ?></option>
                            <option value="v"<?php echo ''.(strcmp($userinfo['sex'], 'v') == 0)?' SELECTED':''; ?>><?php echo($gebpanwoman); ?></option>
                            <option value="x"<?php echo ''.(strcmp($userinfo['sex'], 'x') == 0)?' SELECTED':''; ?>><?php echo($gebpannosex); ?></option>
                        </select>
                        <br />
                        <span><?php echo($gebpansite); ?></span>
                        <input name="site" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($userinfo['personal_site']) ?>" />
                        <br />
                        <span><?php echo($gebpansubtitle); ?></span>
                        <input name="ondertitel" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($userinfo['sub_title']) ?>" />
                        <br />
                        <span><?php echo($gebpanplace); ?></span>
                        <input name="locatie" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($userinfo['location']) ?>" />
                        <br />
                        <span><?php echo($gebpanmail); ?></span>
                        <input name="email" type="text" maxlength="250" class="paneelinvoer" value="<?php echo($userinfo['email']) ?>" />
                        <br />
                        <span><?php echo($gebpandob); ?></span>
                        <select name="gebdag" class="paneelinvoer2" style="width:10%;">
                            <?php
                                for($i=1;$i<32;$i++)
                                {
                                    echo('<option value="'.$i.'"'.((strcmp(date("d", strtotime($userinfo['date_of_birth'])), $i) == 0)?' SELECTED':'').'>'.$i.'</option>');	
                                }
                            ?>
                        </select>
                        <select name="gebmaand" class="paneelinvoer2" style="width:25%;">
                            <?php
                                for($i=1;$i<13;$i++)
                                {
									$arrayindex = $i-1;
                                    echo('<option value="'.$i.'"'.((strcmp(date("n", strtotime($userinfo['date_of_birth'])), $i) == 0)?' SELECTED':'').'>'.$algmonths[$arrayindex].'</option>');	
                                }
                            ?>
                        </select>
                        <select name="gebjaar" class="paneelinvoer2" style="width:15%;">
                            <?php
                                for($i=2012;$i>1900;$i--)
                                {
                                    echo('<option value="'.$i.'"'.((strcmp(date("Y", strtotime($userinfo['date_of_birth'])), $i) == 0)?' SELECTED':'').'>'.$i.'</option>');	
                                }
                            ?>
                        </select>
                        <br />
                        <span><?php echo($gebpanvis); ?></span>
                        <select class="paneelinvoer" name="leeftijdzichtbaar">
                            <option value="ja"<?php echo ''.(strcmp($userinfo['show_dob'], '1') == 0)?' SELECTED':''; ?>><?php echo($gebpanvistrue); ?></option>
                            <option value="nee"<?php echo ''.(strcmp($userinfo['show_dob'], '0') == 0)?' SELECTED':''; ?>><?php echo($gebpanvisfalse); ?></option>
                        </select>
                        <br />
                    </div>
                    <b><?php echo($gebpaninterest); ?></b>
                    <textarea name="interesse" cols="10" rows="8" class="paneeltext"><?php echo($userinfo['interests']); ?></textarea>
                    <b><?php echo($gebpanbio); ?></b>
                    <textarea name="biografie" cols="10" rows="8" class="paneeltext"><?php echo($userinfo['biography']); ?></textarea>
                </form>
            </div>
      	</div>
      	<div class="paneelfooter"></div>
   		</div>
	</div>
<?php
include '/include/footer.php';
?>
