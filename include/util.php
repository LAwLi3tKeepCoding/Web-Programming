<?php

# returns the relative path of the user folder
function user_path() {
	return "database/user";
}

# returns the relative path of the recodes folder
function record_path($login) {
	return "database/user/".$login."/recodes.txt";
}

# returns the relative path of the questions folder
function questions_path() {
	return "database/questions/";
}

# returns the first name of the user of login $login
function get_name($login) {
	$info = file(user_path() . "/$login/info.txt",FILE_IGNORE_NEW_LINES);
	return $info[1];
}

function arr_glob($degree){
	return glob(questions_path().$degree."/*");
}
# return questions file according degree
function file_questions($degree){	
	if ($degree != "random") {
		$file = arr_glob($degree);
	}else{
		$file = arr_glob("easy");
		$file = array_merge($file, arr_glob("normal"));
		$file = array_merge($file, arr_glob("hard"));
	}
	return $file;
}

function check(){
	
	if ( isset($_SESSION["login"]) ){

	} else{
		header("Location: error.php?type=nologin");
	}
}
# extract the record id (a number) from the file path
# of the file. For example, note_id("2doDB/marc/notes/3") returns "3"
function recode_id($folder) {
	$a= glob("$folder/*");
	$x = basename(array_pop($a));
	return (int)$x +1 ;
}

# returns the title of the $note array
// function get_title($note) {
// 	$no = open_file($note);
// 	return $no[0];
// }

# returns the date of the $note array
// function get_date($note) {
// 	$no = open_file($note);
// 	return $no[1];
// }

# create date
// function new_date() {
// 	date_default_timezone_set('PRC');
// 	return date("Y-m-d h:ia");
// }

//

?>
