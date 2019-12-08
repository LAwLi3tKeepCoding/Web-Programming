<?php
    session_start();
    include("include/util.php"); 
    $login = "";
    if (isset($_SESSION['login'])) {
       $login =  $_SESSION['login'];
    }
    $path = record_path($login);


    $degree = $_GET['degree'];
    $questions_file = file_questions($degree);
    shuffle($questions_file);

    // The number of questions to test
    define("test_number", 25);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Testing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/test.css">
        <script src="js/main.js"></script>
        <script src="js/simpleajax.js"></script>
    </head>
    <body>
        <div id="timebox">
            Remaining Time: 30:00 <br />
        </div>
        <div class="centerbox">
                   
            <h1>  QuizzMe</h1>         
            <form method="post" class="question">
            <?php 
                for ($i = 0; $i < test_number; $i++) { 
                    $questions = file($questions_file[$i]);
                    $row = count($questions);
                    if ($row > 4) {
                 ?>
                       <div id = <?php echo "question".$i ?>>
                            <h2>Classification: <span><?php echo $questions[0] ?></span></h2> 
                            <p> <?php echo ($i + 1).". ".$questions[1]; ?></p> <?php
                            for ($j=2; $j < $row - 1; $j++) { ?>
                                <input name="option" type="checkbox" required="required" value=<?php  echo ( $j - 2) ?> /> 
                                <?php echo  $questions[$j]; if($j != $row - 2){?> <br />  
                    <?php } }?>       
                            <div id="after" value="ans" class="hidden" ids = <?php echo $questions[$row - 1]; ?>>  
                            </div>
                        </div> 
                    <?php }
                    else{ $i--; } 
                }?>
                <div class="submit">
                    <input class="button" type="button" value="SUBMIT" />
                    <input id = "back" class="button" type="button" value="BACK" />
                </div>
            </form>
            
        </div> 
        <div id = "login" ids = <?php echo $login ?>></div>
        <div id = "record_path" ids = <?php echo $path ?>></div> 
        <div id = "degree" ids = <?php echo $degree ?>></div>   
        <div id = "test_number" ids = <?php echo test_number ?>></div>     
    </body>
</html>