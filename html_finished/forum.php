<?php
include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
?>
<?php
    $parent_id = $_GET['id'];
    $result = mysql_query("SELECT * FROM forums WHERE forum_id=$parent_id");
    $result = mysql_fetch_array($result);
?>
    <div class="navigation">
    	U bent hier: <b><?php print getForumParents($result['parent_id'], $result['forum_name']); ?></b>
    </div>
	<div class="categoriecontent">
		<div class="categoriecontainer">
			<div class="categoriecatbalk">
				<div class="categoriecatbalkleft">
                    <?php print $result['forum_name']; ?>
				</div>
				<div class="categoriecatbalkright">
					<a href="posttopic.php?forum_id=<?php print $parent_id; ?>">Maak topic</a>
				</div>
			</div>
			<div class="forforumhok">
				<div class="categorieinfocontainer">
					<div class="categorieinfoforumhok" >
						<b>Forum</b>
					</div>
					<div class="categorieinfoposthok">
						<center>
							<b>Fora</b>
						</center>
					</div>
					<div class="categorieinfoposthok">
						<center>
							<b>Topics</b>
						</center>
					</div>
					<div class="categorieinfoposthok">
						<center>
							<b>Posts</b>
						</center>
					</div>
					<div class="categorieinfolastpost">
						<b>Laatste bericht</b>
					</div>
				</div>
				<?php
					$result = mysql_query("SELECT * FROM forums WHERE parent_id=$parent_id");
					while ($forum = mysql_fetch_array($result))
					{
						?>
						<div class="categorieforumcontainer">
							<div class="categorieforumhok" onClick="window.location.href='forum.php?id=<?php print $forum['forum_id'];?>'">
								<b>Forum: <?php print $forum['forum_name'];?></b><br />
								<i><?php print $forum['forum_description'];?></i>
							</div>
							<div class="categorieposthok">
								<center>
									<b>
										<?php
											$forum_id = $forum['forum_id'];
											$result2 = mysql_query("SELECT * FROM forums WHERE parent_id=$forum_id");
											$aantalfora = 0;
											
											while (mysql_fetch_array($result2))
											{
												$aantalfora++;
											}
											print $aantalfora;
										?>
									</b>
								</center>
							</div>
							<div class="categorieposthok">
								<center>
									<b>
										<?php
											$forum_id = $forum['forum_id'];
											$result2 = mysql_query("SELECT * FROM comments WHERE comment_forum_parent_id=$forum_id");
											$aantal = 0;
											
											while (mysql_fetch_array($result2))
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
									<b>
										<?php
											$forum_id = $forum['forum_id'];
											$result2 = mysql_query("SELECT * FROM comments WHERE comment_forum_parent_id=$forum_id");
											$aantalposts = 0;
											
											while (mysql_fetch_array($result2))
											{
												$aantalposts++;
											}
											print $aantalposts;
										?>
									</b>
								</center>
							</div>
							<div class="categorielastpost" onClick="window.location.href='yourlinklocationhere'">
								<b>Laatste bericht 1</b></br>
								<i>Op datum door poster</i>
							</div>
						</div>
						<div class ="eindfloat"></div>
						<div class="categoriefooter"></div>
						<?php
					}
					$parent_id = $_GET['id'];
					$result = mysql_query("SELECT * FROM comments WHERE comment_parent_id=0 AND comment_forum_parent_id=$parent_id");
					while ($topic = mysql_fetch_array($result))
					{
						?>
						<div class="categorieforumcontainer">
							<div class="categorieforumhok" onClick="window.location.href='topics.php?id=<?php print $topic['comment_id'];?>'">
								<b>Topic: <?php print $topic['comment_title'];?></b><br />
								<?php 
									$temp = $topic['poster_id'];
									$result3 = mysql_query("SELECT * FROM users WHERE user_id=$temp");
									$result3 = mysql_fetch_array($result3);
								?>
								<i>Gepost door <?php print $result3['user_name'];?></i>
							</div>
							<div class="categorieposthok">
								<center>
									<b>
										-
									</b>
								</center>
							</div>
							<div class="categorieposthok">
								<center>
									<b>
										-
									</b>
								</center>
							</div>
							<div class="categorieposthok">
								<center>
									<b>
										<?php
											$forum_id = $topic['comment_parent_id'];
											$result5 = mysql_query("SELECT * FROM comments WHERE comment_forum_parent_id=$forum_id");
											$aantalposts = 0;
											
											while (mysql_fetch_array($result5))
											{
												$aantalposts++;
											}
											$aantalposts++;
											print $aantalposts;
										?>
									</b>
								</center>
							</div>
							<div class="categorielastpost" onClick="window.location.href='yourlinklocationhere'">
								<b>Laatste bericht 1</b></br>
								<i>Op datum door poster</i>
							</div>
						</div>
						<div class ="eindfloat"></div>
						<div class="categoriefooter"></div>
						<?php
					}
				?>
			</div>
		</div>
	</div>

<?php
include '/include/footer.php';
?>