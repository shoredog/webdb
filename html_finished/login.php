<?php
include '/include/header.php';
?>

<div class="navigation">
    U bent hier: <b>Log in</b>
</div>

<div class="content"><h1>Log in</h1>
	<div class="catbalk">Log in</div>
	<div class="forumhok">
		<div class="loginbox">
			<b>Vul hier uw login gegevens in:</b><p />
			<form>
				<div class="loginform">
					Gebruikersnaam:<br />
					<input type="text" name="username" /><p />
					Wachtwoord:<br />
					<input type="password" name="password" />
				</div>
				<p />
				<input type="submit" value="Log in" /><input type="submit" value="Registreer" />
			</form>
		</div>
	</div>
</div>
    
<?php
include '/include/footer.php';
?>