<?php
	include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
?>

<?php
$categorie_id = $_GET['id'];
$result = mysql_query("SELECT * FROM forums WHERE forum_id=$categorie_id");
$categorie = mysql_fetch_array($result)
?>											
	<div class="navigation">
		U bent hier: <b><?php print $categorie['forum_name'];?></b>
	</div>
		
    <div class="categoriecontent">
		<?php
			$categorie_id = $_GET['id'];
			$result = mysql_query("SELECT * FROM forums WHERE forum_id=$categorie_id");
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
                                ?>
								<div class="categorielastpost" onClick="window.location.href='topics.php?id=<?php print $result3['comment_id']; ?>'">
                                    
									<b><?php print $result3['comment_title']; ?></b></br>
									<i><?php print $result3['comment_date']; ?></i>
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