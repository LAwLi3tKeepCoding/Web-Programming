<?php
	session_start();
	include("include/util.php");

	$type = $_GET["type"];
	if ( $type === "todo" ) {
		$message = "The content of a todo cannot be empty";
		$action = "notes.php";
	} elseif ( $type === "note" ) {
		$message = "The title of a note cannot be empty";
		$action = "notes.php";
	} elseif ( $type === "login1" ) {
		$message = "Your login is incorrect";
		$action = "signin.php";
	} elseif ( $type === "login2" ) {
		$message = "Your  password is incorrect";
		$action = "signin.php";	
	} elseif ( $type === "nickname" ) {
		$message = "Nickname is incorrect";
		$action = "signup.php";
	} elseif ( $type === "logup" ) {
		$message = "Username is incorrect";
		$action = "signup.php";
	} elseif ( $type === "pwdup1" ) {
		$message = "Password is incorrect";
		$action = "signup.php";		
	} elseif ( $type === "pwdup2" ) {
		$message = "Password Agin is incorrect";
		$action = "signup.php";		
	} elseif ( $type === "pwdup3" ) {
		$message = "Two password is not identical";
		$action = "signup.php";		
	} else { # type === nologin
		$message = "You must sign in to use QuizzMe";
		$action = "signin.php";
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>2DO</title>
    <meta charset="utf-8" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
  </head>
<body>
	
	<div id="top_banner">
	
<?php
	if ( isset($_SESSION["login"]) ) {
		$name = get_name($_SESSION["login"]);
?>
		<span class="left"><?=$name?>'s <span id="logo">QuizzMe</span> </span>
<?php
	} else {
?>
		<span class="left">Welcome to <span id="logo">QuizzMe</span> your personal tests!</span>
<?php
	}
?>
	</div>
	
	<div id="content">
		<form method="get" action="<?=$action?>">
			<div id="error">
				<div><?= $message ?></div>
				<input class="button" type="submit" value="OK" />
			</div>
		</form>
		
</div>
</body>
</html>