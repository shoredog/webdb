<?php
include '/include/header.php';
?>

<div class="navigation">
<<<<<<< HEAD
		<?php
		echo "$alglocatie <b>Log in</b>";
		?>
=======
    U bent hier: <b>Log in</b>
>>>>>>> 7099fdbdfcf025490693f88ea63a4f0a2d80abdc
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
				<form>
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
				<input type="submit" value="Log in" />
				<?php 
				echo "$inlogreg";
				?>
			</form>
		</div>
	</div>
</div>
    
<?php
include '/include/footer.php';
?>
