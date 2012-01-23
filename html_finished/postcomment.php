<?php
include '/include/header.php';
?>

<div class="navigation">
	U bent hier: <b>postcomment</b>
</div>

<div class="content">
	<div class="catbalk">
		New reply
	</div>
	<div class="forumhok">
		<div class="formulier">
			<span><b>Gebruikersnaam:</b></span>
			<span>Tijmen Zwaan <a href="logout ofzo">change user</a></span>
			<div class="profilefooter"></div>
		</div>
		<div class="formulier">
			<span><b>Onderwerp:</b></span>
			<input name="onderwerp" type="text" maxlength="250" class="paneelinvoer" />
			<div class="profilefooter"></div>
		</div>
		<div class="formulier">
			<span><b>Bericht:</b></span>
			<textarea name="bericht" cols="60" rows="15" class="paneeltext">dit moet eigenlijk met javascript gevuld worden.</textarea>
			<div class="profilefooter"></div>
		</div>
		<div>
			<input type="submit" value="Submit">
		</div>
	</div>
</div>

<?php
include '/include/footer.php';
?>