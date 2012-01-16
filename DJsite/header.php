<?php
if(!isset($mysqlhost))
	include('config.php');
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
			if(isset($title))
			{
				echo('<title>' . $title . ' - DJ Dave ID</title>');
				echo('<meta property="og:title" content="' . $title . '"/>');
			}
			else
			{
				echo('<title>DJ Dave ID</title>');
				echo('<meta property="og:title" content="DJ Dave ID"/>');
			}
		?>
        <meta property="og:type" content="musician"/>
        <meta property="og:url" content="<?php echo(curPageURL()); ?>"/>
        <meta property="og:image" content="http://www.daveid.nl/afbeeldingen/faceb.jpg"/>
        <meta property="og:site_name" content="Dave ID"/>
        <meta property="fb:admins" content="100001470546732"/>
		<link href="style.css" rel="stylesheet" type="text/css" />
        <?php
			if(isset($desc))
			{
				echo('<meta name="description" content="' . $desc . '">');
				echo('<meta property="og:description" content="' . $desc . '"/>');
			}
			else
			{
				echo('<meta name="description" content="De website van DJ Dave ID, de nummer 1 DJ in de Zaanstreek en omstreken. Op deze website vind je onder andere mixes, de tune of the week en mijn agenda.">');
				echo('<meta property="og:description" content="De website van DJ Dave ID, de nummer 1 DJ in de Zaanstreek en omstreken. Op deze website vind je onder andere mixes, de tune of the week en mijn agenda."/>');
			}
		?>
       	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.panelgallery-1_1.js"></script>
		<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
    			$('.foto2').cycle({
					fx: 'scrollLeft', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
					timeout: 7500,
					speed: 1000
				});
			});
		</script>
</head>
	<body>
    <div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/nl_NL/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div id="fb-root"></div>
		<center>
        	<div class="container">
				<div class="banner">
                	<b><a href="http://www.facebook.com/dve1209"><img src="afbeeldingen/facebook.png" alt="facebook" border="0" /></a> <a href="http://www.twitter.com/djdaveid/"><img src="afbeeldingen/twitter.png" alt="twitter" border="0" /></a> <a href="http://www.youtube.com/user/david1209nl"><img src="afbeeldingen/youtube.png" alt="yt" border="0" /></a> <a href='http://soundcloud.com/dave-id'><img src="afbeeldingen/soundcloud.png" alt="soundcloud" border="0" /></a></b><br /><br />
                    
             	</div>
    			<div class="links">
    				<?php include("links.php"); ?>
             	</div>
                
                <?php 
					$slider = "<b>Mijn laatste mix:</b> ";
					$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
					mysql_select_db($mysqldb);
					$query = "SELECT * FROM mixes ORDER BY datum DESC LIMIT 0, 1"; 
					$result = mysql_query($query) or die(mysql_error());
					while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
					{
						$extra = sprintf("<a href=\"%s\">%s</a> ", $row['link'], $row['title']);
						$slider .= $extra;
					}
					$slider .= "-- <b>Upcoming partys:</b> ";
					$query = "SELECT * FROM partys ORDER BY datum ASC LIMIT 0, 5"; 
					$result = mysql_query($query) or die(mysql_error());
					while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
					{
						$datetime = strtotime($row['datum']);
						$mysqldate = date("d-m-Y", $datetime);
						if(time()<$datetime)
						{
							$extra = sprintf("%s: %s -- ", $mysqldate, $row['title']);
							$slider .= $extra;
						}
					}
					$slider .= "<b>Tune of the Week:</b> ";
					$query = "SELECT * FROM totw ORDER BY jaar DESC, weeknr DESC LIMIT 0, 1"; 
					$result = mysql_query($query) or die(mysql_error());
					while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
					{
						$extra = sprintf("<a href=\"http://www.youtube.com/watch?v=%s\">%s</a> ", $row['ytlink'], $row['name']);
						$slider .= $extra;
					}
					$slider .= "-- <b>De laatste nieuwsberichten:</b> ";
					$query = "SELECT * FROM news ORDER BY date DESC LIMIT 0, 5"; 
					$result = mysql_query($query) or die(mysql_error());
					while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
					{
						$datetime = strtotime($row['date']);
						$mysqldate = date("d-m-Y", $datetime);
						$extra = sprintf("<a href=\"news.php?id=%s\">%s (%s)</a> -- ", $row['id'], $row['title'], $mysqldate);
						$slider .= $extra;
					}
					$slider = substr($slider,0,-3)
				?>
                
                <marquee ALIGN="Top" LOOP="infinite" DIRECTION="left" HEIGHT=30 WIDTH=900><?php echo($slider) ?></marquee>
                
<div class="fotos">
<div class="foto2">
                        <?php
						$folder = './afbeeldingen/foto/';
						$exts = 'jpg jpeg png gif'; 
						$files = array(); 
						$i = -1; 
						$handle = opendir($folder); 
						$exts = explode(' ', $exts);
						while (false !== ($file = readdir($handle))) 
						{
							foreach($exts as $ext) 
							{ 
								if (preg_match('/\.'.$ext.'$/i', $file, $test)) 
								{
									$uitvoer = sprintf("<img src=\"afbeeldingen/foto/%s\" height=\"180\" width=\"880\" />", $file);
									echo($uitvoer);
								}
							}
						}
						closedir($handle); 
						?>
        			</div>
  				</div>

