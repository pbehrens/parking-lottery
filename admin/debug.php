<?php 
$host = "";
$user = "";
$pass = "";
$link = mysql_connect($host, $user, $pass);
	if(!$link)	
	{
	die('Could not connect: ' . mysql_error());
	}
	@mysql_select_db(parking) or die( "Unable to select database");
	$prefs = 'nkomljihfdgecab';
	$query ="UPDATE students SET choice ='".$prefs."'";
	$result = mysql_query($query) or die("SQL Error".mysql_error());
	$query ="UPDATE students SET spot ='0' ";
	$result = mysql_query($query) or die("SQL Error".mysql_error());
	$query ="UPDATE students SET waitlist ='FALSE' ";
	$result = mysql_query($query) or die("SQL Error".mysql_error());
?>