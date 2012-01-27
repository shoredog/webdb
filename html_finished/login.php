<?php
include '/include/header.php';
?>

<div class="navigation">
		<?php
		echo "$alglocatie <b>Log in</b>";
		?>
</div>

<div class="content"><h1>Log in</h1>
	<div class="catbalk">Log in</div>
	<div class="forumhok">
		<div class="loginbox">
			<b>
				<?php
				echo $inloginfo;
				?>
			</b><p />
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="loginform">
					<?php
					echo $inloguser;
					?>
					<br />
					<input type="text" name="username" /><p />
					<?php
					echo $inlogpass;
					?>
					<br />
					<input type="password" name="password" />
				</div>
				<p />
				<input type="submit" value="Log in" name="login" />
				</form>
				<?php 
					echo "$inlogreg";
				
					if(isset($_POST['login'])){
					
						$qry = sprintf('SELECT * FROM users WHERE user_name=\'%s\' AND password=\'%s\'', filterInput($_POST['username']), sha1($_POST['password'])); 
						$result = mysql_query($qry);
						$userinfo = mysql_fetch_array($result);
						
						$_SESSION['user_id'] = $userinfo['user_id'];
						$_SESSION['user_name'] = $userinfo['user_name'];
						$_SESSION['user_ava'] = $userinfo['avatar'];
						$_SESSION['user_rank'] = $userinfo['rank'];
						$_SESSION['user_lang'] = $userinfo['lang'];
						$_SESSION['user_style'] = $userinfo['style'];
						$_SESSION['user_tview'] = $userinfo['viewtype'];
						$_SESSION['user_sex'] = $userinfo['sex'];
						$_SESSION['user_site'] = $userinfo['personal_site'];
						$_SESSION['user_subtitle'] = $userinfo['sub_title'];
						$_SESSION['user_location'] = $userinfo['location'];
						$_SESSION['user_email'] = $userinfo['email'];
						$_SESSION['user_date_of_birth'] = $userinfo['date_of_birth'];
						$_SESSION['user_show_dob'] = $userinfo['show_dob'];
						$_SESSION['user_interests'] = $userinfo['interests'];
						$_SESSION['user_bio'] = $userinfo['biography'];
						$_SESSION['user_sig'] = $userinfo['signature'];
						
						$_SESSION['ip'] = @$REMOTE_ADDR;
						
						if(mysql_num_rows($result) > 0) {
								
							header("Location: index.php");
						}
						else {
							echo "<p />Het is niet gelukt in te loggen. Controleer uw gegevens en probeer het opnieuw.";
						}
					}
				?>
			
		</div>
	</div>
</div>
    	
<?php	
include '/include/footer.php';
?>
