<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="style.css" rel="stylesheet" type="text/css" />
		<title>Projectweek HTML 1</title>
	</head>

	<body>
		<div class="container">
			<div class="banner">
				<img src="logo.png" align="middle" />
			</div>
			<div class="menu">
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';" 
									  onClick="window.location.href='index.php'">
					<b>Forum</b>
				</div>
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';" 
									  onClick="window.location.href='profiel.php'">
					<b>Profiel</b>
				</div>
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';"
									  onClick="window.location.href='yourlinklocationhere'">
					<b>Registratie</b>
				</div>
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';"
									  onClick="window.location.href='yourlinklocationhere'">
					<b>Log in</b>
				</div>
			</div>
			<div class="navigation">
				U bent hier: <b>Profiel</b>
			</div>
			<div class="content">
				<div class="userinfoheader">
					<img src="avatar.jpg" width="50px" height="50px" class="avatar" />
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
						<div class="comment">
							<div class="catbalk">Comment 1</div>
							<div class="forumhok">hier staat dan de inhoud van comment 1</div>
						</div>
						<div class="comment">
							<div class="catbalk">Comment 2</div>
							<div class="forumhok">hier staat dan de inhoud van comment 2</div>
						</div>
						<div class="comment">
							<div class="catbalk">Comment 3</div>
							<div class="forumhok">hier staat dan de inhoud van comment 3</div>
						</div>
						<!-- hierbinnen moet met een scriptje de laatste 10 comments van de user
							 worden opgezocht. -->
					</div>
				</div>
				<div class="profilefooter">
				<!-- dit zorgt ervoor dat de body genoeg naar beneden wordt gestrecht ondanks dat
					 content float.-->
				</div>
			</div>
			<div class="footer">
				&copy; 2012 - ShoreDog Power Services, Inc.&trade; (Powered by ShoreDog Forum Engine).
			</div>
		</div>
	</body>
</html>
