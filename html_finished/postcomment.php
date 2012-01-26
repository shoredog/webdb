<?php
include '/include/header.php';

if (isset($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id'];
}
/* else
{
    header('location: index.php');
} */
;
$topic_id = $_GET['topic_id'];
$forum_id = $_GET['forum_id'];
$result = mysql_query("SELECT * FROM comments WHERE comment_id=$topic_id");
$result = mysql_fetch_array($result);

?>
<!-- ik ga er hier van uit dat in de url het topic_id en het
     forum_id worden meegegeven met deze exacte namen -->
<div class="navigation">
	U bent hier: <b>postcomment</b>
</div>

<div class="content">
	<div class="catbalk">
		New reply
	</div>
	<div class="forumhok">
        <form action="postcommentposted.php" method="post">
            <div class="formulier">
                <span><b>Gebruikersnaam:</b></span>
                <span>Tijmen Zwaan <a href="logout ofzo">change user</a></span>
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
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
	</div>
</div>

<?php
include '/include/footer.php';
?>