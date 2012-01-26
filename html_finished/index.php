<?php
	include '/include/header.php';
?>
	<div class="navigation">
		U bent hier: <b>Index</b>
	</div>
		
    <div class="categoriecontent">
		<?php
			$result = mysql_query("SELECT * FROM forums WHERE parent_id=0");
			while ($categorie = mysql_fetch_array($result))
			{
				?>  
				<div class="categoriecontainer">
					<div class="categoriecatbalk"><?php print $categorie['forum_name'];?></div>
					<div class="catforumhok">
						<div class="categorieinfocontainer">
							<div class="categorieinfoforumhok" >
								<b>Forum</b>
							</div>
							<div class="categorieinfoposthok">
								<b>Discussies</b>
							</div>
							<div class="categorieinfoposthok">
								<b>Berichten</b>
							</div>
							<div class="categorieinfolastpost">
								<b>Laatste bericht</b>
							</div>
						</div>
						<?php
						$categorie_id = $categorie['forum_id'];
						$result2 = mysql_query("SELECT * FROM forums WHERE parent_id=$categorie_id");
						while ($forum = mysql_fetch_array($result2))
						{ ?>
							<div class="categorieforumcontainer">
								<div class="categorieforumhok" onMouseOver="this.style.backgroundColor='#888888';"
															   onMouseOut="this.style.backgroundColor='#666666';"
															   onClick="window.location.href='forum.php?id=<?php print $forum['forum_id'];?>'">
									<b><?php print $forum['forum_name'];?></b><br />
									<i><?php print $forum['forum_description'];?></i>
								</div>
								<div class="categorieposthok">
									<center>
										<b>100</b>
									</center>
								</div>
								<div class="categorieposthok">
									<center>
										<b>100</b>
									</center>
								</div>
								<div class="categorielastpost" onMouseOver="this.style.backgroundColor='#888888';"
															   onMouseOut="this.style.backgroundColor='#666666';"
															   onClick="window.location.href='yourlinklocationhere'">
									<b>Laatste bericht 1</b></br>
									<i>Op datum door poster</i>
								</div>
							</div>
						<?php
						}
					?>
					<div class="categoriefooter"></div>
					</div>
				</div>
			<?php
			}
		?>
	</div>

<?php
	include '/include/footer.php';
?>