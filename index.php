<?php
// Check if action is set
if(isset($_POST['prefs']))
{	
include('./admin/connect.php');
			//get form info
		$prefs = $_POST['prefs'];
		$id = $_POST['id'];
		$pass = $_POST['password'];
		//look for username and password in the mysql tablea
		$query = "SELECT username, password FROM students WHERE username='".$id."' AND password='".$pass."'";
		$result = mysql_query($query);
		//check to see if there is any results from the query and let the user in 
		if(mysql_num_rows($result))
		{
			//snag the date so you can tell when they tried to enter there data
			$str_today = date("Y-m-d H:i:s"); 
			//update the table information for choices with the user's
			$query ="UPDATE students SET choice ='".$prefs."', date ='".$str_today."' WHERE username='".$id."' AND password='".$pass."'";
			//$query = "SELECT * FROM students";
			$result = mysql_query($query) or die("SQL Error".mysql_error());
			while($row = mysql_fetch_array($result))
			{
		  		echo $row['first'] . " " . $row['last'];
		  	}
			echo "<h1>Thank you for your submission.</h1>";
			echo "<br>";
		}
		else
		{
			//should redirect to error page with argument for the text to be displayed
			echo "<h2>The login information you have entered is not valid.</h2>";
			echo "<h2>Please try again. Or contact the adminstrator.</h2>";
						echo "<br>";
						echo "<br>";
						echo "<br>";
		}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>Homestead Highschool Parking Lottery</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" type="text/css" href="parking.css">
<script type="text/javascript" src="parking.js"></script>
<link rel="stylesheet" type="text/css" href="niftylayout.css">
<link rel="stylesheet" type="text/css" href="niftyCorners.css">
<link rel="stylesheet" type="text/css" href="niftyPrint.css" media="print">
<script type="text/javascript" src="nifty.js"></script>
<script type="text/javascript" src="layout.js"></script>
</head>

<body>
<div id="container" style="width:800px; height:auto;">

	<div id="header" style="width:auto;">
		<h1><a href="#">Homestead High School Parking Lottery</a></h1>
	</div>

	<div id="sidebar" style="width:auto; height:auto;">
		<form name="lotform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width:200px; height:auto; padding:0;">
			<h3>Your Selections</h3>	
				<ul>
					<li style="text-align:right;"><div style="text-align: left;">ID:</div><input name="id" type="text" size="15" ></li> 		</br>
					<li style="text-align:right;"><div style="text-align: left;">Password: </div><input name="password" type="text" size="15"></li>
					<li><div align="right">1)</div><div id = "1b" ></div></li>
					<li><div align="right">2)</div><div id = "2b" ></div></li>
					<li><div align="right">3)</div><div id = "3b" ></div></li>
					<li><div align="right">4)</div><div id = "4b" ></div></li>
					<li><div align="right">5)</div><div id = "5b" ></div></li>
					<li><div align="right">6)</div><div id = "6b" ></div></li>
					<li><div align="right">7)</div><div id = "7b" ></div></li>
					<li><div align="right">8)</div><div id = "8b" ></div></li>
					<li><div align="right">9)</div><div id = "9b" ></div></li>
					<li><div align="right">10)</div><div id = "10b" ></div></li>
					<li><div align="right">11)</div><div id = "11b" ></div></li>
					<li><div align="right">12)</div><div id = "12b" ></div></li>
					<li><div align="right">13)</div><div id = "13b" ></div></li>
					<li><div align="right">14)</div><div id = "14b" ></div></li>
					<li><div align="right">15)</div><div id = "15b" ></div></li>
					<br><br>
					<li>
						<input type="button" name="Submit" class="btn" value="Submit" onClick = "formsubmit()">
						<input type="button" name="Reset" class="btn" value="Reset" onClick = "formreset()">
					</li>
					<!-- Uncomment to debug   <li><input type="button" name="Debug" class="btn" value="Debug" onClick ="debug()"></li> -->
				    <li><div class="style4">Is something not working properly? <a href="help.php">Click Here.</a> </div></li>
				</ul>	
				<input type="hidden" name="prefs">
			</form>
</div>

<div id="content" style="width:585px; height:auto; min-height:700px; padding:0;">
	<h2>Make Your Selections</h2>
			<p class="style1"> <!-- I don't like this. It's nasty -->
					IMPORTANT! READ THIS: <br>
				<span class="style2">1. Type your ID and password exactly as printed on the slip you received when you paid the down payment.</span>
			</p>
			<p class="style3">2. <em><strong>Click the lots on the diagram </strong></em> in the order of your preference. </p>
			<p class="style3">3. Click Submit when finished. If you make a mistake, click Reset to start over.</p>
				
			<p><img src="./lots.img.php?l=" width="490" height="550" border="0" align="center" id="lots" usemap="#Map"></p>
				
	<map name="Map">
	    <area shape="poly" coords="85,67,149,73,145,92,88,88" href="javascript:fill(11);" >
	    <area shape="poly" coords="149,74,193,89,193,107,181,104,146,92" href="javascript:fill(12);" >
	    <area shape="poly" coords="88,107,88,89,146,96,139,113" href="javascript:fill(13);" >
	    <area shape="poly" coords="139,115,146,97,191,107,196,130" href="javascript:fill(14);" >
	    <area shape="poly" coords="122,136,164,147,166,158,122,152" href="javascript:fill(10);" >
	    <area shape="poly" coords="67,136,89,133,89,180,73,238,58,237,65,205,59,205,67,172" href="javascript:fill(9);" >
	    <area shape="poly" coords="70,322,58,287,64,286,58,254,71,251,76,284,88,312" href="javascript:fill(8);" >
	    <area shape="poly" coords="83,390,58,341,73,332,100,382" href="javascript:fill(6);" >
	    <area shape="poly" coords="74,331,93,319,119,370,101,380" href="javascript:fill(7);" >
	    <area shape="poly" coords="107,436,83,391,100,382,125,427" href="javascript:fill(4);" >
	    <area shape="poly" coords="127,427,101,382,121,371,144,415" href="javascript:fill(5);" >
	    <area shape="poly" coords="131,475,109,437,125,428,146,464" href="javascript:fill(2);" >
	    <area shape="poly" coords="148,464,127,427,145,416,167,452" href="javascript:fill(3);" >
	    <area shape="poly" coords="421,434,431,413,473,424,473,449,446,445" href="javascript:fill(0);" >
	    <area shape="poly" coords="403,470,419,437,473,452,473,487,436,482" href="javascript:fill(1);" >
	</map>
</div>

<div id="footer" style="width:800px;">
<address>
	<font size="1" color="black" face="verdana">
 		&copy; 2010 Patrick Behrens.
	</font>
</address>
</div>
</div>
</body>
</html>
