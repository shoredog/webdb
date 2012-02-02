<?php
	include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
?>
												
	<div class="navigation">
		U bent hier: <b>Index</b>
		<?php 
			if(!empty($_SESSION['user_id']) && $_SESSION['user_rank'] > 1)
			{
				?>
				<div class="navigationright">
					<a href="postforum.php?id=0">Maak categorie</a>
				</div>
				<?php
			} ?>
	</div>
		
    <div class="categoriecontent">
		<?php
			$result = mysql_query("SELECT * FROM forums WHERE parent_id=0");
			while ($categorie = mysql_fetch_array($result))
			{
				?>  
				<div class="categoriecontainer">
					<div class="categoriecatbalk">
						<div class="categoriecatbalkleft">
							<a href="categorie.php?id=<?php print $categorie['forum_id']; ?>"><?php print $categorie['forum_name'];?></a>
						</div>
						<?php 
						if(!empty($_SESSION['user_id']) && $_SESSION['user_rank'] > 1)
						{
							?>
								<div class="categoriecatbalkright">
									<a href="postforum.php?id=<?php print $categorie['forum_id']; ?>">Maak forum</a>
								</div>
							<?php
						} ?>
					</div>
					<div class="catforumhok">
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
						$categorie_id = $categorie['forum_id'];
						$result2 = mysql_query("SELECT * FROM forums WHERE parent_id=$categorie_id");	
						while ($forum = mysql_fetch_array($result2))
						{ 
							$forum_id = $forum['forum_id'];
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
                                    $result3 = mysql_query($query);
                                    $result3 = mysql_fetch_array($result3);
                                    if (!empty($result3['comment_id']))
                                    {
										$poster_id = $result3['poster_id'];
										$poster = mysql_query("SELECT * FROM users WHERE user_id=$poster_id");
										$result4 = mysql_fetch_array($poster);
                                    ?>
                                        <div class="categorielastpost" onClick="window.location.href='topics.php?id=<?php print $result3['comment_id']; ?>'">
                                            
                                            <b><?php print $result3['comment_title']; ?></b></br>
											<i><?php print date("d-m-Y" , strtotime($result3['comment_date'])); ?> door <a style="font-weight:lighter" href="profiel.php?user=<?php print $result4['user_name'];?>"><?php print $result4['user_name'];?></a></i>
                                        </div>
                                    <?php
                                    }
                                    else
                                    { ?>
                                        <div class="categorielastpost" >
                                            <b>Geen laatste bericht</b></br>
                                        </div>
                                    <?php
                                    }
                                    ?>
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