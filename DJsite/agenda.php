<?php $title = "Agenda";
include("header.php"); ?>
    <div class="content3">
    	<img src="afbeeldingen/agenda.jpg" class="bnnr" /> 
        <?php
		$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
			mysql_select_db($mysqldb);
		$query = "SELECT * FROM partys ORDER BY datum ASC"; 
		$result = mysql_query($query) or die(mysql_error());
    	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
		{
			$datetime = strtotime($row['datum']);
			$mysqldate = date("d-m-Y", $datetime);
			if(time()<$datetime)
			{
				if($row['locatie'] == NULL)
					printf("<center><h1>%s</h1></center><b>Stad:</b> %s <br /><b>Datum:</b> %s<hr />", strtoupper($row["title"]), $row["stad"], $mysqldate);
				else
					printf("<center><h1>%s</h1></center><b>Locatie:</b> %s <br /><b>Stad:</b> %s <br /><b>Datum:</b> %s<hr />", strtoupper($row["title"]), $row['locatie'], $row["stad"], $mysqldate);
			}
}?>
    </div>
   
<?php include("footer.php"); ?>