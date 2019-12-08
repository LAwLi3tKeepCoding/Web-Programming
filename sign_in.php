<?php 
	session_start();
	include("include/util.php");
	$login = $_POST['login'];
	$password = $_POST['password'];
	$path = user_path();

	if(isset($_SESSION['login'])){
		unset($_SESSION['login']);
	}

	if (!file_exists("$path/$login") || strcmp($login,htmlspecialchars($login)) ) {
		header("Location: error.php?type=login1");
	}else{
		$_SESSION['login'] = $login;
		$info = file("$path/$login/info.txt",FILE_IGNORE_NEW_LINES);
		if ($password != $info[0] || strcmp($password,htmlspecialchars($password))) {
			unset($_SESSION['login']);
			header("Location: error.php?type=login2");
		 }else{
			$_SESSION['password'] = $password;
			header("Location: user.php");
		}
	}

?>