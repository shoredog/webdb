<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Projectweek HTML 1</title>
</head>
<?php include "config.php"; 
mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
mysql_select_db($mysqldb);
function getAllChilds($commentid, $depth){
	$query = sprintf("SELECT * FROM comments WHERE comment_parent_id = %s", $commentid);
	$result = mysql_query($query) or die(mysql_error());
	while($output = mysql_fetch_array($result))
	{
		$userquery = sprintf("SELECT * FROM users WHERE user_id = %s", $output['poster_id']);
		$userresult = mysql_query($userquery) or die(mysql_error());
		$useroutput = mysql_fetch_array($userresult) or die(mysql_error());
		$newwidth = 93 - (4*$depth);
		?>
        	
        	<div class="comment" style="margin-top:20px; width:<?php echo $newwidth ?>%">
			<div class="catbalk2">
			<center><img src="<?php echo($useroutput['avatar']) ?>" width="70px" height="70px" /></center><br />
			<b><?php echo($useroutput['user_name']) ?></b><br />
			<i>Rank: <?php echo($useroutput['rank']) ?></i>
			</div>	
			<div class="forumhok2">
				<?php echo($output['comment_content']) ?>
				<hr style="margin-top:20px" /><br />
				<?php echo($useroutput['signature']) ?>
			</div>
			</div>
            <div style="float:right"><input type="button" value="Reageren!" /></div>
            <div class="eindfloat"></div>
			
    <?php
	getAllChilds($output['comment_id'], $depth + 1);
	}
}



?>
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
									  onClick="window.location.href='register.php'">
					<b>Registratie</b>
				</div>
				<div class="menuitem" onMouseOver="this.style.backgroundColor='#000000';" 
									  onMouseOut="this.style.backgroundColor='#333333';"
									  onClick="window.location.href='login.php'">
					<b>Log in</b>
				</div>
		</div>
    <div class="navigation">
    	U bent hier: <b>Index</b>
    </div>
  <div class="content">
  
	<div class="comment">
    <center><b><u>Beginpost</u></b></center>
    <?php 
	$topicid = $_GET['tid'];
	$query = sprintf("SELECT * FROM comments WHERE comment_id = %s", $topicid);
	$result = mysql_query($query) or die(mysql_error());
	$output = mysql_fetch_array($result) or die(mysql_error());
	$userquery = sprintf("SELECT * FROM users WHERE user_id = %s", $output['poster_id']);
	$userresult = mysql_query($userquery) or die(mysql_error());
	$useroutput = mysql_fetch_array($userresult) or die(mysql_error());
	?>
		<div class="catbalk2">
		<center><img src="<?php echo($useroutput['avatar']) ?>" width="70px" height="70px" /></center><br />
		<b><?php echo($useroutput['user_name']) ?></b><br />
		<i>Rank: <?php echo($useroutput['rank']) ?></i>
		</div>	
		<div class="forumhok2">
			<?php echo($output['comment_content']) ?>
            <hr style="margin-top:20px" /><br />
            <?php echo($useroutput['signature']) ?>
		</div>
		
	</div>
    <div style="float:right"><input type="button" value="Reageren!" /></div>
    <div class="eindfloat"></div>	
    <!-- Rest vd posts -->
    
    <?php 
	
	$query = sprintf("SELECT * FROM comments WHERE comment_parent_id = 1" );
	$result = mysql_query($query) or die(mysql_error());
	while($output = mysql_fetch_array($result))
	{
		$userquery = sprintf("SELECT * FROM users WHERE user_id = %s", $output['poster_id']);
		$userresult = mysql_query($userquery) or die(mysql_error());
		$useroutput = mysql_fetch_array($userresult) or die(mysql_error());
		?>
        	<div class="comment" style="margin-top:20px;">
			<div class="catbalk2">
			<center><img src="<?php echo($useroutput['avatar']) ?>" width="70px" height="70px" /></center><br />
			<b><?php echo($useroutput['user_name']) ?></b><br />
			<i>Rank: <?php echo($useroutput['rank']) ?></i>
			</div>	
			<div class="forumhok2">
				<?php echo($output['comment_content']) ?>
				<hr style="margin-top:20px" /><br />
				<?php echo($useroutput['signature']) ?>
			</div>
			 </div>
             <div style="float:right"><input type="button" value="Reageren!" /></div>
		<div class="eindfloat"></div>
    <?php
	getAllChilds($output['comment_id'],1);
	}
	?>
   
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
   <div style="float:right; width:100%;"><textarea name="commentcontent" class="paneeltext" style="margin-top:20px; width:100%;"></textarea></div>
   <div style="float:right;"><input type="submit" value="Verzenden maar!" /></div>
	</form>
    <div class="eindfloat"></div>
  </div>
    
</div>
<div class="footer">
	&copy; 2012 - ShoreDog Power Services, Inc.&trade; (Powered by ShoreDog Forum Engine).
</div>
<?php
	mysql_close();
?>
</body>
</html>

