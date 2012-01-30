<?php 
    include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());

    if (!isset($_GET['user']))
    {
        if (isset($_SESSION['user_id']))
        {
            $userid = $_SESSION['user_id'];
        }
        else
        {
            header('Location: index.php');
        }
    }
    else
    {
        $userid = $_GET["user"];
    }
?>

<?php
    if (isset($_POST['bericht']))
    {
        $user_id = $_SESSION['user_id'];
        $bericht = $_POST['bericht'];
        mysql_query("INSERT INTO profilereactions (poster_id, profile_id, content, approved)
                    VALUES ('$user_id', '$userid', '$bericht', '1')") or die(mysql_error());
    }
?>
<div class="navigation">
	U bent hier: <b>Profiel</b>
</div>

<div class="content">
	<div class="userinfoheader">
        <?php
            $result = mysql_query("SELECT * FROM users WHERE user_id=$userid");
            $user = mysql_fetch_array($result);
            print "<img src=\"" . $user['avatar'] . "\" class=\"avatar\">";
            print "<h1>" . $user['user_name'] . "</h1>";
            print "<h2>" . $user['signature'] . "</h2>";
        ?>
	</div>
	<div class="profileinfo">
		<div class="catbalk">User Information</div>
		<div class="forumhok">
			<div class="userinfotable">
                <div class="row">
                    <div class="cell">Name:</div>
                    <div class="cell"><?php print $user['user_name'];?></div>
                </div>
                <div class="row">
                    <div class="cell">Rank:</div>
                    <div class="cell"><?php
                        if ($user['rank']==2)
                            print 'admin';
                        else
                            print 'user';?>
                    </div>
                </div>
                <div class="row">
                    <div class="cell">Location:</div>
                    <div class="cell"><?php print $user['location'];?></div>
                </div><?php
                    if ($user['show_dob']==1)
                    {?>
                        <div class="row">
                            <div class="cell">Birthdate:</div>
                            <div class="cell"><?php print date("d-m-Y" , strtotime($user['date_of_birth']));?></div>
                        </div>
              <?php } ?>
                <div class="row">
                    <div class="cell">Email:</div>
                    <div class="cell"><?php print $user['email'];?></div>
                </div>
          <?php if (isset($SESSION_['user_id']) && ($_SESSION['user_id'] == $userid))
                { ?>
                    <div class="row">
                        <div class="cell"></div>
                        <div class="cell">Edit Profile</div>
                    </div>
          <?php }?>
			</div>
		</div>
        <?php
            if ($user['reaction_approval'])
            {?>
                <div class="catbalk">Profile comments</div>
                <div class="forumhok">
                    <?php
                        $result3 = mysql_query("SELECT * FROM profilereactions WHERE profile_id=$userid ORDER BY profile_reactions_id DESC LIMIT 10");
                        while ($profileComments = mysql_fetch_array($result3))
                        {?>
                            <div class="profilecomment">
                                <div class="catbalk"><a href="profiel.php?user=<?php
                                    $poster = $profileComments['poster_id'];
                                    print $poster; ?>"><?php
                                    $posterTable = mysql_query("SELECT * FROM users WHERE user_id=$poster");
                                    $posterName = mysql_fetch_array($posterTable);
                                    print $posterName['user_name'];
                                ?></a></div>
                                <div class="forumhok"><?php print $profileComments['content'];?></div>
                            </div>
                  <?php }
                    if (isset($_SESSION['user_id']))
                    { ?>
                        <b><br/>Laat een bericht achter:</b>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="formulier">
                                <textarea name="bericht" cols="60" rows="2" class="paneeltext"></textarea>
                                <input type="submit" value="Submit">
                                <div class="profilefooter"></div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
      <?php }?>
	</div>
	<div class="profilecomments">
		<div class="catbalk">Comments by this user</div>
		<div class="forumhok">
            <?php
                $result2 = mysql_query("SELECT * FROM comments WHERE poster_id=$userid ORDER BY comment_date DESC LIMIT 10");
                while ($comments = mysql_fetch_array($result2))
                {?>
                    <div class="profilecomment">
                        <div class="catbalk"><?php print $comments['comment_title'];?></div>
                        <div class="forumhok"><?php print bbToHtml($comments['comment_content']);?></div>
                    </div>
          <?php }?>
		</div>
	</div>
	<div class="eindfloat"/>
</div>

<?php
include 'include/footer.php';
?>