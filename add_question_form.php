<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Questions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/addquestions.css">
    </head>
    <body>
        <div id="top_banner">
            <div><span class="left">Add Questions</span></div>
            <div class="right">
                <a href="user.php">BACK</a>
            </div>
        </div>
        <div class="centerbox">
        <div class="form_style">
            <form method="post" action="add_question.php">
                <h1>Please input the question:</h1>
                <textarea id="question" name="question" type="text" placeholder=" Please input the question" required="required"></textarea>
                <h1>Please input the options：</h1>
                <div id="options">
                    <input id="optionA" name="optionA" type="text" placeholder=" Please input the option A" required="required"/><br />
                    <input id="optionB" name="optionB" type="text" placeholder=" Please input the option B" required="required"/><br />
                    <input id="optionC" name="optionC" type="text" placeholder=" Please input the option C" required="required"/><br />
                    <input id="optionD" name="optionD" type="text" placeholder=" Please input the option D" /><br />
                    <input id="optionE" name="optionE" type="text" placeholder=" Please input the option E" /><br />
                </div>
                <h1>Please input the answer:</h1>
                <input id="answer" name="answer" type="text" placeholder=" Please input the answer" required="required"/>
                <h1>Please select the degree of difficulty:</h1>
                <div class="radiobutton">
                    <input value="easy" name="difficulty" type="radio" required="required"/> EASY &nbsp;&nbsp;
                    <input value="normal" name="difficulty" type="radio" required="required"/> NORMAL &nbsp;&nbsp;
                    <input value="hard" name="difficulty" type="radio" required="required"/> HARD &nbsp;&nbsp;
                    <!-- <input value="hell" name="difficulty" type="radio" required="required"/> HELL &nbsp;&nbsp; -->
                </div>
                <h1>Please select the type of question:</h1>
                <div class="radiobutton">
                    <input value="Computer Science" name="type" type="radio" required="required"/> Computer Science &nbsp;&nbsp;
                    <input value="Literature" name="type" type="radio" required="required"/> Literature &nbsp;&nbsp;
                    <input value="Music" name="type" type="radio" required="required"/> Music &nbsp;&nbsp;
                    <input value="Security" name="type" type="radio" required="required"/> Security &nbsp;&nbsp;
                </div>
                <div class="submit">
                    <input class="button" type="submit" value="SUBMIT" />
                </div>
            </form>
        </div>
        </div>
    </body>
</html>