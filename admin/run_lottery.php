
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
			</br></br></br></br></br></br></br>
<?php
	run_year();
	function run_year()
	{
			include './lots.php';
			$years = array( 11, 10, 9);	
			foreach ($years as $ayear)
			{
				echo $ayear;
			}
		foreach ($years as $ayear)
		{
			include('./connect.php');
				if(!$link)	
				{
				die('Could not connect: ' . mysql_error());
				
				}
				@mysql_select_db(parking) or die( "Unable to select database");
				//select all students from database
				$query = "SELECT * FROM students WHERE grade='".$ayear."' ORDER BY grade DESC";
				$result = mysql_query($query) or die("SQL Error".mysql_error());
				$num = mysql_numrows($result);
				$i = 0;
				//cycle through all the people in a certain grade and add them to an array that wil be shuffled
				$all_students = array();
					while ($i < $num) 
					{
							$first = mysql_result($result,$i,"first");
							$last = mysql_result($result,$i,"last");
							$username = mysql_result($result,$i,"username");
							$choice = mysql_result($result,$i,"choice");
							$spot = mysql_result($result,$i,"spot");
						//make an array with student data in it
						$student = array($last,$first, $choice, $username, $spot);
						
						//add student data array to an other larger array of arrays
						$all_students[] = $student;
						$i++;
					}
					//randomize all the student data
					shuffle($all_students);
					$chars = chunk_split("abcdefghijklmno");
					echo "<br/>";						
					//get the preferred spots from the db and make an array with them in it
					$query = "SELECT spot FROM students WHERE spot <> 0 ORDER BY grade DESC";
					$result = mysql_query($query) or die("SQL Error".mysql_error());
					$numrows = mysql_numrows($result);
					$pref_spots = array();
					$i = 0;
					while($i < $numrows)
					{
						$spot = mysql_result($result,$i,"spot");
						$pref_spots[] = $spot;
						$i++;
					}
					foreach ($pref_spots as $a_pref_spot)
					{
						
						echo $a_pref_spot;
					}
					echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";
			
					//for each student out of all the students
					foreach($all_students as $student)
					{
						$spot_num = 0;
					
						echo $student[0].', ';
						echo $student[1].', '; 
						echo $student[3]; 
						echo "<br>";
						//echo chunk_split($student[2]);
						//echo the lots students chose
						$choices = $student[2];
						echo $choices;
						echo "<br>";
						echo $student[2];
						//echo $choices[3];
							if($choices == 'none' )
							{
								@mysql_select_db(parking) or die("Unable to connect to the DB");
			
										$query ="UPDATE students SET waitlist='TRUE' WHERE username='".$student[3]."'";
										echo $query;
										$result = mysql_query($query) or die("SQL Error".mysql_error());
									
							}
							else
							{
								$choice_array[] = str_split($choices);
								echo "Test Choice Array";
								echo "<br>";
								foreach($choice_array[0] as $test_choice_value)
								{
									echo $test_choice_value;
									echo ",";
								}
								echo "<br>";
								echo $choices;
								echo "<br>";
								foreach($choice_array[0] as $lot_letter)
								{
									$done = FALSE;
									echo "<br/>";
									$checked_lot = $all_lots[$lot_letter];
									echo $lot_letter." Spots <br/>";
									if($done == FALSE && $student[4] == '0')
									{
										if(sizeof($checked_lot) != 0 )
										{
											echo "First array <br/>";
											foreach($checked_lot as $spot)
											{
											echo $spot.", ";
											}
											$spot_num = array_pop($checked_lot);
											foreach ($pref_spots as $a_pref_spot)
											{
												if($a_pref_spot == $spot_num)
												{
												$spot_num = array_pop($checked_lot);
												}
											}
											echo "<br/>";
											echo "Second array <br/>";
											foreach($checked_lot as $spot)
											{
											echo $spot.", ";
											}
											echo "<br/>";
											echo "<br/>";
											//$spot_num = array_pop($checked_lot);
											$done = TRUE;
											//update the array to display the new lots
											$all_lots[$lot_letter] = $checked_lot;
											//open up mysql connection and add spot info intothe database
											include('./connect.php');
											$query ="UPDATE students SET spot='".$spot_num."' WHERE username='".$student[3]."'";
											echo $query;
											$result = mysql_query($query) or die("SQL Error".mysql_error());
											break;
										}
									}
								}
							}
					unset($choices);
					unset($choice_array);
							echo "<br/>";
							echo "<br/>";	
					}
		}	//loop through the students and find ones with the spot # 0 and put them on the wait list
	}
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

 
 