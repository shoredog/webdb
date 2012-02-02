<?php
	include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
?>
<?php
    $parent_id = $_GET['id'];
    $result = mysql_query("SELECT * FROM forums WHERE forum_id=$parent_id");
    $result = mysql_fetch_array($result);
    $approval = $result['forum_approval_required'];
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
				<?php 
					if(!empty($_SESSION['user_id']) && $_SESSION['user_rank'] > 1)
					{
						?>
							<div class="categoriecatbalkright">
								<a href="postforum.php?id=<?php print $parent_id; ?>">Maak forum</a>
							</div>
						<?php
					}
				?>
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
                                            $count = countForumChildren($forum_id, 0);
                                            print $count;
										?>
									</b>
								</center>
							</div>
							<div class="categorieposthok">
								<center>
									<b>
										<?php
                                            $count = countSubTopics($forum_id, 0);
                                            print $count;
										?>
									</b>
								</center>
							</div>
							<div class="categorieposthok">
								<center>
									<b>
										<?php
                                            $count = countSubPosts($forum_id, 0);
                                            print $count;
										?>
									</b>
								</center>
							</div>
							<?php
                                $query = sprintf("SELECT * FROM comments WHERE comment_forum_parent_id=$forum_id ORDER BY comment_date DESC LIMIT 1");
                                $result4 = mysql_query($query);
                                $result4 = mysql_fetch_array($result4);
                                if(!empty($result4['comment_id']))
                                {
									$poster_id = $result4['poster_id'];
									$poster = mysql_query("SELECT * FROM users WHERE user_id=$poster_id");
									$result6 = mysql_fetch_array($poster);
                                ?>
                                    <div class="categorielastpost" onClick="window.location.href='topics.php?id=<?php print $result4['comment_id']; ?>'">
                                        <b><?php print $result4['comment_title']; ?></b></br>
                                        <i><?php print date("d-m-Y" , strtotime($result4['comment_date'])); ?> door <a style="font-weight:lighter" href="profiel.php?user=<?php print $result6['user_name'];?>"><?php print $result6['user_name'];?></a></i>
                                    </div>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <div class="categorielastpost" >
                                        <b>Geen laatste bericht</b></br>
                                    </div>
                                <?php
                                }
                            ?>
						</div>
						<div class ="eindfloat"></div>
						<div class="categoriefooter"></div>
						<?php
					}
					$parent_id = $_GET['id'];
					$result = mysql_query("SELECT * FROM comments WHERE comment_parent_id=0 AND comment_forum_parent_id=$parent_id ORDER BY comment_last_edit DESC");
					while ($topic = mysql_fetch_array($result))
					{
                        if (!($approval==1 && $topic['comment_approved']==0))
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
								<i>Gepost door <a style="font-weight:lighter" href="profiel.php?user=<?php print $result3['user_name']; ?>"><?php print $result3['user_name'];?></a></i>
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
											$topic_id = $topic['comment_id'];
											$count = countTopicPosts($topic_id, 1);
                                            print $count;
										?>
									</b>
								</center>
							</div>
                            <?php
                                $query2 = sprintf("SELECT * FROM comments WHERE comment_parent_id=$topic_id OR comment_id=$topic_id ORDER BY comment_date DESC LIMIT 1");
                                $result5 = mysql_query($query2);
                                $result5 = mysql_fetch_array($result5);
								$poster_id = $result5['poster_id'];
								$poster = mysql_query("SELECT * FROM users WHERE user_id=$poster_id");
								$result7 = mysql_fetch_array($poster);

                            ?>
                            <div class="categorielastpost" onClick="window.location.href='topics.php?id=<?php print $result5['comment_id']; ?>'">
                                <b><?php print $result5['comment_title']; ?></b></br>
                                        <i><?php print date("d-m-Y" , strtotime($result5['comment_date'])); ?> door <a style="font-weight:lighter" href="profiel.php?user=<?php print $result7['user_name'];?>"><?php print $result7['user_name'];?></a></i>
                            </div>
						</div>
						<div class ="eindfloat"></div>
						<div class="categoriefooter"></div>
						<?php
                        }
					}
				?>
			</div>
		</div>
	</div>

<?php
include '/include/footer.php';
?>