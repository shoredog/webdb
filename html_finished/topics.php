<?php
include 'include/header.php';
mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
mysql_select_db($mysqldb);
function printFullPost($commentid, $depth, $output)
{
	if(isset($_GET['id']))
		$topicid = $_GET['id'];
	else
		$topicid = 1;
	$userquery = sprintf("SELECT * FROM users WHERE user_id = %s", $output['poster_id']);
	$userresult = mysql_query($userquery) or die(mysql_error());
	$useroutput = mysql_fetch_array($userresult) or die(mysql_error());
	$newwidth = 93 - (4*$depth);
	if($newwidth < 77) $newwidth = 77;
	?>
    <a name="<?php echo($output['comment_id']) ?>"></a>
	<div class="comment" style="margin-top:20px; width:<?php echo $newwidth ?>%">
    <center><b><?php echo($output['comment_title']); ?></b></center><br />
	<div class="catbalk2">
	<center><a href="profiel.php?user=<?php echo($output['poster_id']) ?>"><img src="<?php echo(($useroutput['avatar'] != NULL)?$useroutput['avatar']:'images/defaultava.jpg') ?>" width="70px" height="70px" /></center><br />
	<b><?php echo($useroutput['user_name']) ?></b></a><br />
	<i>Rank: <?php echo($useroutput['rank']) ?></i>
	</div>	
	<div class="forumhok2">
		<?php echo(BbToHtml($output['comment_content'])); ?>
		<hr style="margin-top:20px" /><br />
		<?php echo(BbToHtml($useroutput['signature'])) ?>
	</div>
	
	<div style="float:right">
		<form action="postcomment.php" method="get">
			<input type="hidden" name="topic_id" value='<?php print $output['comment_id']; ?>'/>
            <input type="button" value="Verkrijg URL" class="topic" onclick="prompt('De URL voor deze post is:','<?php echo($_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF'].'?id='.$topicid.'&post='.$output['comment_id'].'#'.$output['comment_id']) ?>')" />
            <input type="button" value="Like" class="topic" />
            <input type="button" value="Reageren!" class="topic" onclick="window.location.href='postcomment.php?topic_id=<?php echo($output['comment_id']); ?>'" />
		</form>
	</div></div>
	<div class="eindfloat"></div>
    <?php
}

function getAllChilds($commentid, $depth){
	$query = sprintf("SELECT * FROM comments WHERE comment_parent_id = %s", $commentid);
	$result = mysql_query($query) or die(mysql_error());
	$view = 0;
	while($output = mysql_fetch_array($result))
	{
		if(!isset($_SESSION['user_tview']) || $_SESSION['user_tview'] == 1)
		{
			printFullPost($commentid, $depth, $output);	
		}
		else
		{
			if(isset($_GET['post']) && $_GET['post'] == $output['comment_id'])
			{
				printFullPost($commentid, $depth, $output);
			}
			else
			{
				if(isset($_GET['id']))
					$topicid = $_GET['id'];
				else
					$topicid = 1;
				for($i = 0; $i < $depth*6; $i++)
				{
					if($i > 24) break;
					echo("&nbsp");
				}
				echo('- <a href="'.$_SERVER['PHP_SELF'].'?id='.$topicid.'&post='.$output['comment_id'].'#'.$output['comment_id'].'">'.$output['comment_title'].'</a>');
				echo("<br />");
			}
		}
		getAllChilds($output['comment_id'], $depth + 1);
	}
}

?>
    <div class="navigation">
    	U bent hier: <b>Index</b>
    </div>
  <div class="content">
  <?php
	if(isset($_GET['id']))
		$topicid = $_GET['id'];
	else
		$topicid = 1;
	$query = sprintf("SELECT * FROM comments WHERE comment_id = %s", $topicid);
	$result = mysql_query($query) or die(mysql_error());
	$output = mysql_fetch_array($result) or die(mysql_error());
	if($output['comment_parent_id'] != 0)
		$error = true;
  ?>
  <div class="catbalk" style="margin-bottom:10px; float:right; width:93%; padding-left:3%; padding-right:3%;"><center><?php echo(isset($error)?'Er is een fout opgetreden.':$output['comment_title']) ?></center></div>
	<div class="comment">
    <?php
		if(isset($error))
		{
			echo('Er is een fout opgetreden: er is een ongeldig ID opgegeven.');
			echo('</div><div class="eindfloat"></div></div>');
			include('include/footer.php');
			die();
		}
	?>
    <center><b><u>Beginpost</u></b></center><br />
    <?php
	$userquery = sprintf("SELECT * FROM users WHERE user_id = %s", $output['poster_id']);
	$userresult = mysql_query($userquery) or die(mysql_error());
	$useroutput = mysql_fetch_array($userresult) or die(mysql_error());
	?>
		<div class="catbalk2">
		<center><a href="profiel.php?user=<?php echo($output['poster_id']) ?>"><img src="<?php echo(($useroutput['avatar'] != NULL)?$useroutput['avatar']:'images/defaultava.jpg') ?>" width="70px" height="70px" /></center><br />
		<b><?php echo($useroutput['user_name']) ?></b></a><br />
		<i>Rank: <?php echo($useroutput['rank']) ?></i>
		</div>	
		<div class="forumhok2">
			<?php echo(BbToHtml($output['comment_content'])) ?>
            <hr style="margin-top:20px" /><br />
            <?php echo(BbToHtml($useroutput['signature'])) ?>
		</div>
		
	
    <div style="float:right">
        <form action="postcomment.php" method="get">
            <input type="hidden" name="quote" value='<?php print $output['comment_content'] ?>' />
            <input type="hidden" name="topic_id" value='<?php print $output['comment_id']; ?>'/>
            <input type="button" value="Verkrijg URL" class="topic" onclick="prompt('De URL voor deze post is:','<?php echo($_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF'].'?id='.$topicid) ?>')" />
            <input type="button" value="Like" class="topic" />
            <input type="button" value="Reageren!" class="topic" onclick="window.location.href='postcomment.php?topic_id=<?php echo($topicid); ?>'" />
        </form>
    </div></div>
    <div class="eindfloat"></div>	
    <!-- Rest vd posts -->
    <?php
	getAllChilds($topicid,0);
	?>
    
    <?php
		if(isset($_SESSION['user_id']))
		{
	?>
   
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
   <div style="float:right; width:100%;"><textarea name="commentcontent" class="paneeltext" style="margin-top:20px; width:100%;"></textarea></div>
   <div style="float:right;"><input type="submit" value="Verzenden maar!" name="sendnewpost" /></div>
	</form>
    <div class="eindfloat"></div>
  </div>
  
  <?php
		}
  ?>
    
<?php
include '/include/footer.php';
?>