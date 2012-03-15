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
	<form action="<?php echo $PHP_SELF;?>" method="post">
		<input name="is_open" value="open" type="radio">Open Lottery  <br/>
		<input name="is_open" value="close" type="radio">Close Lottery
		<input type="submit" />	
	</form> 
	
	<?php 
		$is_open = $_POST["is_open"];
		echo $is_open;
		include('./connect.php');
		$query = "UPDATE settings SET is_open='".$is_open."'";
		$result = mysql_query($query) or die("SQL Error".mysql_error());
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