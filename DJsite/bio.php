<?php $title = "Biografie"; 
include("header.php"); ?>
    <div class="content3">
    	<img src="afbeeldingen/bio.jpg" class="bnnr" /> 
        <?php
			$connect = mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
			mysql_select_db($mysqldb);
			$query = sprintf("SELECT * FROM config WHERE title='bio'"); 
			$result = mysql_query($query) or die(mysql_error());
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
			{
				echo($row['content']);
			}
		?>
    </div>
   
<?php include("footer.php"); ?>