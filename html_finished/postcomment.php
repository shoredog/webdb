<!-- ik ga er hier van uit dat in de url het topic_id
     wordt meegegeven met deze exacte naam.
-->

<?php
    include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
?>
   
<?php
if (!empty($_POST['onderwerp']) && !empty($_POST['bericht']))
{
    $onderwerp = filterInput($_POST['onderwerp']);
    $bericht = filterInput($_POST['bericht']);
    $topic_id = $_POST['topic_id'];
    $forum_id = $_POST['forum_id'];
    $poster_id = $_SESSION['user_id'];
    
    $result = mysql_query("SELECT * FROM comments WHERE poster_id=$poster_id ORDER BY comment_date DESC LIMIT 1");
    $result = mysql_fetch_array($result);
    
    $time = time();
    $comment_date30 =  strtotime($result['comment_date']) + 30;
    if ($time >= $comment_date30)
    {
    mysql_query("INSERT INTO comments (comment_parent_id, comment_forum_parent_id, comment_title, comment_description, comment_content, poster_id)
                VALUES ('$topic_id', '$forum_id', '$onderwerp', '', '$bericht', '$poster_id')") or die(mysql_error());
    $comment_id = mysql_insert_id();
    $result = mysql_query("SELECT * FROM comments WHERE comment_id=$comment_id");
    $result = mysql_fetch_array($result);
    $date = $result['comment_date'];
    $parent_id = getCommentParent($comment_id);
    mysql_query("UPDATE comments SET comment_last_edit='$date' WHERE comment_id=$parent_id");
    ?>
    <div class="content">
        <div class="catbalk">
            New Reply
        </div>
        <div class="forumhok">
            Post Succesfull! <br/>
            <a href="topics.php?id=<?php print $comment_id ?>">Click here to return to the topic</a>
        </div>
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="content">
        <div class="catbalk">
            New Reply
        </div>
        <div class="forumhok">
            You must wait 30 seconds before posting. <br/>
            <a href="topics.php?id=<?php print $topic_id ?>">Click here to return to the topic</a>
        </div>
    </div>
    <?php
    }
}
else
{
?>
   
<?php  
if (!empty($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id'];
}
else
{
    header('location: login.php');
};

if (empty($_GET['topic_id']))
{
    header('index.php');
}
$topic_id = $_GET['topic_id'];
$result = mysql_query("SELECT * FROM comments WHERE comment_id=$topic_id");
$result = mysql_fetch_array($result);
$forum_id = $result['comment_forum_parent_id'];
$poster_id = $result['poster_id'];

$temp = mysql_query("SELECT * FROM users WHERE user_id=$user_id");
$temp = mysql_fetch_array($temp);
$temp2 = mysql_query("SELECT * FROM users WHERE user_id = $poster_id");
$temp2 = mysql_fetch_array($temp2);
?>


<div class="navigation">
	U bent hier: <b>postcomment</b>
</div>

<div class="content">
	<div class="catbalk">
		New reply
	</div>
	<div class="forumhok">
        <form action="postcomment.php" method="post">
            <div class="formulier">
                <span><b>Gebruikersnaam:</b></span>
                <span> <?php print $temp['user_name'] ?> (<a href="logout.php"> Log out</a> )</span>
                <div class="paneelfooter"></div>
            </div>
            <div class="formulier">
                <span><b>Onderwerp:</b></span>
                <input name="onderwerp" type="text" value="RE: <?php print $result['comment_title'];?>" maxlength="250" class="paneelinvoer" />
                <div class="paneelfooter"></div>
            </div>
            <div class="formulier">
                <span><b>Bericht:</b></span>
                <textarea name="bericht" cols="60" rows="15" class="paneeltext">[quote=<?php print $temp2['user_name']; ?>]<?php print $result['comment_content'] ?>[/quote]</textarea>
                <div class="paneelfooter"></div>
            </div>
            <input type="hidden" name="topic_id" value='<?php print $topic_id ?>' />
            <input type="hidden" name="forum_id" value='<?php print $forum_id ?>' />
            <input type="hidden" name="poster_id" value='<?php $user_id ?>' />
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
	</div>
</div>

<?php
}
include 'include/footer.php';
?>