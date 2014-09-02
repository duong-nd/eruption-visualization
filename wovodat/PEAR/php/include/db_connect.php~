<?php

if(true) {
	$link=mysql_connect("localhost", "wovodatuser", "wovodatpassword") or die(mysql_error());
	mysql_query("SET CHARACTER SET utf8",$link);
	mysql_query("SET NAMES utf8",$link);
	mysql_select_db("wovodat") or die(mysql_error());
} else {
	$link=mysql_connect("wovodat.org:3307", "wovodat_view", "+00World") or die(mysql_error());
	mysql_query("SET CHARACTER SET utf8",$link);
	mysql_query("SET NAMES utf8",$link);
	mysql_select_db("wovodat") or die(mysql_error());
}
?>
