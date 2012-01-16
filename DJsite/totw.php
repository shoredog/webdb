<?php $title = "Tune of the Week"; 
include("header.php");  
$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
mysql_select_db($mysqldb);
$query = "SELECT * FROM totw ORDER BY jaar DESC, weeknr DESC LIMIT 0,5"; 
$result = mysql_query($query) or die(mysql_error());?>
    <div class="content3">
    	<img src="afbeeldingen/totwbann.jpg" class="bnnr" /> 
        <?php while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("<h2>TUNE OF WEEK %s (%s)</h2><i>%s</i><br /><br /><center><iframe width=\"590\" height=\"326\" src=\"http://www.youtube.com/embed/%s?rel=0;hd=1\" frameborder=\"0\" allowfullscreen></iframe></center>
         <br /><hr />", $row["weeknr"], $row["jaar"], $row["name"], $row["ytlink"]);
		}
		echo('<br /><br /><b>Archief:</b><br />');
$query = "SELECT * FROM totw ORDER BY jaar DESC, weeknr DESC LIMIT 5,1000"; 
$result = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{
	printf("<a href=\"http://www.youtube.com/watch?v=%s\">Tune of Week %s (%s): <i>%s</i></a><br />", $row["ytlink"], $row["weeknr"], $row["jaar"], $row["name"]);
}
?>
    </div>
    
<?php include("footer.php"); ?>