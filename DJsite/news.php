<?php 
include('config.php');
if(!isset($_GET['id']) || !preg_match("/[0-9]+/", $_GET['id']))
{ 
	$id = 1; 
}
else 
{ 
	$id = intval($_GET['id']); 
}
$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
mysql_select_db($mysqldb);
$query = sprintf("SELECT * FROM news WHERE id=%s", $id); 
$result = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{
	$datetime = strtotime($row['date']);
	$date = date("d-m-Y, H:i", $datetime);
	$content = $row["content"];
	$title = $row['title'];
	$desc = substr(strip_tags($row["content"]),0,250) . "...";
}
 
include("header.php"); ?>
    <div class="content3">
    	<img src="afbeeldingen/losnieuws.jpg" class="bnnr" /> 
        <?php
			printf("<center><h1>%s</h1></center><i>Geplaatst op: %s</i><br /><br />%s<br /><br /><br />", $title, $date, $content);
			printf('<fb:comments href="http://www.daveid.nl/news.php?id=%s" num_posts="3" width="600"></fb:comments>', $id);
		?>
    </div>
   
<?php 
include("footer.php"); ?>