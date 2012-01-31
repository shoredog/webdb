<?php 
    include 'include/header.php';
    mysql_connect("$mysqlhost","$mysqluser","$mysqlpass") or die(mysql_error());
    mysql_select_db("$mysqldb") or die(mysql_error());

    if (empty($_GET['user']))
    {
        if (!empty($_SESSION['user_id']))
        {
            $userid = $_SESSION['user_id'];
            $isint = "true";
        }
        else
        {
            header('location: index.php');
        }
    }
    else
    {
        if (is_numeric($_GET['user']))
        {
            $isint = "true";
        }
        else
        {
            $isint = "false";
        }
        
        $userid = filterInput($_GET['user']);
    }
    
        if ($isint == "true")
        {
            $result = mysql_query("SELECT * FROM users WHERE user_id=$userid");
        }
        else
        {
            $result = mysql_query("SELECT * FROM users WHERE user_name='$userid'");
        }
        if (!($user = mysql_fetch_array($result)))
        {
            ?>
            <div class="content">
                <div class="catbalk">Error - 404</div>
                <div class="forumhok">User Not Found</div>
            </div>
            <?php
            include("include/footer.php");
            die(mysql_error());
        }
        $userid = $user['user_id'];
?>

<?php
    if (!empty($_POST['bericht']))
    {
        $user_id = $_SESSION['user_id'];
        $bericht = filterInput($_POST['bericht']);
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
            print "<img src=\"" . $user['avatar'] . "\" class=\"avatar\">";
            print "<h1>" . $user['user_name'] . "</h1>";
            print "<h2>" . $user['sub_title'] . "</h2>";
        ?>
	</div>
	<div class="profileinfo">
		<div class="catbalk">User Information</div>
		<div class="forumhok">
			<div class="userinfotable">
                <div class="row">
                    <div class="cellleft">Name:</div>
                    <div class="cellright"><?php print $user['user_name'];?></div>
                    <div class="paneelfooter"></div>
                </div>
                <div class="row">
                    <div class="cellleft">Rank:</div>
                    <div class="cellright"><?php
                        if ($user['rank']==2)
                            print 'admin';
                        else
                            print 'user';?>
                    </div>
                    <div class="paneelfooter"></div>
                </div>
                <?php
                if(!empty($user['location']))
                { ?>
                <div class="row">
                    <div class="cellleft">Location:</div>
                    <div class="cellright"><?php print $user['location'];?></div>
                    <div class="paneelfooter"></div>
                </div>
                <?php
                }
                if ($user['show_dob']==1 && (!empty($user['date_of_birth'])))
                {?>
                    <div class="row">
                        <div class="cellleft">Birthdate:</div>
                        <div class="cellright"><?php print date("d-m-Y" , strtotime($user['date_of_birth']));?></div>
                        <div class="paneelfooter"></div>
                    </div>
                <?php
                }
                if(!empty($user['email']))
                { ?>
                    <div class="row">
                        <div class="cellleft">Email:</div>
                        <div class="cellright"><?php print $user['email'];?></div>
                        <div class="paneelfooter"></div>
                    </div>
                <?php
                }
                if(!empty($user['interests']))
                { ?>
                    <div class="row">
                        <div class="cellleft">Interests:</div>
                        <div class="cellright"><?php print $user['interests'];?></div>
                        <div class="paneelfooter"></div>
                    </div>
                <?php
                }
                if(!empty($user['personal_site']))
                { ?>
                    <div class="row">
                        <div class="cellleft">Website:</div>
                        <div class="cellright"><?php print $user['personal_site'];?></div>
                        <div class="paneelfooter"></div>
                    </div>
                <?php
                }
                if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $userid))
                { ?>
                    <div class="row">
                        <div class="cellleft"></div>
                        <div class="cellright"><a href="usercp/index.php">Edit Profile</a></div>
                        <div class="paneelfooter"></div>
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
                            <div class="profilecomment2">
                                <a href="profiel.php?user=<?php
                                    $poster = $profileComments['poster_id'];
                                    print $poster; ?>"><?php
                                    $posterTable = mysql_query("SELECT * FROM users WHERE user_id=$poster");
                                    $posterName = mysql_fetch_array($posterTable);
                                    print $posterName['user_name'];
                                ?></a><br/>
                                <?php print $profileComments['content'];?>
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
        <div class="catbalk">Biography</div>
        <div class="forumhok">
            <?php
                print $user['biography'];
            ?>
        </div>
		<div class="catbalk">Comments by this user</div>
		<div class="forumhok">
            <?php
                $result2 = mysql_query("SELECT * FROM comments WHERE poster_id=$userid ORDER BY comment_date DESC LIMIT 10");
                while ($comments = mysql_fetch_array($result2))
                {?>
                    <div class="profilecomment">
                        <div class="catbalk"><a href="topics.php?id=<?php print $comments['comment_id']; ?>"><font color="#FFF"><?php print $comments['comment_title'];?></font></a></div>
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