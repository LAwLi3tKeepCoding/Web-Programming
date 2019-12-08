<?php
	include("include/util.php");
	$nickname = $_POST['nickname'];
	$login = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$path = user_path();
	#if session has been set then clear session
	if(isset($_SESSION['login'])){
		unset($_SESSION['login']);
	}
	if (empty(trim($nickname)) || strcmp($nickname, htmlspecialchars($nickname))) {
		header("Location: error.php?type=nickname");
	}
	elseif (empty(trim($login)) || strcmp($login, htmlspecialchars($login))) {
		header("Location: error.php?type=logup");
	}
	elseif (empty(trim($password1)) || strcmp($password1, htmlspecialchars($password1))) {
		header("Location: error.php?type=pwdup1");
	}
	elseif (empty(trim($password2)) || strcmp($password2, htmlspecialchars($password2))) {
		header("Location: error.php?type=pwdup2");
	}
	elseif (strcmp($password1, $password2)) {
		header("Location: error.php?type=pwdup3");
	}
	elseif (file_exists("$path/$login")) {
		header("Location: error.php?type=logup");
	}else{
		mkdir("$path/$login");
		file_put_contents("$path/$login/recodes.txt","");

		file_put_contents("$path/$login/info.txt","$password1\n$nickname\n");
		header("Location: signin.php");
	}

	?>