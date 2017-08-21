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
                        <li><a href="menu/submission.php">Submission</a></li>
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
                        <li class="active"><a href="index.php">Home</a></>
                        <li><a href="menu/about.php">About Us</a></li>
                        <li><a href="menu/courses.php">Courses</a></li>
                        <li><a href="menu/assessment.php">Test Yourself</a></li>
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
            $answer6;

            if (!empty($_POST['answer-question-6'])) {
                foreach ($_POST['answer-question-6'] as $check) {
                    echo $check. "<br/>";
                    $answer6 = $answer6 . $_POST['answer-question-6'];
                }
                echo $answer6. "<br/>";
            }


            $totalCorrect = 0;

            if ($answer1 == "A") {
                $totalCorrect++;
            } else {
                $correctanswer1 = "A) Control subsurface pressures" . "<br/>";
                echo "What is drilling Mud used for?" . "<br/>" . $correctanswer1;
            }
            if ($answer2 == "B") {
                $totalCorrect++;
            } else {
                $correctanswer2 = "B) Mud Balance" . "<br/>";
                echo "What instrument is used to measure Mud Weight?" . "<br/>" . $correctanswer2;
            }
            if ($answer3 == "A") {
                $totalCorrect++;
            } else {
                $correctanswer3 = "A) Drilling Superintendent" . "<br/>";
                echo "Which of the following personnel should not be on site during drilling?" . "<br/>" . $correctanswer3;
            }
            if ($answer4 == "B") {
                $totalCorrect++;
            } else {
                $correctanswer4 = "B) Semisubmersible rigs" . "<br/>";
                echo "Which of the following RIG is used offshore?" . "<br/>" . $correctanswer4;
            }
            if ($answer5 == "D") {
                $totalCorrect++;
            } else {
                $correctanswer5 = "D) All of the above" . "<br/>";
                echo "Which of the following is constituent of Mud?" . "<br/>" . $correctanswer5;
            }
            $correctanswer6;
            if ($answer6 == "ABC") {
                $totalCorrect++;
            } else {
                $correctanswer6 = "A) sub-surface complexity" . "<br/>";
                $correctanswer6 = $correctanswer6 . "B) location" . "<br/>";
                $correctanswer6 = $correctanswer6 . "C) type of well";
                echo "The time required to plan and execute a well construction programme is dependent on (select all that apply)?" . "<br/>" . $correctanswer6;
            }
            if ($totalCorrect == 6) {
                echo "What is drilling Mud used for?" . "<br/>" . $correctanswer1 . "<br/>" . "What instrument is used to measure Mud Weight?" . "<br/>" . $correctanswer2 . "<br/>" . "Which of the following personnel should not be on site during drilling?" . "<br/>" . $correctanswer3 . "<br/>" . "Which of the following RIG is used offshore?" . "<br/>" . "Which of the following RIG is used offshore?" . "<br/>" . $correctanswer4 . "<br/>" . "Which of the following is constituent of Mud?" . "<br/>" . $correctanswer5 . "<br/>" . "The time required to plan and execute a well construction programme is dependent on (select all that apply)?" . "<br/>" . $correctanswer6;
            }
            echo "<div id='results'>$totalCorrect / 6 correct</div>";

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