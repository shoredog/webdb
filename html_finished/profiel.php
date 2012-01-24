<?php
    include '/include/header.php';
?>
<?php
    $userid = $_GET["user"];
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
                    if ($user['show_dob']==1){?>
                        <tr>
                            <td>Birthdate:</td>
                            <td><?php print $user['date_of_birth'];?></td>
                        </tr><?php
                    }
                ?>
			</table>
		</div>
	</div>
	<div class="profilecomments">
		<div class="catbalk">Latest Comments</div>
		<div class="forumhok">
            <?php
                $result2 = mysql_query("SELECT * FROM comments WHERE poster_id=$userid ORDER BY comment_date DESC LIMIT 10");
                
                while ($comments = mysql_fetch_array($result2)) {
                    ?>
                    <div class="profilecomment">
                        <div class="catbalk"><?php print $comments['comment_title'];?></div>
                        <div class="forumhok"><?php print $comments['comment_content'];?></div>
                    </div>
                    <?php
                }
            ?>
		</div>
	</div>
	<div class="eindfloat">
	<!-- dit zorgt ervoor dat de body genoeg naar beneden wordt gestrecht ondanks dat
		 content float.-->
	</div>
</div>

<?php
include '/include/footer.php';
?>