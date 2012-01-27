<?php
	include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
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
						{ 
							$forum_id = $forum['forum_id'];
							$result3 = mysql_query("SELECT * FROM comments WHERE comment_forum_parent_id=$forum_id");
							$result4 = mysql_query("SELECT * FROM forums WHERE parent_id=$forum_id");
							?>
							<div class="categorieforumcontainer">
								<div class="categorieforumhok" onClick="window.location.href='forum.php?id=<?php print $forum['forum_id'];?>'">
									<b><?php print $forum['forum_name'];?></b><br />
									<i><?php print $forum['forum_description'];?></i>
								</div>
								<div class="categorieposthok">
									<center>
										<b>
											<?php
												$aantal = 0;
												
												while ($discussies = mysql_fetch_array($result3))
												{
													$aantal++;
												}
													print $aantal;
											?>
										</b>
									</center>
								</div>
								<div class="categorieposthok">
									<center>
										<b>100</b>
									</center>
								</div>
								<div class="categorielastpost" onClick="window.location.href='yourlinklocationhere'">
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