<?php 

$a = array_merge( range(669, 683) , range(694,706));
$b = array_merge( range(574, 597) , range(611, 627) , range(640, 656));
$c = array_merge( range(214, 229) , range(260, 275));
$d = array_merge( range(120, 135) , range(167, 182));
$e = array_merge( range(199, 213) , range(245, 259));
$f = array_merge( range(105, 119) , range(152, 166));
$g = array_merge( range(183, 198) , range(230, 244));
$h = array_merge( range(89, 104) , range(136, 151));
$i = array_merge( range(276, 305));
$j = array_merge( range(306, 358));
$k = array_merge( range(394, 398) , range(377, 384) , range(360, 371));
$l = array_merge( range(470, 482) , range(502, 512));
$m = array_merge( range(483, 493) , range(513, 528));
$n = array_merge( range(425, 433) , range(447, 458), range(536, 540));
$o = array_merge( range(434, 446) , range(459, 469), range(529, 534));

$all_lots = array( 'a' => $a,'b' => $b,'c' => $c,'d' => $d,'e' => $e,'f' => $f,'g' => $g,'h' => $h,'i' => $i,'j' => $j,'k' => $k,'l' => $l,'m' => $m,'n' => $n,'o' => $o);
$lot_num = array();
$lot =  $all_lots["a"];

		foreach($all_lots as $lot)
		{
		//echo $num.', ';
		echo  $num; //spots contains all the spots for the lot lot_letter
			foreach($lot as $num)
			{
				//echo $num.', ';
				echo $num.", "; //spots contains all the spots for the lot lot_letter
				$lot_num[] = $num;	
			}	
		}
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo sizeof($lot_num);
		echo "<br/>";
		echo "<br/>";
		
		foreach($spots as $num)
		{
		//echo $num.', ';
		echo $num.", "; //spots contains all the spots for the lot lot_letter
		}
?>

