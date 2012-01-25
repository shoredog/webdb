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
	return str_replace($bbarray, $htmlarray, $input);
}
?>