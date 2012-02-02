<?php
	include 'include/header.php';
?>
        <?php
			if(!empty($_SESSION['user_id']) && $_SESSION['user_rank'] > 1)
			{ ?>
				<div class="navigation">
					U bent hier: <b>Administratiepaneel</b>
				</div>
				
				<div class="content">
					<center><h1>Administratiepaneel</h1></center>
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
							Administratiepaneel
						</div>
						<div class="paneelbox">
							Welkom in het administratiepaneel! Hier kan u verschillende aspecten van het forum naar wens aanpassen.
						</div>
						<div class="catbalk">
							Adminkladblok
						</div>
						<div class="paneelbox">
							<?php
								mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
								mysql_select_db($mysqldb);
								if(isset($_POST['submitkladblok']))
								{
									mysql_query("UPDATE configuration SET config_content='" . filterInput($_POST['kladbl']) . "' WHERE config_description = 'adminklad'") or die(mysql_error());
									echo("Het kladblok is bijgewerkt.");	
								}
								$res = mysql_query("SELECT * FROM configuration WHERE config_description = 'adminklad'") or die(mysql_error());
								if(mysql_num_rows($res) != 0){ $out = mysql_fetch_array($res); $out = $out['config_content'];}
								else $out = 'Hier kan je notes voor de admins opslaan';
							?>
							<form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post" name="kladblok">
								<textarea name="kladbl" cols="10" rows="5" class="paneeltext"><?php echo($out) ?></textarea>
								<div align="right">
									<input name="submitkladblok" type="submit" value="Opslaan" />
								</div>
							</form>
						</div>
					</div>
				<div class="paneelfooter"></div>
				</div>
			<?php
			}
		?>
	</div>
	
<?php
	include 'include/footer.php';
?>