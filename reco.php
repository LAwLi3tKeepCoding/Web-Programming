<?php
	
	$date = $_GET[ "date" ];
	$degree = $_GET[ "degree" ];
	$score = $_GET[ "score" ];
	$path = $_GET[ "path" ];
	$mesg = $date."-".$degree."-".$score;
	echo $mesg;
	file_put_contents($path, $mesg."\n",FILE_APPEND);

?>