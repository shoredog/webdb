<?php
include 'include/config.php';
include 'include/functions.php';
mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
mysql_select_db($mysqldb);
if(isset($_GET['id']) || is_int($_GET['id']))
	$topicid = filterInput($_GET['id']);
else
	$topicid = 1;
$query = sprintf("SELECT * FROM comments WHERE comment_id = %s", $topicid);
$result = mysql_query($query) or die(mysql_error());
$output = mysql_fetch_array($result) or die(mysql_error());
$topictitle = $output['comment_title'];
$forumid = $output['comment_forum_parent_id'];
if($output['comment_parent_id'] != 0) 
{
	$parent = getParent($output['comment_parent_id']);
	header("Location: topics.php?id=$parent&post=$topicid#$topicid");
}
include 'include/header.php';
if (isset($_POST['sendnewpost']) && !empty($_POST['bericht']))
{
    $onderwerp = $_POST['onderwerp'];
    $bericht = $_POST['bericht'];
    $topic_id = $_POST['topic_id'];
    $forum_id = $_POST['forum_id'];
    $poster_id = $_SESSION['user_id'];
    $onderwep = filterInput($onderwerp);
    $bericht = filterInput($bericht);
	mysql_query("INSERT INTO comments (comment_parent_id, comment_forum_parent_id, comment_title, comment_description, comment_content, poster_id)
                VALUES ('$topic_id', '$forum_id', '$onderwerp', '', '$bericht', '$poster_id')") or die(mysql_error());
    $comment_id = mysql_insert_id();
    $result = mysql_query("SELECT * FROM comments WHERE comment_id=$comment_id");
    $result = mysql_fetch_array($result);
    $date = $result['comment_date'];
    $parent_id = getCommentParent($comment_id);
    mysql_query("UPDATE comments SET comment_last_edit='$date' WHERE comment_id=$parent_id");
	header("Location: topics.php?id=$comment_id&scrdwn=1");
}
?>
<script type="text/javascript"> 
// <![CDATA[
	var isOpen = false;
	var xmlobj = null;
    function toggleQuickReaction()
	{
		if(isOpen)
		{
			document.getElementById('quickreactbutton').value = 'Snelle reactie posten';
			document.getElementById('quickreactcontent').style.display = 'none';
			isOpen = false;
		}
		else
		{
			document.getElementById('quickreactbutton').value = 'Snelle reactie verbergen';
			document.getElementById('quickreactcontent').style.display = 'block';
			isOpen = true;
			window.scrollTo(0,document.body.scrollHeight);
		}
	}
	
	function likePost(postid, userid)
	{
		xmlobj = new XMLHttpRequest();
		var url = "like.php?uid="+userid+"&pid="+postid;
		xmlobj.onreadystatechange = function(){
			if(xmlobj.readyState == 4  && xmlobj.status == 200)
			{
				var antwoord = xmlobj.responseText;
				if(parseInt(antwoord) == 0)
				{
					alert("U heeft deze post al geliked!");
				}
				else
				{
					var elementid = "likebtn" + postid;
					document.getElementById(elementid).value = "Like (" + antwoord + ")";
				}
			}
			
		};
		xmlobj.open("GET", url, true);
		//xmlobj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlobj.send(null);
		
	}
// ]]> 
</script>
<?php
function getParent($id)
{
	$query = sprintf("SELECT * FROM comments WHERE comment_id = %s", $id);
	$result = mysql_query($query) or die(mysql_error());
	$output = mysql_fetch_array($result) or die(mysql_error());
	if($output['comment_parent_id'] != 0)
		return getParent($output['comment_parent_id']);
	return $output['comment_id'];
}

function printFullPost($commentid, $depth, $output)
{
	if(isset($_GET['id']))
		$topicid = $_GET['id'];
	else
		$topicid = 1;
	$userquery = sprintf("SELECT * FROM users WHERE user_id = %s", $output['poster_id']);
	$userresult = mysql_query($userquery) or die(mysql_error());
	$useroutput = mysql_fetch_array($userresult) or die(mysql_error());
	$newwidth = 95 - (4*$depth);
	if($newwidth < 77) $newwidth = 77;
	?>
    <a name="<?php echo($output['comment_id']) ?>"></a>
	<div class="comment" style="margin-top:20px; width:<?php echo $newwidth ?>%">
    <center><b><?php echo($output['comment_title']); ?></b></center><br />
	<div class="catbalk2">
	<center><a href="profiel.php?user=<?php echo($output['poster_id']) ?>"><img src="<?php echo(($useroutput['avatar'] != NULL)?$useroutput['avatar']:'images/defaultava.jpg') ?>" width="70px" height="70px" /></center><br />
	<b><?php echo($useroutput['user_name']);?></b></a><br />
    
	Rank: <?php global $userranks; echo($userranks[$useroutput['rank']]); ?><br />
    Posts:
    <?php
		$pid = $output['poster_id'];
		echo(mysql_num_rows(mysql_query("SELECT * FROM comments WHERE poster_id = $pid")));
	?>
	</div>	
	<div class="forumhok2">
		<?php echo(BbToHtml($output['comment_content'])); ?>
		<hr style="margin-top:20px" /><br />
		<?php echo(BbToHtml($useroutput['signature'])) ?>
	</div>
	<div style="float:right">
		<form action="postcomment.php" method="get">
        	<?php 
			$comid = $output['comment_id'];
			$likes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE comment_id = '$comid'")); ?>
			<input type="hidden" name="topic_id" value='<?php print $output['comment_id']; ?>'/>
            <input type="button" value="Scroll naar boven" class="topic" onclick="window.scrollTo(0,0)" />
            <input type="button" value="Verkrijg URL" class="topic" onclick="prompt('De URL voor deze post is:','<?php echo($_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF'].'?id='.$topicid.'&post='.$output['comment_id'].'#'.$output['comment_id']) ?>')" />
            <?php
			if(isset($_SESSION['user_id']))
			{
				?>
				<input type="button" value="Like (<?php echo $likes; ?>)" class="topic" id="likebtn<?php echo $output['comment_id']; ?>" onclick="likePost(<?php echo $output['comment_id']; ?>, <?php echo $_SESSION['user_id']; ?>)" />
				<input type="button" value="Reageren" class="topic" onclick="window.location.href='postcomment.php?topic_id=<?php echo($output['comment_id']); ?>'" />
				<?php
			}
			?>
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
<?php
	if(isset($_GET['id']))
		$topicid = $_GET['id'];
	else
		$topicid = 1;
	$query = sprintf("SELECT * FROM comments WHERE comment_id = %s", $topicid);
	$result = mysql_query($query) or die(mysql_error());
	$output = mysql_fetch_array($result) or die(mysql_error());  ?>
    <div class="navigation">
    	U bent hier: <b><?php echo getForumParents($output['comment_forum_parent_id'], $output['comment_title']) ?></b>
    </div>
  <div class="content">

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
		Rank: <?php global $userranks; echo($userranks[$useroutput['rank']]); ?><br />
    Posts:
    <?php
		$pid = $output['poster_id'];
		echo(mysql_num_rows(mysql_query("SELECT * FROM comments WHERE poster_id = $pid")));
	?>
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
            <?php
			$comid = $output['comment_id'];
			$likes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE comment_id = '$comid'"));
			if(isset($_SESSION['user_id']))
			{
				?>
				<input type="button" value="Like (<?php echo $likes; ?>)" class="topic" id="likebtn<?php echo $output['comment_id']; ?>" onclick="likePost(<?php echo $output['comment_id']; ?>, <?php echo $_SESSION['user_id']; ?>)" />
				<input type="button" value="Reageren" class="topic" onclick="window.location.href='postcomment.php?topic_id=<?php echo($output['comment_id']); ?>'" />
				<?php
			}
			?>
        </form>
    </div></div>
    <div class="eindfloat"></div>	
    <?php
	getAllChilds($topicid,0);
	?>
    
    <?php
		if(isset($_SESSION['user_id']))
		{
	?>
            <div class="quickreaction" name="quickreact">
            	<center><input type="button" value="Snelle reactie posten" class="topic" onclick="toggleQuickReaction()" id="quickreactbutton" /></center>
            <div id="quickreactcontent" style="display:none">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo($topicid) ?>" method="post">
                	<textarea name="bericht" class="paneeltext" style="margin-top:20px; width:100%; height:300px;"></textarea>
                    <input type="hidden" name="onderwerp" value="RE: <?php echo $topictitle ?>" />
                    <input type="hidden" name="topic_id" value="<?php echo($topicid) ?>" />
                    <input type="hidden" name="forum_id" value="<?php echo($forumid) ?>" />
                    <div style="float:right;">
                    	<input type="submit" class="topic" value="Verzenden maar!" name="sendnewpost" />
                   </div>
               	</form></div>
            </div>
            <div class="eindfloat"><a name="bottom"></a></div>
          </div>
  
  <?php
		}
		if(isset($_GET['scrdwn']) && $_GET['scrdwn'] == 1)
		{
			?>
            <script type="text/javascript">
				window.scrollTo(0,document.body.scrollHeight);
			</script>
            <?php	
		}
  ?>
    
<?php
include '/include/footer.php';
?>