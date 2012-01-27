<?php
include 'include/header.php';
?>

<div class="navigation">
	U bent hier: <b>Profiel</b>
</div>

<div class="content">
	<div class="userinfoheader">
		<img src="avatar.jpg" class="avatar" />
		<h1>Tijmen Zwaan</h1>
	</div>
	<div class="profileinfo">
		<div class="catbalk">User Information</div>
		<div class="forumhok">
			<table class="userinfotable">
				<tr>
					<td class="a">Name:</td>
					<td class="a">Tijmen</td>
				</tr>
				<tr>
					<td class="a">Gender:</td>
					<td class="a">Male</td>
				</tr>
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
include 'include/footer.php';
?>