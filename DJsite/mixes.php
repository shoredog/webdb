<?php $title = "Mixes"; 
include("header.php"); ?>
    <div class="content3">
    	<img src="afbeeldingen/mixes.jpg" class="bnnr" /> 
        <?php $connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
		mysql_select_db($mysqldb);
		$query = "SELECT * FROM mixes ORDER BY datum DESC"; 
		$result = mysql_query($query) or die(mysql_error());
    	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	printf("%s<br /><br /><b>Tracklist:</b><br />%s<br /><hr />", $row["mp"], $row['tracklist']);
		} ?>
    </div>
    
   
<?php include("footer.php"); ?>