<!-- ik ga er hier van uit dat in de url het topic_id en het
     forum_id worden meegegeven met deze exacte namen
-->

<?php
    include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());
?>
   
<?php
if (isset($_POST['onderwerp']) && isset($_POST['bericht']))
{
    include '/include/functions.php';
    $onderwerp = $_POST['onderwerp'];
    $bericht = $_POST['bericht'];
    $topic_id = $_POST['topic_id'];
    $forum_id = $_POST['forum_id'];
    $poster_id = $_POST['poster_id'];
    $onderwep = filterInput($onderwerp);
    $bericht = filterInput($bericht);

    mysql_query("INSERT INTO comments (comment_parent_id, comment_forum_parent_id, comment_title, comment_description, comment_content, poster_id)
                VALUES ('$topic_id', '$forum_id', '$onderwerp', '', '$bericht', '$poster_id')") or die(mysql_error());
    ?>
    <div class="content">
        <div class="catbalk">
            New Reply
        </div>
        <div class="forumhok">
            Post Succesfull! <br />
            <a href="topics.php?id=<?php print $topic_id; ?>&forum_id=<?php print $forum_id; ?>">Click here to return to the topic</a>
        </div>
    </div>
    <?php
}
else
{
?>
   
<?php  
if (isset($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id'];
}
else
{
    header('location: index.php');
};

if (!isset($_GET['topic_id']))
{
    header('location: errordoc/error404.html');
}
$topic_id = $_GET['topic_id'];
$result = mysql_query("SELECT * FROM comments WHERE comment_id=$topic_id");
$result = mysql_fetch_array($result);
$forum_id = $result['comment_forum_parent_id'];

$temp = mysql_query("SELECT * FROM users WHERE user_id=$user_id");
$temp = mysql_fetch_array($temp);
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
                <div class="profilefooter"></div>
            </div>
            <div class="formulier">
                <span><b>Onderwerp:</b></span>
                <input name="onderwerp" type="text" value="<?php print $result['comment_title'];?>" maxlength="250" class="paneelinvoer" />
                <div class="profilefooter"></div>
            </div>
            <div class="formulier">
                <span><b>Bericht:</b></span>
                <textarea name="bericht" cols="60" rows="15" class="paneeltext"></textarea>
                <div class="profilefooter"></div>
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