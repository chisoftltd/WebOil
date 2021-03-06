<?php
/**
 * Created by PhpStorm.
 * User: Chisoft
 * Date: 2017-08-05
 * Time: 22:35
 */

session_start();
/*
if (!isset($_SESSION['usr_id'])) {
    header("Location: index.php");
    echo "''<h1>.Timed Out!.</h1>";
}*/

include_once '../db/dbconnect.php';

//set validation error flag as false
$error = false;
/*
//check if form is submitted
if (isset($_POST['applyform'])) {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $supervisor = mysqli_real_escape_string($link, $_POST['supervisor']);
    $department = mysqli_real_escape_string($link, $_POST['department']);
    $projecttopic = mysqli_real_escape_string($link, $_POST['projecttopic']);
    $projectdescription = mysqli_real_escape_string($link, $_POST['projectdescription']);
    $startdate = mysqli_real_escape_string($link, $_POST['startdate']);
    $enddate = mysqli_real_escape_string($link, $_POST['enddate']);
    $datadetails = mysqli_real_escape_string($link, $_POST['datadetails']);

    if (mysqli_query($link, "INSERT INTO research(name,supervisor,department, projecttopic, projectdescription, startdate, enddate, datadetails )
VALUES('" . $name . "', '" . $supervisor . "', '" . $department . "','" . $projecttopic . "','" . $projectdescription . "','" . $startdate . "','" . $enddate . "','" . $datadetails . "')")) {
        $successmsg = "Research Ethics Successfuly Registered!";
        header("refresh:5; url=researchtable.php");
    } else {
        $errormsg = "Error in registering...Please try again later!";
    }
}

$result2 = mysqli_query($link, "SELECT id, name, supervisor, projecttopic, startdate, enddate FROM research") or die('cannot show columns from research');
$count = mysqli_num_rows($result2);

// Check if delete button active, start this
if (isset($_POST['deleteform'])) {
    for ($i = 0; $i < $count; $i++) {
        $del_id = $checkbox[$i];
        $sql = "DELETE FROM research WHERE id='$del_id'";
        $result3 = mysqli_query($link, $sql);
    }
// if successful redirect to delete_multiple.php
    if ($result3) {
        echo "Record deleted successfully";
        header("refresh:5; url=officerprojecttable.php");
    }
}*/
?>

<!DOCTYPE html>
<html lang="en">
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

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-5281059387375686",
            enable_page_level_ads: true
        });
    </script>

    <title>OilWeb | Assessment Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/styles.css" type="text/css"/>
    <link rel="stylesheet" href="/css/main-style.css">
    <link rel="stylesheet" href="/css/main-style2.css">
</head>
<body>
<header>
    <!-- add top navigational bar using bootstrap-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navoilweb">
                    <!--<span class="sr-only">Toggle navigation</span>-->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.php">OilWeb | Assessment</a>
            </div>
            <div class="collapse navbar-collapse" id="navoilweb">
                <ul class="nav navbar-nav navbar-right">
                    <!-- check if same user is still same as the active session user and load appropriate menu options -->
                    <?php if (isset($_SESSION['usr_id'])) { ?>
                        <li><a href="/index.php">Home</a></li>
                        <li><a href="/menu/about.php">About Us</a></li>
                        <li><a href="/menu/courses.php">Courses</a></li>
                        <li class="active"><a href="/menu/assessment.php">Assessment</a></li>
                        <li><a href="/menu/submission.php">Test Yourself</a></li>
                        <li><a href="/menu/contact.php">Contact Us</a></li>
                        <li><a href="/menu/help.php">Help</a></li>
                        <li><p class="navbar-text"><span
                                        class="glyphicon glyphicon-user">Signed in as <?php echo $_SESSION['usr_name']; ?>
                            </p></li>
                        <li><a href="/index.php"><span class="glyphicon glyphicon-log-out">Log Out</a></li>

                    <?php } else { ?>
                        <li><a href="/index.php">Home</a></li>
                        <li><a href="/menu/about.php">About Us</a></li>
                        <li><a href="/menu/courses.php">Courses</a></li>
                        <li class="active"><a href="/menu/assessment.php">Test Yourself</a></li>
                        <li><a href="/menu/contact.php">Contact Us</a></li>
                        <li><a href="/menu/help.php">Help</a></li>
                        <li><a href="/menu/login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                        <li><a href="/menu/register.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['usr_id'])) { ?>
        <?php include '../include/signinheader.php'; ?>
    <?php } else { ?>
        <?php include '../include/header.php'; ?><?php } ?>
</header>
<form>
    <hr> <!-- draw a line-->
</form>
<section>
    <div class="container">

        <h3 style="text-align: center">COURSE QUIZZES</h3>
        <p style="text-align: center">Test youself</p>
        <div>
            <hr>
        </div>
        <!-- Using button group to display list of quizzes-->
        <div style="width: 100%" class="btn-group">
            <div class="row">
                <button onclick="document.getElementById('control').style.display='block'" style="width: 30%">
                    Well Control
                </button>
                <button onclick="document.getElementById('drilling').style.display='block'" style="width: 30%;">
                    Well Drilling
                </button>
                <button onclick="document.getElementById('completion').style.display='block'" style="width: 30%;">
                    Well Completion
                </button>
                <button onclick="document.getElementById('treatment').style.display='block'" style="width: 30%;">
                    Oil & Gas Treatment
                </button>
                <button onclick="document.getElementById('cement').style.display='block'" style="width: 30%">
                    Well Cementing
                </button>
                <button onclick="document.getElementById('storageandexport').style.display='block'" style="width: 30%;">
                    Storage and Export
                </button>
            </div>
        </div>
        <div>
            <hr>
        </div>
        <!-- Drill modal to display drill quiz on clicking drill quiz button-->
        <div id="drilling" class="modal">

            <div class="row">
                <div class="col-md-8 col-md-offset-2 well">
                    <form class="modal-content animate" action="/gradedrill.php"
                          method="POST"
                          name="drillform">
                        <div class="imgcontainer">
                        <span onclick="document.getElementById('drilling').style.display='none'" class="close"
                              title="Close Modal">&times;</span>
                            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar">-->
                        </div>
                        <fieldset>
                            <legend style="text-align: center">Well Drilling Quiz</legend>
                            <ol>
                                <li>
                                    <h5>What special considerations are not performed before drilling a well?</h5>
                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_DrillQue_1" id="ans_to_Que_1_A"
                                                   value="A"/>
                                            <label for="ans_to_Que_1_A">A) Carry out pressure waveform from a 0.82
                                                kg SUS
                                                charge detonated. </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_DrillQue_1" id="ans_to_Que_1_B"
                                                   value="B"/>
                                            <label for="ans_to_Que_1_B">B) Observe more stringent environmental
                                                requirements (i.e, drilling in an
                                                environmentally sensitive area).</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_DrillQue_1" id="ans_to_Que_1_C"
                                                   value="C"/>
                                            <label for="ans_to_Que_1_C">C) Severe environment report (High
                                                Pressure High temperature (HPHT), deepwater,
                                                high hydrogen Sulphide).</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_DrillQue_1" id="ans_to_Que_1_D"
                                                   value="D"/>
                                            <label for="ans_to_Que_1_D">D) Physical constraints (e.g, pipelines,
                                                proximity of other installations)
                                                seasonal access restrictions.</label>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <h5>What instrument is used to measure drilling fluid Weight?</h5>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_2" id="ans_to_Que_2_A"
                                               value="A"/>
                                        <label for="ans_to_Que_2_A">A) LTLP filter press</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_2" id="ans_to_Que_2_B"
                                               value="B"/>
                                        <label for="ans_to_Que_2_B">B) Mud Balance</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_2" id="ans_to_Que_2_C"
                                               value="C"/>
                                        <label for="ans_to_Que_2_C">C) HTHP filter press</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_2" id="ans_to_Que_2_D"
                                               value="D"/>
                                        <label for="ans_to_Que_2_D">D) API Extreme Pressure Tester.</label>
                                    </div>
                                </li>
                                <li>
                                    <h5>Which of the following are permits needed before drilling commences (select all
                                        that apply)?</h5>
                                    <form class="form-group">
                                        <input type="checkbox" name="ans_to_DrillQue_3[]" value="A" id="ans_3A"/>
                                        <label for="ans_3A">A) Chemical Discharge Records (DTI or agent)</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_3[]" value="B" id="ans_3B"/>
                                        <label for="ans_3B">B) Loss of Fluid Test Programme (OECD)</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_3[]" value="C" id="ans_3C"/>
                                        <label for="ans_3C">C) Incident reporting (DTI/HSE)</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_3[]" value="D" id="ans_3D"/>
                                        <label for="ans_3D">D) All of the above.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_3[]" value="E" id="ans_3E"/>
                                        <label for="ans_3E">E) None of the above.</label>
                                    </form>
                                </li>

                                <li>
                                    <h5>Which of the following personnel should not be on site during drilling?</h5>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_4" id="ans_to_Que_4_A"
                                               value="A"/>
                                        <label for="ans_to_Que_4_A">A) Drilling
                                            Superintendent</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_4" id="ans_to_Que_4_B"
                                               value="B"/>
                                        <label for="ans_to_Que_4_B">B) Derrick Manager</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_4" id="ans_to_Que_4_C"
                                               value="C"/>
                                        <label for="ans_to_Que_4_C">C) Driller Supervisor</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_4" id="ans_to_Que_4_D"
                                               value="D"/>
                                        <label for="ans_to_Que_4_D">D) Rig Inspector</label>
                                    </div>
                                </li>
                                <li>
                                    <h5>Which of these requirements exist during the operational phase of drilling?</h5>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_5" id="ans_to_Que_5_A"
                                               value="A"/>
                                        <label for="ans_to_Que_5_A">A) Conclusion of Rig work (HSE)</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_5" id="ans_to_Que_5_B"
                                               value="B"/>
                                        <label for="ans_to_Que_5_B">B) Rig move notification</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_5" id="ans_to_Que_5_C"
                                               value="C"/>
                                        <label for="ans_to_Que_5_C">C) Rig Emissions Cost </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_5" id="ans_to_Que_5_D"
                                               value="D"/>
                                        <label for="ans_to_Que_5_D">D) Drill fluid Discharge Records (DTI or
                                            agent)</label>
                                    </div>
                                </li>

                                <li>
                                    <h5>Which of the following is constituent of Mud?</h5>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_6" id="ans_to_Que_6_A"
                                               value="A"/>
                                        <label for="ans_to_Que_6_A">A) Oil Based Mud (OBM)</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_6" id="ans_to_Que_6_B"
                                               value="B"/>
                                        <label for="ans_to_Que_6_B">B) Water Based Mud (WBM)</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_6" id="ans_to_Que_6_C"
                                               value="C"/>
                                        <label for="ans_to_Que_6_C">C) Gas, aerated muds</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_DrillQue_6" id="ans_to_Que_6_D"
                                               value="D"/>
                                        <label for="ans_to_Que_6_D">D) All of the above</label>
                                    </div>

                                </li>
                                <li>
                                    <h5>The time required to plan and execute a well construction programme is dependent
                                        on (select all that apply)?</h5>
                                    <form class="form-group">
                                        <input type="checkbox" name="ans_to_DrillQue_7[]" value="A" id="ans_7A"/>
                                        <label for="ans_7A">A) sub-surface complexity</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_7[]" value="B" id="ans_7B"/>
                                        <label for="ans_7B">B) location</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_7[]" value="C" id="ans_7C"/>
                                        <label for="ans_7C">C) type of well</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_7[]" value="D" id="ans_7D"/>
                                        <label for="ans_7D">D) All of the above.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_DrillQue_7[]" value="E" id="ans_7E"/>
                                        <label for="ans_7E">E) None of the above.</label>
                                    </form>
                                </li>

                            </ol>
                            <input type="submit" value="Submit Quiz"/>
                        </fieldset>
                    </form>

                </div>
            </div>
            <!--</form>-->
        </div>

        <!-- Control modal to display Control quiz on clicking control quiz button-->
        <div id="control" class="modal">

            <div class="row">
                <div class="col-md-10 col-md-offset-1 well">
                    <form class="modal-content animate" action="/gradecontrol.php"
                          method="post"
                          name="controlform">
                        <div class="imgcontainer">
                        <span onclick="document.getElementById('control').style.display='none'" class="close"
                              title="Close Modal">&times;</span>
                            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar">-->
                        </div>
                        <fieldset>
                            <legend style="text-align: center">Well Control Quiz</legend>

                            <ol>
                                <li>
                                    <h5>What is a Kick during drilling?</h5>
                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_ContolQue_1" id="ans_to_Que_1_A"
                                                   value="A"/>
                                            <label for="ans_to_Que_1_A">A) Inflow of Drilling fluid into the
                                                annals </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_ContolQue_1" id="ans_to_Que_1_B"
                                                   value="B"/>
                                            <label for="ans_to_Que_1_B">B) Inflow of formation fluid into the
                                                wellbore</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_ContolQue_1" id="ans_to_Que_1_C"
                                                   value="C"/>
                                            <label for="ans_to_Que_1_C">C)Outflow of Drilling fluid into the
                                                annals</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="ans_to_ContolQue_1" id="ans_to_Que_1_D"
                                                   value="D"/>
                                            <label for="ans_to_Que_1_D">D) Outflow of formation fluid into the
                                                wellbore</label>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <h5>The full meaning of MAASP is Maximum Atomize Allowable Surface Pressure?</h5>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_2" id="ans_to_Que_2_A"
                                               value="A"/>
                                        <label for="ans_to_Que_2_A">A)True</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_2" id="ans_to_Que_2_B"
                                               value="B"/>
                                        <label for="ans_to_Que_2_B">B) False.</label>
                                    </div>

                                </li>
                                <li>
                                    <h5>A Kick can be composed of what fluids (check all that apply)?</h5>
                                    <form class="form-group">
                                        <input type="checkbox" name="ans_to_ContolQue_3[]" value="A" id="ans_3A"/>
                                        <label for="ans_3A">A) Salt water</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_3[]" value="B" id="ans_3B"/>
                                        <label for="ans_3B">B) Gas</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_3[]" value="C" id="ans_3C"/>
                                        <label for="ans_3C">C) Oil</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_3[]" value="D" id="ans_3D"/>
                                        <label for="ans_3D">D) Drilling Fluid</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_3[]" value="E" id="ans_3E"/>
                                        <label for="ans_3E">E) Combination of all of the above</label>
                                    </form>
                                </li>
                                <li>
                                    <h5>What is lag time of cuttings during drilling?</h5>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_4" id="ans_to_Que_4_A"
                                               value="A"/>
                                        <label for="ans_to_Que_4_A">A) Surface to reservoir and reservoir to
                                            surface.</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_4" id="ans_to_Que_4_B"
                                               value="B"/>
                                        <label for="ans_to_Que_4_B">B) Annual to bit and bit to surface.</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_4" id="ans_to_Que_4_C"
                                               value="C"/>
                                        <label for="ans_to_Que_4_C">C) Annual to bit and bit to Annual.</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_4" id="ans_to_Que_4_D"
                                               value="D"/>
                                        <label for="ans_to_Que_4_D">D) Surface to bit
                                            and bit to surface.</label>
                                    </div>
                                </li>

                                <li>
                                    <h5>During drilling what is drilling breaks?</h5>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_5" id="ans_to_Que_5-A"
                                               value="A"/>
                                        <label for="ans_to_Que_5-A">A) When drilling personnel change drill
                                            strings</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_5" id="ans_to_Que_5-B"
                                               value="B"/>
                                        <label for="ans_to_Que_5-B">B) Evidence of transition to an
                                            abnormal zone.</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_5" id="ans_to_Que_5-C"
                                               value="C"/>
                                        <label for="ans_to_Que_5-C">C) Evidence of hydrocarbon.</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_5" id="ans_to_Que_5-D"
                                               value="D"/>
                                        <label for="ans_to_Que_5-D">D) Evidence of transition to a
                                            normal zone</label>
                                    </div>

                                </li>
                                <li>
                                    <h5>What can cause a Kick during drilling (list all that apply)?</h5>
                                    <form class="form-group">
                                        <input type="checkbox" name="ans_to_ContolQue_6[]" value="A" id="ans_6A"/>
                                        <label for="ans_6A">A) Insufficient Salt water.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_6[]" value="B" id="ans_6B"/>
                                        <label for="ans_6B">B) Not keeping the hole full.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_6[]" value="C" id="ans_6C"/>
                                        <label for="ans_6C">C) Loss of circulation.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_6[]" value="D" id="ans_6D"/>
                                        <label for="ans_6D">D) Circulation of Drilling Fluid.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_6[]" value="E" id="ans_6E"/>
                                        <label for="ans_6E">E) Swabbing.</label>
                                    </form>
                                </li>
                                <li>
                                    <h5>What is the effect of Swabbing on connection/trip gas?</h5>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_7" id="ans_to_Que_7-A"
                                               value="A"/>
                                        <label for="ans_to_Que_7-A">A) It creates negative
                                            differential pressure</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_7" id="ans_to_Que_7-B"
                                               value="B"/>
                                        <label for="ans_to_Que_7-B">B) It creates posative
                                            differential pressure.</label>
                                    </div>
                                </li>
                                <li>
                                    <h5>Which of these method is used to manage a Kick?</h5>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_8" id="ans_to_Que_8-A"
                                               value="A"/>
                                        <label for="ans_to_Que_8-A">A) Derrickman's method.</label>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="ans_to_ContolQue_8" id="ans_to_Que_8-B"
                                               value="B"/>
                                        <label for="ans_to_Que_8-B">B) Driller’s method.</label>
                                    </div>

                                </li>

                                <li>
                                    <h5>Surface Well Control Equipment is made of?</h5>
                                    <form class="form-group">
                                        <input type="checkbox" name="ans_to_ContolQue_9[]" value="A" id="ans_9A"/>
                                        <label for="ans_9A">A) Bits.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_9[]" value="B" id="ans_9B"/>
                                        <label for="ans_9B">B) Blow out preventers</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_9[]" value="C" id="ans_9C"/>
                                        <label for="ans_9C">C) Casing head.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_9[]" value="D" id="ans_9D"/>
                                        <label for="ans_9D">D) Drilling Fluid.</label>
                                        <br/>
                                        <input type="checkbox" name="ans_to_ContolQue_9[]" value="E" id="ans_9E"/>
                                        <label for="ans_9E">E) Drilling Spool.</label>
                                    </form>
                                </li>

                            </ol>
                            <input type="submit" value="Submit Quiz"/>

                        </fieldset>
                    </form>
                </div>
            </div>

        </div>
        <div id="completion" class="modal">

            <!--<form class="modal-content animate" action="/action_page.php">
                <div class="imgcontainer">
                        <span onclick="document.getElementById('delete').style.display='none'" class="close"
                              title="Close Modal">&times;</span>
                    <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar">
                </div>-->

            <div class="row">
                <div class="col-md-10 col-md-offset-1 well">
                    <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                          method="post"
                          name="completionform">
                        <div class="imgcontainer">
                        <span onclick="document.getElementById('completion').style.display='none'" class="close"
                              title="Close Modal">&times;</span>
                            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar">-->
                        </div>
                        <fieldset>
                            <legend style="text-align: center">Completion Quiz</legend>
                            <h2>Completion Quiz coming soon</h2>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById('drilling');
            var modal = document.getElementById('control');
            var modal = document.getElementById('completion');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </div>
</section>
<footer>
    <?php include '../include/footer.php'; ?>
</footer>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>