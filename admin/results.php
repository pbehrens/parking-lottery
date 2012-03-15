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

			<h1>Results</h1>
			<table border="0" cellspacing="2" cellpadding="2">
			<tr>
			<th><font face="Arial, Helvetica, sans-serif">Grade</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Name</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Spot Number</font></th>
			</tr>
			<?php
			//connection
			include('./connect.php');
			//select all the data
			//$query = "SELECT * FROM students WHERE spot <> '0' ORDER BY grade DESC, last ASC";
			$query = "SELECT * FROM students WHERE spot <> '0' ORDER BY spot DESC";
			$result = mysql_query($query);
			$num = mysql_numrows($result);
			//close up connection
			mysql_close();
			$i=0;
			while ($i < $num) 
			{
				$first = mysql_result($result,$i,"first");
				$last = mysql_result($result,$i,"last");
				$spot_number = mysql_result($result,$i,"spot");
				$grade = mysql_result($result,$i,"grade");
				?>
			
			<tr>
			<td><font face="Arial, Helvetica, sans-serif"><? echo $grade; ?></font></td>
			<td><font face="Arial, Helvetica, sans-serif"><? echo $first; ?> <?php echo $last; ?></td> 
			<td><font face="Arial, Helvetica, sans-serif"><? echo $spot_number; ?></font></td>
			</tr>
			
			<?php
				$i++;
			}
			echo "</table>";
			?>
			<h1>Waitlist</h1>
			<table border="0" cellspacing="2" cellpadding="2">
			<tr>
			<th><font face="Arial, Helvetica, sans-serif">Grade</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Name</font></th>
			<th><font face="Arial, Helvetica, sans-serif">Spot Number</font></th>
			</tr>
			
			<?php
			//connection
			include('./connect.php');
			@mysql_select_db(parking) or die( "Unable to select database");
			
			//select all the data
			$query = "SELECT * FROM students WHERE waitlist = 'TRUE' AND date <> '0000-00-00 00:00:00' ORDER BY date DESC";
			$result = mysql_query($query);
			$num = mysql_numrows($result);
			//close up connection
			mysql_close();
			$i=0;
			while ($i < $num) 
			{
				$first = mysql_result($result,$i,"first");
				$last = mysql_result($result,$i,"last");
				$spot_number = mysql_result($result,$i,"spot");
				$grade = mysql_result($result,$i,"grade");
				?>	
			<tr>
			<td><font face="Arial, Helvetica, sans-serif"><? echo $grade; ?></font></td>
			<td><font face="Arial, Helvetica, sans-serif"><? echo $first; ?> <?php echo $last; ?></td> 
			</tr>
			<?php
				$i++;
			}
			echo "</table>";
				mysql_close();
			?>
</div> <!-- end content -->

<div class="sidebar">
	<?php 
			include('./sidebar.php');
			
			?>


</div> <!-- end sidebar -->

<!-- need a non-floating element to properly calculate container height -->
<div class="clear"></div>

</div> <!-- end main -->

<p class="footer">
</div> <!-- end wrapper -->
</body>
</html>

