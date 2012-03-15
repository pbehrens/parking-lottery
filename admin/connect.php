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
?>