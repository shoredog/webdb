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
