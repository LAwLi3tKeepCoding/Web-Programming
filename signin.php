<?php 
    session_start();
    if (isset($_SESSION['login'])) {
        header("Location: user.php");
    }
?>
<html>
    <head>
        <title>Sign in QuizzMe</title>
        <meta charset="utf-8" />
        <link href="css/signin.css" type="text/css" rel="stylesheet" />
        <script src="js/user.js"></script>
    </head>

    <body>
	    <div id="top_banner">
			    <div><span class="left">Welcome to QuizzMe</span></div>
			    <div class="right">
                    <p>
                        If you do not have an account, please 
                        <a href="signup.php">SIGN UP</a>
                    </p>
			    </div> 
        </div>
        <div class="centerbox">
        <div class="leftbox">
            <a href="homepage.html">
                <img src="images/logo1.png" width="100px"/>
            </a>
            <h2>What kind of questions do we have?</h2>
            <ul>
                <li>Computer Science</li>
                <!-- <li>Art</li> -->
                <li>Security</li>
                <li>Literature</li>
                <li>Music</li>
            </ul>
            <div class="select">
                    Please select the degree of difficulty before test:&nbsp; &nbsp; 
                    <select id= "degree">
                        <option value="easy">EASY</option>
                        <option value="normal">NORMAL</option>
                        <option value="hard">HARD</option>
                        <option value="random">RANDOM</option>
                    </select>
            </div>
            <div class="submit">
                <input class="button" type="submit" value="Start" />
            </div>
        </div>
        <div class="rightbox">
	    <div class="signin_form">
		    <form method="post" action="sign_in.php">
                <h1>SIGN IN</h1>
                <div id="input">
			        <input name="login" type="text" placeholder="Login" required="required"/><br />
			        <input name="password" type="password" placeholder="Password" required="required"/><br />	
                </div>
			    <div class="submit">
				    <input class="button" type="submit" value="Sign in" />
			    </div>
		    </form>
        </div>
        </div>
        </div>
    </body>
</html>