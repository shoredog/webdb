<br />
<?php 
$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
		mysql_select_db($mysqldb);
		$query = "SELECT * FROM news ORDER BY date DESC LIMIT 0,25"; 
		$result = mysql_query($query) or die(mysql_error());
    	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$datetime = strtotime($row['date']);
			$mysqldate = date("d-m-Y", $datetime);
    	printf("%s: <a href=\"news.php?id=%s\"><b>%s</b></a><br />", $mysqldate, $row['id'], $row["title"]);
}?>
<br /><br />
<center><a href="overzicht.php"><b>Volledig nieuwsoverzicht</b></a></center>