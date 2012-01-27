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
			<table class="userinfotable">
                <tr>
                    <td>Name:</td>
                    <td><?php print $user['user_name'];?></td>
                </tr>
                <tr>
                    <td>Rank:</td>
                    <td><?php
                        if ($user['rank']==2)
                            print 'admin';
                        else
                            print 'user';?>
                    </td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td><?php print $user['location'];?></td>
                </tr><?php
                    if ($user['show_dob']==1)
                    {?>
                        <tr>
                            <td>Birthdate:</td>
                            <td><?php print date("d-m-Y" , strtotime($user['date_of_birth']));?></td>
                        </tr>
              <?php }
                if (isset($SESSION_['user_id']) && ($_SESSION['user_id'] == $userid))
                { ?>
                    <tr>
                        <td></td>
                        <td>Edit Profile</td>
                    </tr>
          <?php }?>
                <tr>
                    <td>Email:</td>
                    <td><?php print $user['email'];?></td>
                </tr>
			</table>
		</div>
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
                        <div class="forumhok"><?php print $comments['comment_content'];?></div>
                    </div>
          <?php }?>
		</div>
        <?php
            $result4 = mysql_query("SELECT * FROM users WHERE user_id=$userid");
            $temp = mysql_fetch_array($result4);
            if ($temp['reaction_approval'])
            {?>
                <div class="catbalk">Profile comments</div>
                <div class="forumhok">
                    <?php
                        $result3 = mysql_query("SELECT * FROM profilereactions WHERE profile_id=$userid ORDER BY profile_reactions_id DESC LIMIT 10");
                        while ($profileComments = mysql_fetch_array($result3))
                        {?>
                            <div class="profilecomment">
                                <div class="catbalk"><?php
                                    $poster = $profileComments['poster_id'];
                                    $posterTable = mysql_query("SELECT * FROM users WHERE user_id=$poster");
                                    $posterName = mysql_fetch_array($posterTable);
                                    print $posterName['user_name'];
                                ?></div>
                                <div class="forumhok"><?php print $profileComments['content'];?></div>
                            </div>
                  <?php }?>
                </div>
      <?php }?>
	</div>
	<div class="eindfloat"/>
</div>

<?php
include 'include/footer.php';
?>