<?php
include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
?>

    <div class="navigation">
    	U bent hier: <b>Forum 1</b>
    </div>
	<div class="categoriecontent">
		<div class="categoriecontainer">
			<div class="categoriecatbalk">Forum 1</div>
			<div class="forforumhok">
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
					$parent_id = $_GET['id'];
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
											$result3 = mysql_query("SELECT * FROM comments WHERE comment_forum_parent_id=$forum_id");
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
									$result2 = mysql_query("SELECT * FROM users WHERE user_id=$temp");
									$result2 = mysql_fetch_array($result2);
								?>
								<i>Gepost door <?php print $result2['user_name'];?></i>
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
									<b>100</b>
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