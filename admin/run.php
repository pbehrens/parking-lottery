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

<div class="main">
	<div class="content">

		Only click this is if you absolutely ready to run the lottery. This can only be done once per year. 

		<form enctype="multipart/form-data" action="run_lottery.php" method="POST">
			<input type="submit" value="Run Lottery" />
			</form>
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



