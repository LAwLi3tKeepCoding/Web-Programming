<?php
	include_once( "include/util.php" );
	$question = $_POST[ "question" ];
	$question = trim( $question );

	$optionA = $_POST[ "optionA" ];
	$optionA = trim( $optionA );

	$optionB = $_POST[ "optionB" ];
	$optionB = trim( $optionB );

	$optionC = $_POST[ "optionC" ];
	$optionC = trim( $optionC );

	$optionD = $_POST[ "optionD" ];
	$optionD = trim( $optionD );

	$optionE = $_POST[ "optionE" ];
	$optionE = trim( $optionE );

	$answer = $_POST[ "answer" ];
	$answer = trim( strtoupper( $answer ) );

	$difficulty = $_POST[ "difficulty"];
	$type = $_POST[ "type" ];

	// Judge if the question, options, and answer entered are empty
	// A, B, C options must be entered in
	if( empty( $question ) )
		echo "<script language=javascript>alert( 'Please input the question!' );history.back();</script>"; 
	else if( empty( $optionA ) )
		echo "<script language=javascript>alert( 'Please input the optionA!' );history.back();</script>"; 
	else if( empty( $optionB ) )
		echo "<script language=javascript>alert( 'Please input the optionB!' );history.back();</script>"; 
	else if( empty( $optionC ) )
		echo "<script language=javascript>alert( 'Please input the optionC!' );history.back();</script>";
	else if( empty( $answer ) )
		echo "<script language=javascript>alert( 'Please input the answer!' );history.back();</script>";

	// Judge whether to enter D, E options
	else{
		$temp = "ABC"; 
		if( !empty( $optionD ) )
			$temp = $temp.'D';
		if( !empty( $optionE ) )
			$temp = $temp.'E';

		// Judge if the answer entered is correct
		if( !checkAnswer( $answer, $temp ) ){
			echo "<script language=javascript>alert( 'Please input the right answer!' );history.back();</script>";
			exit;
		}

		// Create new question file
		$filename = questions_path().$difficulty;
		$id = recode_id( $filename );
		
		// Add the added question to the database
		file_put_contents( questions_path()."$difficulty/$id.txt", $type."\n".$question."\n", FILE_APPEND );
		file_put_contents( questions_path()."$difficulty/$id.txt", 'A. '.$optionA."\n".'B. '.$optionB."\n".'C. '.$optionC."\n", FILE_APPEND );
		if( !empty( $optionD ) )
			file_put_contents( questions_path()."$difficulty/$id.txt", 'D. '.$optionD."\n", FILE_APPEND );
		if( !empty( $optionE ) )
			file_put_contents( questions_path()."$difficulty/$id.txt", 'E. '.$optionE."\n", FILE_APPEND );
		file_put_contents( questions_path()."$difficulty/$id.txt", $answer, FILE_APPEND );
		echo "<script language=javascript>alert( 'Successful addition of question!' );window.location.href=document.referrer;</script>";
	}
	

	function checkAnswer( $s1, $s2 ){
		for ( $i = 0; $i < strlen($s1); $i++ ) {
			if ( strpos( $s2, $s1[$i] ) === false ) {
				return false;
			}
		}
		return true;
	}	

?>