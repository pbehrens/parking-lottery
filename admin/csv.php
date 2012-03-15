<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Homestead Parking Lottery</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
</head>
<body>
	<div class="wrapper">
		<h1>	Registered Students</h1>
		<div class="nav">
		</div> <!-- end nav -->
		<div class="main">
			<div class="content">
			<table border="0" cellspacing="2" cellpadding="2">
			<tr>
			<th><font face="Arial, Helvetica, sans-serif">Grade</font></th>
			<th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Username</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Password</font></th>
			</tr>
			<?php
			//connection
			include('./connect.php');
			@mysql_select_db(parking) or die( "Unable to select database");
			//select all the data
			$query = "SELECT * FROM students";
			$result = mysql_query($query);
			$num = mysql_numrows($result);
			//close up connection
			mysql_close();
			$i=1;
			while ($i < $num) 
			{
				$first = mysql_result($result,$i,"first");
				$last = mysql_result($result,$i,"last");
				$username = mysql_result($result,$i,"username");
				$password = mysql_result($result,$i,"password");
				$grade = mysql_result($result,$i,"grade");
				echo $first." ".$last.",".$username.",".$password.",".$grade;
				echo "<br>";
				$i++;
			}
			echo "</table>";
				mysql_close();
			?>
		</div> <!-- end content -->
<div class="sidebar">
<ul>
			<?php 
			include('./sidebar.php');
			?>
</ul>
</div> <!-- end sidebar -->
</body>
</html>




