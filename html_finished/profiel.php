<?php
    include '/include/header.php';
?>
<?php
    $user = $_GET["user"];
    $dinges = 'hallo';
?>
<div class="navigation">
	U bent hier: <b>Profiel</b>
</div>

<div class="content">
	<div class="userinfoheader">
        <?php
            $result = mysql_query("SELECT * FROM users WHERE user_id=$user");
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
                <?php
                    print "<tr><td>Name:</td><td>";
                        print $user['user_name'];
                    print "</td></tr>";
                    print "<tr><td>Rank:</td><td>";
                        if ($user['rank']==2)
                            print 'admin';
                        else
                            print 'user';
                    print "</td></tr>";
                    print "<tr><td>Location:</td><td>";
                        print $user['location'];
                    print "</td></tr>";
                    if ($user['show_dob']==1){
                        print "<tr><td>Birthdate:</td><td>";
                            print $user['date_of_birth'];
                        print "</td></tr>";
                    }
                ?>
			</table>
		</div>
	</div>
	<div class="profilecomments">
		<div class="catbalk">Latest Comments</div>
		<div class="forumhok">
			<div class="profilecomment">
				<div class="catbalk">Comment 1</div>
				<div class="forumhok">hier staat dan de inhoud van comment 1</div>
			</div>
			<div class="profilecomment">
				<div class="catbalk">Comment 2</div>
				<div class="forumhok">hier staat dan de inhoud van comment 2</div>
			</div>
			<div class="profilecomment">
				<div class="catbalk">Comment 3</div>
				<div class="forumhok">hier staat dan de inhoud van comment 3</div>
			</div>
			<!-- hierbinnen moet met een scriptje de laatste 10 comments van de user
				 worden opgezocht. -->
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