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
        $description = filterInput($_POST['description']);
        $forum_id = $_POST['forum_id'];
        $user_id = $_POST['user_id'];
        
        $result = mysql_query("SELECT * FROM comments WHERE poster_id=$user_id ORDER BY comment_date DESC LIMIT 1");
        $result = mysql_fetch_array($result);
        
        $time = time();
        $comment_date30 = strtotime($result['comment_date']) + 30;
        if ($time >= $comment_date30)
        {
        mysql_query("INSERT INTO comments (comment_parent_id, comment_forum_parent_id, comment_title, comment_description, comment_content, poster_id)
                    VALUES ('0', '$forum_id', '$onderwerp', '$description', '$bericht', '$user_id')") or die(mysql_error());
        ?>
        <div class="content">
            <div class="catbalk">
                New Topic
            </div>
            <div class="forumhok">
                Post Succesfull! <br/>
                <a href="topics.php?id=<?php print mysql_insert_id() ?>">Click here to continue to your topic</a>
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
                <a href="forum.php?id=<?php print $forum_id ?>">Click here to return to the topic</a>
            </div>
        </div>
        <?php
        }
    }
    else
    {  
        if (empty($_SESSION['user_id']))
        {
            header('location: login.php');
        };
        if (empty($_GET['forum_id']))
        {
            header('location: index.php');
        }
        $user_id = $_SESSION['user_id'];
        $forum_id = filterInput($_GET['forum_id']);
    ?>

    <?php
        $user = mysql_query("SELECT * FROM users WHERE user_id=$user_id");
        $user = mysql_fetch_array($user);
    ?>

        <div class="navigation">
            U bent hier: <b>Post-topic</b>
        </div>

        <div class="content">
            <div class="catbalk">
                New Topic
            </div>
            <div class="forumhok">
                <form action="posttopic.php" method="post">
                    <div class="formulier">
                        <span><b>Gebruikersnaam:</b></span>
                        <span> <?php print $user['user_name'] ?> (<a href="logout.php">Log out</a>)</span>
                        <div class="paneelfooter"></div>
                    </div>
                    <div class="formulier">
                        <span><b>Onderwerp:</b></span>
                        <input name="onderwerp" type="text" maxlength="250" class="paneelinvoer" />
                        <div class="paneelfooter"></div>
                    </div>
                    <div class="formulier">
                        <span><b>Description:</b></span>
                        <input name="description" type="text" maxlength="250" class="paneelinvoer" />
                        <div class="paneelfooter"></div>
                    </div>
                    <div class="formulier">
                        <span><b>Bericht:</b></span>
                        <textarea name="bericht" cols="60" rows="15" class="paneeltext" ></textarea>
                        <div class="paneelfooter"></div>
                    </div>
                    <input type="hidden" name="forum_id" value="<?php print $forum_id; ?>" />
                    <input type="hidden" name="user_id" value="<?php print $user_id; ?>" />
                    <div>
                        <input type="submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
?>

<?php
include 'include/footer.php';
?>