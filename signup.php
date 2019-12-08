<html>
    <head>
        <title>Sign up QuizzMe</title>
        <meta charset="utf-8" />
        <link href="css/signup.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
        <div class="leftbox">
            <img src="images/signup1.jpg" />
        </div>
        <div class="top">
            <a href="signin.html">Sign in</a>
            &nbsp&nbsp
            <a href="homepage.html">Homepage</a>
        </div>
	    <div class="rightbox">
            Welcome to QuizzMe<br />Please sign up
            <form method="post" action="sign_up.php">
                <div id="input">
                    <input name="nickname" type="text" placeholder="Nickname" required="required"/><br />
                    <input name="username" type="text" placeholder="Username" required="required"/><br />
                    <input name="password1" type="password" placeholder="Password" required="required"/><br />	
                    <input name="password2" type="password" placeholder="Password Again" required="required"/><br />
                </div>
                <div class="submit">
                    <input class="button" type="submit" value="Sign up" />
                </div>
            </form>
        </div>
    </body>
</html>