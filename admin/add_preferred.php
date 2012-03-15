
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
				<h1>Add Preferred Student Spot</h1>
				<br>
				<form action="<?php echo $PHP_SELF;?>" method="post">

					Student Parking ID:<input type="text" name="id" /> <br/>
					Add Preferred Spot:<input type="text" name="spot" />
					<input type="submit"  />
				</form> 
<?php

if(isset($_POST['id']))
{
	include('./connect.php');
	$id = $_POST["id"];
	$spot = $_POST["spot"];
	//look for username and password in the mysql tablea
	$query = "SELECT username FROM students WHERE username='".$id."'";
	$result = mysql_query($query) or die("SQL Error".mysql_error());
	//check to see if there is any results from the query and let the user in 
	if(mysql_num_rows($result))
	{
		//snag the date so you can tell when they tried to enter there data
		$str_today = date("Y-m-d H:i:s"); 
		echo "<br>";
		echo $str_today;
		echo "<br>";
		//update the table information for choices with the user's
		$query ="UPDATE students SET spot ='".$spot."', date ='".$str_today."' WHERE username='".$id."'";
		//$query = "SELECT * FROM students";
		echo $query;
		echo "<br>";
		echo "<br>";
		$result = mysql_query($query) or die("SQL Error".mysql_error());
		echo "<br>";
		echo "A preferred spot has been added in spot #";
		echo $spot;
		echo " for the student with the ID ";
		echo $id;
	}
	else if(!mysql_num_rows($result))
	{
		echo "The login information you have entered is not valid or the parking spot is not a valid spot";
	}
	mysql_close();
}
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