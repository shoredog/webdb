<?php
# 		PHP FUNCTIONS FOR SHOREDOG FORUM SYSTEMS
#		COPYRIGHT 2012 - SHOREDOG INCORPORATED


function filterInput($input)
{
	return mysql_real_escape_string(htmlspecialchars($input));	
}

function bbToHtml($input)
{
	$bbarray = array("[b]","[/b]","[i]","[/i]",'[youtube]','[/youtube]','[u]','[/u]','[img]','[/img]','[code]','[/code]','[center]','[/center]','\r\n','\n','\r');
	$htmlarray = array("<b>","</b>","<i>","</i>",'<iframe width="100%" height="250px" src="http://www.youtube.com/embed/','?wmode=opaque" frameborder="0" allowfullscreen></iframe>','<u>','</u>','<img src="','" width="100%"','<textarea cols="65" rows="9" class="paneelinvoer" style="width:100%" disabled="disabled">','</textarea>','<center>','</center>','<br />','<br />','<br />');
	$bb = str_replace($bbarray, $htmlarray, $input);
	$bbpatterns = array("/\[quote\=(.*)\](.*)\[\/quote\]/i", "/\[quote\](.*)\[\/quote\]/i", "/\[link\=(.*)\](.*)\[\/link\]/i");
	$htmlpatterns = array("<div class=\"catbalk\">Quote door $1:</div><div class=\"quote\">$2</div>", "<div class=\"catbalk\">Quote:</div><div class=\"quote\">$1</div>", "<a href=\"".((substr("$1",0,4)==="http")?"$1":"http://$1")."\">$2</a>");
	return preg_replace($bbpatterns, $htmlpatterns, $bb);  
	
}

function isImage($url)
{
	$spliturl = explode(".", $url);
	if(sizeof($spliturl) < 2)
		return false;
	$type = $spliturl[sizeof($spliturl) - 1];
	if($type == "jpg" || $type == "png" || $type == "bmp" || $type == "gif")
		return true;
	return false;
}
?>