<?php
include 'include/header.php';
?>

<div class="navigation">
		<?php
		echo "$alglocatie <b>Log in</b>";
		?>
</div>

<div class="content"><h1>Log out</h1>
	<div class="catbalk">Log out</div>
	<div class="forumhok">
		<div class="loginbox">
			<?php
			session_unset();
			?>
			Uw bent nu uitgelogt.<br />
			Klik <a href="index.php">hier</a> om terug te gaan naar de begin pagina
		</div>
	</div>
</div>
    	
<?php	
include 'include/footer.php';
?>
