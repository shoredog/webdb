<?php
include('include/config.php');
include('include/functions.php');
mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
mysql_select_db($mysqldb);
if(isset($_GET['uid']))
{
	$userid = filterInput($_GET['uid']);
	$postid = filterInput($_GET['pid']);
	$error = false;
	$query = mysql_query("SELECT * FROM likes WHERE user_id='$userid' AND comment_id='$postid'") or die(mysql_error());
	if(mysql_num_rows($query) == 0)
	{
		$query = mysql_query("SELECT * FROM likes WHERE comment_id=$postid") or die(mysql_error());
		$aantallikes = mysql_num_rows($query) + 1;
		mysql_query("INSERT INTO likes VALUES('$userid','$postid')") or die(mysql_error());
	}
	if(isset($aantallikes))
		echo $aantallikes;
	else
		echo "0";
}
?>