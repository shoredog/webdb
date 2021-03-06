<?php
# 		PHP FUNCTIONS FOR SHOREDOG FORUM SYSTEMS
#		COPYRIGHT 2012 - SHOREDOG INCORPORATED

$func = true;

function filterInput($input)
{
	return mysql_real_escape_string(htmlspecialchars($input));	
}

function bbToHtml($input)
{
	$bbarray = array("[b]","[/b]","[i]","[/i]",'[youtube]','[/youtube]','[u]','[/u]','[img]','[/img]','[code]','[/code]','[center]','[/center]','\r\n','\n','\r');
	$htmlarray = array("<b>","</b>","<i>","</i>",'<iframe width="100%" height="250px" src="http://www.youtube.com/embed/','?wmode=opaque" frameborder="0" allowfullscreen></iframe>','<u>','</u>','<img src="','" />','<textarea cols="65" rows="9" class="paneelinvoer" style="width:100%" disabled="disabled">','</textarea>','<center>','</center>','<br />','<br />','<br />');
	$bb = str_replace($bbarray, $htmlarray, $input);
	$bb = addSmileys($bb);
	$bbpatterns = array("/\[link\=(.*)\](.*)\[\/link\]/i");
	$htmlpatterns = array("<a href=\"".((substr("$1",0,4)==="http")?"$1":"http://$1")."\">$2</a>");
	return resursiveQuotes(preg_replace($bbpatterns, $htmlpatterns, $bb));  
	
}

function addSmileys($input)
{
	$folder = "http://websec.science.uva.nl/webdb1231/";
	$smilearray = array(":)", ":(", ":clown:", ":king:", ":P", "(Y)");
	$folder = "<img src=\"".$folder."/images/smile/";
	$close = "\" />";
	$imgarray = array($folder."icon_colors.gif".$close,$folder."icon_pale.gif".$close,$folder."icon_clown.gif".$close,$folder."icon_king.gif".$close,$folder."icon_tongue.gif".$close,$folder."icon_thumright.gif".$close);
	return str_replace($smilearray, $imgarray, $input);
}

function resursiveQuotes($input)
{
    $regex = '#\[quote\=?"?(.*?)"?\]((?:[^[]|\[(?!/?quote\=?"?(.*?)"?\])|(?R))+)\[/quote\]#i';
    if (is_array($input)) 
    {
        $input = '<div class="catbalk" style="border-color:#000; margin-top:5px; padding-top:2px; padding-bottom:2px; height:15px; background-size:17px">Quote' 
			.( (strlen($input[1])>0) ? ' door <strong>'.$input[1].'</strong>' : '' )
			.'</div>'
            .'<div class="quote">'
            .$input[2]
            .'</div>';
    }
    return preg_replace_callback($regex, 'resursiveQuotes', $input);
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

function getForumParents($id, $uitvoer)
{
    $query = sprintf("SELECT * FROM forums WHERE forum_id = %s", $id);
    $result = mysql_query($query) or die(mysql_error());
    $output = mysql_fetch_array($result) or die(mysql_error());
    $uitvoer = '<b><a href="'.(($output['parent_id'] != 0)?'forum':'categorie').'.php?id='.$id.'">'.$output['forum_name'] . '</a></b> - '. $uitvoer;
    if($output['parent_id'] != 0)
    $uitvoer = getForumParents($output['parent_id'], $uitvoer);
    return $uitvoer;
}

function countForumChildren($id, $count)
{
    $query = sprintf("SELECT * FROM forums WHERE parent_id=$id");
    $result = mysql_query($query) or die(mysql_error());
    while ($output = mysql_fetch_array($result))
    {
        $count++;
        $count = countForumChildren($output['forum_id'], $count);
    }
    return $count;
}

function countTopics($id, $count)
{
    $query = sprintf("SELECT * FROM comments WHERE comment_forum_parent_id=$id AND comment_parent_id=0");
    $result = mysql_query($query) or die(mysql_error());
    while ($output = mysql_fetch_array($result))
    {
        $count++;
    }
    return $count;
}

function countSubTopics($id, $count)
{
    $count = countTopics($id, $count);
    $query = sprintf("SELECT * FROM forums WHERE parent_id=$id");
    $result = mysql_query($query) or die(mysql_error());
    while ($output = mysql_fetch_array($result))
    {
        $count = countSubTopics($output['forum_id'], $count);
    }
    return $count;
}

function countPosts($id, $count)
{
    $query = sprintf("SELECT * FROM comments WHERE comment_forum_parent_id=$id");
    $result = mysql_query($query) or die(mysql_error());
    while ($output = mysql_fetch_array($result))
    {
        $count++;
    }
    return $count;
}

function countSubPosts($id, $count)
{
    $count = countPosts($id, $count);
    $query = sprintf("SELECT * FROM forums WHERE parent_id=$id");
    $result = mysql_query($query) or die(mysql_error());
    while ($output = mysql_fetch_array($result))
    {
        $count = countSubPosts($output['forum_id'], $count);
    }
    return $count;
}

function countTopicPosts($id, $count)
{
    $query = sprintf("SELECT * FROM comments WHERE comment_parent_id = $id");
    $result = mysql_query($query) or die(mysql_error());
    while ($output = mysql_fetch_array($result))
    {
        $count++;
        $count = countTopicPosts($output['comment_id'], $count);
    }
    return $count;
}

function getCommentParent($id)
{
    $query = sprintf("SELECT * FROM comments WHERE comment_id=$id");
    $result = mysql_query($query);
    $result = mysql_fetch_array($result);
    if($result['comment_parent_id']!=0)
    {
        $id = getCommentParent($result['comment_parent_id']);
    }
    return $id;
}
?>