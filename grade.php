<?php
/**
 * Created by PhpStorm.
 * User: 1609963
 * Date: 21/04/2017
 * Time: 16:19
 */

// Start a session
session_start();

// include the database script
/*include_once 'db/dbconnect.php';*/

//end any active user session
//unset($_session['user_id']);

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-105658588-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-105658588-1');
    </script>

    <meta charset="utf-8">
    <title>Application Description - WebOil!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Add css file-->
    <!-- <link href="css/styles.css" rel="stylesheet" type="text/css"/>-->
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><!-- Body area start-->
<header>
    <!-- add top navigational bar using bootstrap-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navweboil">
                    <!--<span class="sr-only">Toggle navigation</span>-->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home | WebOil E-Solution</a>
            </div>
            <div class="collapse navbar-collapse" id="navweboil">
                <ul class="nav navbar-nav navbar-right">
                    <!-- check if same user is still same as the active session user and load appropriate menu options -->
                    <?php if (isset($_SESSION['usr_id'])) { ?>
                        <li class="active"><a href="signinindex.php">Home</a></>
                        <li><a href="menu/about.php">About Us</a></li>
                        <li><a href="menu/courses.php">Courses</a></li>
                        <li><a href="menu/assessment.php">Test Yourself</a></li>
                        <li><a href="menu/contact.php">Contact Us</a></li>
                        <li><a href="menu/help.php">Help</a></li>
                        <li><p class="navbar-text"><span
                                        class="glyphicon glyphicon-user">Signed in as <?php echo $_SESSION['usr_name']; ?>
                            </p></li>
                        <li><a href="/index.php"><span class="glyphicon glyphicon-log-out">Log Out</a></li>
                        <form class="navbar-form navbar-right">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <li><a href="index.php">Home</a></>
                        <li><a href="menu/about.php">About Us</a></li>
                        <li><a href="menu/courses.php">Courses</a></li>
                        <li class="active"><a href="menu/assessment.php">Test Yourself</a></li>
                        <li><a href="menu/contact.php">Contact Us</a></li>
                        <li><a href="menu/help.php">Help</a></li>
                        <li><a href="menu/login.php"><span class="glyphicon glyphicon-log-in">Login</a></li>
                        <li><a href="menu/register.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>
                        <form class="navbar-form navbar-right">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['usr_id'])) { ?>
        <?php include 'include/signinheader.php'; ?>
    <?php } else { ?>
        <?php include 'include/header.php'; ?><?php } ?>
</header>
<form>
    <hr> <!-- draw a line-->
</form>
<section>
    <div class="content">
        <div id="page-wrap">

            <h1 style="text-align: center">Your Quiz score for WebOil</h1>

            <?php

            $answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
            $answer4 = $_POST['question-4-answers'];
            $answer5 = $_POST['question-5-answers'];
            $answer6 = "";
            $answer7 = "";

            print(['answer-question-6']) . "<br/>";
            if (!empty($_POST['answer-question-6'])) {
                foreach ($_POST['answer-question-6'] as $selected) {
                    $answer6 = $answer6 . $selected;
                }
            }
            echo $answer6 . "<br/>";

            print(['answer-question-7']);

            if (!empty($_POST['answer-question-7'])) {
                foreach ($_POST['answer-question-7'] as $checked) {
                    $answer7 = $answer7 . $checked;
                }
            }
            echo $answer7 . "<br/>";

            $totalCorrect = 0;

            if ($answer1 == "A") {
                $totalCorrect++;
            } else {
                $correctanswer1 = '<h4 style="color: darkgreen">A) Control subsurface pressures</h4>' . "<br/>" . "<br/>";
                $correctanswer1 = "<h3 style='color: blue'>What is drilling Mud used for?</h3>" . "<br/>" . $correctanswer1;
                $correctanswer1 = $correctanswer1 . '<hr style="border: 1px solid black">';
            }

            if ($answer2 == "B") {
                $totalCorrect++;
            } else {
                $correctanswer2 = '<h4 style="color: darkgreen">B) Mud Balance</h4>' . "<br/>" . "<br/>";
                $correctanswer2 = "<h3 style='color: blue'>What instrument is used to measure Mud Weight?</h3>" . "<br/>" . $correctanswer2;
                $correctanswer2 = $correctanswer2 . '<hr style="border: 1px solid black">';
            }
            if ($answer3 == "A") {
                $totalCorrect++;
            } else {
                $correctanswer3 = '<h4 style="color: darkgreen">A) Drilling Superintendent</h4>' . "<br/>" . "<br/>";
                $correctanswer3 = "<h3 style='color: blue'>Which of the following personnel should not be on site during drilling?</h3>" . "<br/>" . $correctanswer3;
                $correctanswer3 = $correctanswer3 . '<hr style="border: 1px solid black">';
            }
            if ($answer4 == "B") {
                $totalCorrect++;
            } else {
                $correctanswer4 = '<h4 style="color: darkgreen">B) Semisubmersible rigs</h4>' . "<br/>" . "<br/>";
                $correctanswer4 = "<h3 style='color: blue'>Which of the following RIG is used offshore?</h3>" . "<br/>" . $correctanswer4;
                $correctanswer4 = $correctanswer4 . '<hr style="border: 1px solid black">';
            }
            if ($answer5 == "D" or $answer5 == "ABC") {
                $totalCorrect++;
            } else {
                $correctanswer5 = '<h4 style="color: darkgreen">A) Oil Based Mud (OBM)</h4>' . "<br/>";
                $correctanswer5 = $correctanswer5 . '<h4 style="color: darkgreen">B) Water Based Mud (WBM)</h4>' . "<br/>";
                $correctanswer5 = $correctanswer5 . '<h4 style="color: darkgreen">C) Gas, aerated muds</h4>' . "<br/>";
                $correctanswer5 = $correctanswer5 . '<h4 style="color: black">OR</h4>' . "<br/>";
                $correctanswer5 = $correctanswer5 . '<h4 style="color: darkgreen">D) All of the above</h4>' . "<br/>";
                $correctanswer5 = "<h3 style='color: blue'>Which of the following is constituent of Mud?</h3>" . "<br/>" . $correctanswer5;
                $correctanswer5 = $correctanswer5 . '<hr style="border: 1px solid black">';
            }
            $correctanswer6 = "";
            if ($answer6 == "ABC" or $answer6 == "D") {
                $totalCorrect++;
            } else {
                $correctanswer6 = '<h4 style="color: darkgreen">A) sub-surface complexity</h4>' . "<br/>";
                $correctanswer6 = $correctanswer6 . '<h4 style="color: darkgreen">B) location</h4>' . "<br/>";
                $correctanswer6 = $correctanswer6 . '<h4 style="color: darkgreen">C) type of well</h4>';
                $correctanswer6 = "<h3 style='color: blue'>The time required to plan and execute a well construction programme is dependent on (select all that apply)?</h3>" . "<br/>" . $correctanswer6 . "<br/>" . "<br/>";
                $correctanswer6 = $correctanswer6 . '<hr style="border: 1px solid black">';
            }

            $correctanswer7 = "";
            echo $answer7 . "<br/>";
            if ($answer7 === "AC") {
                $totalCorrect++;
            } else {
                $correctanswer7 = '<h4 style="color: darkgreen">A) Chemical Discharge Records (DTI or agent)</h4>' . "<br/>";
                $correctanswer7 = $correctanswer7 . '<h4 style="color: darkgreen">C) Incident reporting (DTI/HSE)</h4>' . "<br/>";
                $correctanswer7 = "<h3 style='color: blue'>Which of the following are permits needed before drilling commences?</h3>" . "<br/>" . $correctanswer7 . "<br/>" . "<br/>";
                $correctanswer7 = $correctanswer7 . '<hr style="border: 1px solid black">';
            }

            echo '<hr style="border: 2px solid green">';
            echo "<div id='results'>$totalCorrect / 7 correct</div>";

            if ($totalCorrect === 7) {
                echo '<hr style="border: 2px solid green">';
                echo "<h3 style='color: yellow'>Perfect Score! Proceed to Test yourself in <strong><a href='/menu/assessment.php'>Well Control</a> </strong></h3>";
                echo "What is drilling Mud used for?" . "<br/>" . $correctanswer1 . "<br/>" . "What instrument is used to measure Mud Weight?" . "<br/>" . $correctanswer2 . "<br/>" . "Which of the following personnel should not be on site during drilling?" . "<br/>" . $correctanswer3 . "<br/>" . "Which of the following RIG is used offshore?" . "<br/>" . "Which of the following RIG is used offshore?" . "<br/>" . $correctanswer4 . "<br/>" . "Which of the following is constituent of Mud?" . "<br/>" . $correctanswer5 . "<br/>" . "The time required to plan and execute a well construction programme is dependent on (select all that apply)?" . "<br/>" . $correctanswer6;

            } else {
                echo '<hr style="border: 2px solid green">';
                echo '<h2>Correction</h2>';
                echo '<hr style="border: 2px solid green">';
                $correction = '';
                if ($correctanswer1 !== '') {
                    $correction = $correctanswer1 . "<br/>";
                }
                if ($correctanswer2 !== '') {
                    $correction = $correction . $correctanswer2 . "<br/>";
                }
                if ($correctanswer3 !== '') {
                    $correction = $correction . $correctanswer3 . "<br/>";
                }
                if ($correctanswer4 !== '') {
                    $correction = $correction . $correctanswer4 . "<br/>";
                }
                if ($correctanswer5 !== '') {
                    $correction = $correction . $correctanswer5 . "<br/>";
                }
                if ($correctanswer6 !== '') {
                    $correction = $correction . $correctanswer6 . "<br/>";
                }
                if ($correctanswer7 !== '') {
                    $correction = $correction . $correctanswer7 . "<br/>";
                }
                echo $correction;
                echo '<hr style="border: 2px solid green">';
                echo "<h3><strong><a href='/menu/assessment.php'><button>Go back and try again</button></a> </strong></h3>";
            }


            ?>

        </div>
    </div>

    <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
        var pageTracker = _gat._getTracker("UA-68528-29");
        pageTracker._initData();
        pageTracker._trackPageview();
    </script>

</section><!-- end of section-->
<form>
    <hr> <!-- draw a line-->
</form>
<footer>
    <!-- footer area-->
    <div>
        <?php include 'include/footer.php'; ?>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> <!-- jQuery library -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Latest compiled JavaScript -->
</body>
</html>