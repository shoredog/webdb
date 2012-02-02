<?php
    include 'include/header.php';
    mysql_connect($mysqlhost, $mysqluser, $mysqlpass);
    mysql_select_db($mysqldb);
?>

	<?php
		if(!empty($_SESSION['user_id']) && $_SESSION['user_rank'] > 1)
		{ ?>
			<div class="navigation">
				U bent hier: <b>Administratiepaneel - Topic-moderatie</b>
			</div>
			
			<?php
				if (!empty($_GET['comment_id']) && !empty($_GET['approve']))
				{
					$comment_id = filterInput($_GET['comment_id']);
					$approve = filterInput($_GET['approve']);
					if ($approve == 1)
					{
						mysql_query("UPDATE comments SET comment_approved=1 WHERE comment_id=$comment_id");
					}
					if ($approve == 2)
					{
						mysql_query("DELETE FROM comments WHERE comment_id='$comment_id'");
					}
				}
			?>
			<div class="content">
				<div class="paneelmenu">
					<div class="catbalk">
						Menu
					</div>
					<div class="paneelbox">
						<?php
							include 'include/menu.php';
						?>
					</div>
				</div>
				<div class="paneelcontent">
					<div class="catbalk">
						Topic Moderatie
					</div>
					<div class="paneelbox">
						<?php
							$output = mysql_query("SELECT * FROM comments WHERE comment_approved=0 AND comment_parent_id=0");
							while ($result = mysql_fetch_array($output))
							{
								$parent_id = $result['comment_forum_parent_id'];
								$result2 = mysql_query("SELECT * FROM forums WHERE forum_id = $parent_id");
								$result2 = mysql_fetch_array($result2);
								if ($result2['forum_approval_required']==1)
								{
								?>
									<div class="catbalk" style="border-color:#333; margin-top:5px; padding-top:2px; padding-bottom:2px; height:15px; background-size:17px">
										<div class="categoriecatbalkleft" style="width:70%; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
											<a href="../topics.php?id=<?php print $result['comment_id']; ?>"><?php print $result['comment_title'] ?></a>
										</div>
										<div class="categoriecatbalkright" style="width:15px; padding:0px; margin:0px; margin-right:2px;" onClick="window.location.href='topicmod.php?comment_id=<?php print $result['comment_id']; ?>&approve=2'">
											<img src="../images/deny.png" alt="deny" height="15px" width="15px" />
										</div>
										<div class="categoriecatbalkright" style="width:15px; padding:0px; margin:0px; margin-right:2px;" onClick="window.location.href='topicmod.php?comment_id=<?php print $result['comment_id']; ?>&approve=1'">
											<img src="../images/approve.png" alt="approve" height="15px" width="15px" />
										</div>
									</div>
									<div class="forumhok" style="padding:2px;">
										<?php print $result['comment_content'] ?>
									</div>
								<?php
								}
							}
						?>
					</div>
				</div>
				<div class="paneelfooter"></div>
			</div>
		<?php
		}
	?>
		
<?php
    include 'include/footer.php';
?>