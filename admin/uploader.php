<?php
//set target path directory
$target_path = "uploads/";
echo "<a href=\"./index.php\">Click Here to go back to the logins and passwords</a>";
echo "<br>";
echo "<br>";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); //append name of the file to the target path
	//if the move is complete first and last should be uploaded to the database
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) //if sucessful
	{
    	echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    	" has been uploaded";
		$fname = basename( $_FILES['uploadedfile']['name']);
		echo "<br>";
		echo "<br>";
		//connect to db
		include('./connect.php');
		//file handle
		$file_handle = fopen("uploads/".$fname, "r");
		$id = 1;
		//while not the file handler isnt at the end of the file
		while (!feof($file_handle)) 			
		{
			//get each line
			$line_of_text = fgets($file_handle);
			echo "<br>";
			$line_of_text = substr($line_of_text, 1, (strlen($line_of_text) - 3));
			//break up line into last and first name
			$line_of_text = str_replace("'","",$line_of_text);
			echo $line_of_text;
			echo "<br>";
			
			$namedata = explode(',',$line_of_text);
			$last = $namedata[1];
			$first = $namedata[0];
			$grade = $namedata[2];
			
			//  create a password and a userName 
			$pass = newPass();
			$userName = userName($first,$last);
			//$senior = 0;
			//insert everything into the database
			//$query = "INSERT INTO students VALUES ('".$line_of_text[1]."','".$line_of_text[1]."','".$line_of_text[1]."','".$line_of_text[1]."')";
			$query = "INSERT INTO students VALUES (
			'',
			'".$first."',
			'".$last."',
			'".$grade."',
			'".$userName."',
			'".$pass."',
			'none',
			'none',
			'none',
			'null',
			'FALSE')";
			echo $query;
			echo "<br>";
			$result = mysql_query($query) or die("SQL Error".mysql_error());
			//$data = "$id,$last $first,$pass,$senior";
			//echo $data;
			echo "<br>";
			$id = $id +1;
		
			//close up file handle/sql connection
		} 
			fclose($file_handle);
	mysql_close();
	}	
	else
	{
    	echo "There was an error uploading the file, please try again with the proper format";
	}
	
function newPass() 
{
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
	//set seed for randomnesssss
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
	//make pass 8 characters long
    while ($i <= 7) 
	{
		//set random number
        $num = rand() % 33;
		//temporary substring
        $tmp = substr($chars, $num, 1);
		
        $pass = $pass . $tmp;
        $i++;
    }
   $pass = strtolower($pass);
return $pass;
}
//creates a user name using the first 5 chars of the last name then 2 of the first
function userName($first, $last)
{

	$user = substr($last,0,5);
	$user = $user.substr(trim($first, " "),0,4);
	$user = trim($user, " ");
	//strip to lower case 
	$user = strtolower($user);		
	return $user;
}

?>