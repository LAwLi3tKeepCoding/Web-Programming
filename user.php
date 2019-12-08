<?php 
    session_start();
    include("include/util.php");
    check();
    $login = $_SESSION['login'];
    $path = record_path($login);
    $lines = file($path);
    $nickName = get_name($login);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Message QuizzMe</title>
        <meta charset="utf-8" />
        <link href="css/user.css" type="text/css" rel="stylesheet" />
        <script src="js/user.js"></script>
    </head>

    <body>
	    <div id="top_banner">
			<div><span class="left">Welcome <?php echo $nickName ?></span></div>
			<div class="right">
                <a href="logout.php">Logout</a>
			</div>
        </div>
        <div class="centerbox">
        <div class="leftbox">
            <img src="images/logo2.png" height="150px"/>
            <h2><br />What kind of questions do we have?</h2>
            <ul>
                <li>Computer Science</li>
                <!-- <li>Art</li> -->
                <li>Security</li>
                <li>Literature</li>
                <li>Music</li>
            </ul>
            <h2><a href="add_question_form.php">Click to Add New Questions</a></h2>
        </div>
        <div class="rightbox">
	        <div class="right_top">
                <h1>Start Your Test</h1>
                <div class="select">
                    Please select the degree of difficulty<br />
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
            <div class="right_bottom">
                <h1>Test History</h1>
                <table frame="below">
                    <?php 
                        if ($lines > 0) {
                            $i = 1;
                            foreach ($lines as $line) {
                                $arr = explode("-", $line);?> 
                                <tr>
                                  <td id="lineid">&nbsp <?php echo $i ?>&nbsp</td>
                                  <td id="time">&nbspTest time: <span> <?php echo $arr[0] ?> </span>&nbsp</td>
                                  <td id="difficulty">&nbspDegree of difficulty: <span><?php echo $arr[1] ?></span>&nbsp</td>
                                  <td id="score">&nbspScore: <span><?php echo $arr[2] ?></span>&nbsp</td>
                                </tr><?php $i++;
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
        </div>
    </body>
</html>