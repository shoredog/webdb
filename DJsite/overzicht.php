<?php $title = "Nieuwsoverzicht"; 
include("header.php"); ?>
    <div class="content3">
    	<img src="afbeeldingen/nieuwsoverzicht.jpg" class="bnnr" /> 
        <?php
			$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
			mysql_select_db($mysqldb);
			$query = sprintf("SELECT * FROM news ORDER BY date DESC"); 
			$result = mysql_query($query) or die(mysql_error());
    		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
			{
				$datetime = strtotime($row['date']);
				$mysqldate = date("d-m-Y, H:i", $datetime);
    			printf("<i>%s</i> <h1>%s</h1>%s... <a href=\"news.php?id=%s\"><b>(lees verder...)</b></a><br /><br /><hr /><br />", $mysqldate, $row['title'], substr(strip_tags($row["content"]),0,50), $row['id']);
			}
		?>
    </div>
   
<?php include("footer.php"); ?>