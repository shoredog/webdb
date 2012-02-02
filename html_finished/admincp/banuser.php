<?php
include('include/header.php');
mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die("Er is een fout opgetreden.");
mysql_select_db($mysqldb) or die("Er is een fout opgetreden.");
?>

		<?php
			if(!empty($_SESSION['user_id']) && $_SESSION['user_rank'] > 1)
			{ ?>
				<div class="navigation">
					<?php echo($alglocatie); ?><b><?php echo($gebpantitle); ?></b>
				</div>
				
				<div class="content">
					<div class="paneelmenu">
						<div class="catbalk">
							Menu
						</div>
						<div class="paneelbox">
							<?php include('include/menu.php'); ?>
						</div>
					</div>
					<div class="paneelcontent">
						<div class="catbalk">
							<?php 
							if(!isset($_POST['senduserform']))
								echo($gebpanforumsettings); 
							else
								echo("Verwerken invoer...");
							?>
						</div>
						<div class="paneelbox">
							<div class="formulier">
								<?php
									if(isset($_GET['uid']))
									{
										$userid = filterInput($_GET['uid']);
										$res = mysql_query("SELECT * FROM users WHERE user_id = '$userid'") or die ("Error");
										if(mysql_num_rows($res) != 0)
										{
											mysql_query("UPDATE users SET rank='0' WHERE user_id = '$userid'") or die ("Error");
											echo("</div>Gebruiker succesvol gebanned.");
										}
									}
									else
									{
										echo("<h3>Selecteer een gebruiker om te bannen.</h3></div>");	
										$res = mysql_query('SELECT * FROM users WHERE rank = 1 ORDER BY user_id ASC') or die (mysql_error());
										while($out = mysql_fetch_array($res))
										{
											echo('<a href=\'banuser.php?uid='.$out['user_id']. '\'>- '.$out['user_name'].'</a> (ID:'.$out['user_id'].')<br />');
										}
									}
								?>
							</div>
						</div>
						<div class="paneelfooter"></div>
					</div>
				</div>
			<?php
			}
		?>
	
<?php
include 'include/footer.php';
?>
