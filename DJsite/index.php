<?php include("header.php");

// make the connection
$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
		mysql_select_db($mysqldb);
 
// function to add a guest to the counter
function doCount()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "SELECT * FROM counter WHERE c_IP='".mysql_real_escape_string($ip)."'";
    $src = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($src) == 0)
    {
        // add a new record to the database
        $sql = "INSERT INTO counter (c_count, c_IP) VALUES ('1', '".mysql_real_escape_string($ip)."')";
        return (mysql_query($sql) == true) ? TRUE : FALSE; // returns true of false
    }
    else
    {
        // edit a existing record at the database
        $res = mysql_fetch_assoc($src);
        $counter = $res['c_count'];
        $counter++;
        $sql = "UPDATE counter SET c_count='".mysql_real_escape_string($counter)."' WHERE c_ID='".mysql_real_escape_string($res['c_ID'])."'";
        return (mysql_query($sql) == true) ? TRUE : FALSE; // returns true of false
    }
}
 
// get the total unique visits
function getUnique()
{
    $sql = "SELECT count(c_ID) as total FROM counter GROUP BY c_IP";
    $src = mysql_query($sql);
    $res = mysql_fetch_assoc($src);
    return $res['total'];
}
 
// function to know how many visits one ip address has
function getVisits($ip = null)
{
    if($ip != null)
    {
        $sql = "SELECT * FROM counter WHERE c_IP='".mysql_real_escape_string($ip)."'";
        $src = mysql_query($sql);
 
        if(mysql_num_rows($src) != 0)
        {
            $res = mysql_fetch_assoc($src);
            return $res['c_count'];
        }
        else
        {
            return false;
        }
    }
}
 
doCount();

?>
    <div class="content">
    	
    	<center>
        	<img src="afbeeldingen/rel.jpg" class="bnnr" />
       	</center>
    	<?php $connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
		mysql_select_db($mysqldb);
		$query = "SELECT * FROM mixes ORDER BY datum DESC LIMIT 0,1"; 
		$result = mysql_query($query) or die(mysql_error());
    	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	printf("%s", $row["fp"]);
		}
		?>
        <hr />
      	<br /><br />
        <img src="afbeeldingen/totw.jpg" class="bnnr" />
        <?php
		$query = "SELECT * FROM totw ORDER BY jaar DESC, weeknr DESC LIMIT 0,1"; 
		$result = mysql_query($query) or die(mysql_error());
    	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	printf("<i>%s</i><br /><br /><center><iframe width=\"270\" height=\"176\" src=\"http://www.youtube.com/embed/%s?rel=0;hd=1\" frameborder=\"0\" allowfullscreen></iframe></center>
         <br /><hr />", $row["name"], $row["ytlink"]);
}?>
   	</div>
    <div class="content">
    	<center>
        	<img src="afbeeldingen/upcoming.jpg" class="bnnr" />
            </center>  
            <?php
		$query = "SELECT * FROM partys ORDER BY datum ASC LIMIT 0,5"; 
		$result = mysql_query($query) or die(mysql_error());
    	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
		{
			$datetime = strtotime($row['datum']);
			$mysqldate = date("d-m-Y", $datetime);
			if(time()<$datetime)
			{
				if($row['locatie'] == NULL)
					printf("<center><h2>%s</h2></center><b>Stad:</b> %s <br /><b>Datum:</b> %s<hr />", $row["fptitle"], $row["stad"], $mysqldate);
				else
					printf("<center><h2>%s</h2></center><b>Locatie:</b> %s <br /><b>Stad:</b> %s <br /><b>Datum:</b> %s<hr />", $row["fptitle"], $row['locatie'], $row["stad"], $mysqldate);
			}
}?>
          
  	</div>
<?php include("footer.php"); ?>