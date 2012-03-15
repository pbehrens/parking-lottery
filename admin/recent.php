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
			<th><font face="Arial, Helvetica, sans-serif">Date Registered</font></th>
			<th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Username</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Password</font></th>
			</tr>
			<?php
			//connection
			include('./connect.php');
			//select all the data
			$query = "SELECT * FROM students WHERE date <> '0000-00-00 00:00:00' ORDER BY date DESC";
			$result = mysql_query($query);
			$num = mysql_numrows($result);
			//close up connection
			mysql_close();
			$i=0;
			while ($i < $num) 
			{
				$date = mysql_result($result,$i,"date");
				$first = mysql_result($result,$i,"first");
				$last = mysql_result($result,$i,"last");
				$username = mysql_result($result,$i,"username");
				$password = mysql_result($result,$i,"password");
				?>
			
			<tr>
			<td><font face="Arial, Helvetica, sans-serif"><? echo $date; ?></td> 
			<td><font face="Arial, Helvetica, sans-serif"><? echo $first; ?> <?php echo $last; ?></td> 
			<td><font face="Arial, Helvetica, sans-serif"><? echo $username; ?></font></td>
			<td><font face="Arial, Helvetica, sans-serif"><? echo $password; ?></font></td>
			</tr>
			
			<?php
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
<!-- need a non-floating element to properly calculate container height -->
<div class="clear"></div>

</div> <!-- end main -->

<p class="footer">
</div> <!-- end wrapper -->
</body>
</html>

