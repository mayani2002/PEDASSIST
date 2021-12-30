<?php
define('allow', true);
$show_sign_up = $_GET["sign_up"];


include('assets/php_fetch_lesson_number.php');
lessonAccessCheck(3)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDASSIST | Lesson - 3</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link>
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="lesson.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="assets/bottom_nav.css">

</head>

<body>

    <!-- SIDE NAVIGATION BAR -->
    <?php include('assets/headernav.php'); ?>

    <!-- HOME CONTENT -->
    <main>

        <div class="page">

            <!-- VIDEO -->
            <section class="video">
                <video src="toxic_stress.mp4" alt="lesson" poster="LESSON/LESSON NUMBER 3.png" controls></video>
            </section>

            <!-- TITLE -->
            <section class="lession_title">
                <div class="title">
                    <div class="videotitle">
                        <h3>Lesson Number - 3</h3>
                        <h1>TOXIC STRESS</h1>
                    </div>
                    <div class="take_test_btn">
                        <button onclick="window.location.href='questions.php?lesson=3'">TAKE TEST</button>
                    </div>
                </div>
            </section>

            <!-- CONTENT -->
            <section class="content">
                <!-- <h2>EXTRAAS</h2> -->
                <div class="content1">
                    <p ><u>Positive Stress:</u> Brief increase in heart rate, mild elevation in stress hormones which makes one alert.</p>

                    <p ><u>Tolerable Stress:</u> Serious temperary stress response , buffered by supportive relationships.</p>

                    <p ><u>Toxic Stress:</u> Prolonged activation of Stress responce system in the absence of protective relationships.</p>
                </div>
                <br>
                <br>

                <p>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Constant stress drains precious energy the brain needs: in childhood, for healthy development; and in adulthood. In the areas of the brain dedicated to learning and reasoning, the
                    neural connections that comprise of brain architecture become weaker and fewer in number (because of stress ).
                </p>
                <p >
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; In addition, people who have experienced serious early adversity, chronic personal discrimination, or inter-generational trauma are more likely to perceive and focus attention on
                    potential threats throughout life. Frequently experiencing circumstances that seem beyond our control can also lower our sense of self-efficacy (the belief that we can do things to make change and improve our own lives), which is key
                    to our ability to plan and engage in goal-oriented behaviors.

                </p>
                <h2 class="head" style="margin-block: 20px;">Manage stress:</h2>
                <p>Toxic stress can be avoided if we ensure that the environment in which children grow are nurturing , stable and engaging ....
                </p>
                <p >Listed below are examples of opportunities to apply the reduce sources of stress design principle to policy:
                </p>
                <ul >
                    <li >
                        <p>Create the conditions in which families can meet basic needs, such as affordable and nutritious food, safe shelter, medical care, and mental health services, as well as have opportunities to build financial assets to withstand
                            unexpected losses or emergencies.</p>
                    </li>
                    <li >
                        <p>Focus special attention on the needs of children during periods of severe hardship, such as homelessness.</p>
                    </li>
                    <li>
                        <p>Establish simplified, streamlined rules to determine eligibility and re-certification for benefits and services, while minimizing punitive regulations that add stress to already challenging situations.
                        </p>
                    </li>
                    <li>
                        <p>Actively reduce community-level sources of stress in areas of concentrated disadvantage, such as recurrent violence, exposures to environmental toxicants, food deserts, and lack of services and economic opportunity.
                        </p>
                    </li>
                    <li >
                        <p> Provide consistent, adequate funding to prevent unexpected loss of services, which is a source of stress to both service providers and families, in order to offer stability that enables adults to focus on responsive caregiving.
                        </p>
                    </li>
                </ul>
            </section>

            <!-- FINAL BUTTON -->
            <div class="end_btn_section">

                <!-- BACK BUTTON -->
                <div class="end_taketest_button back">
                    <button class="back_button" onclick="window.location.href='tutorial.php'">BACK</button>
                </div>

                <!-- TAKE TEST BUTTON -->
                <div class="end_taketest_button take_test">
                    <button class="taketest_button" onclick="window.location.href='questions.php?lesson=3'">TAKE TEST</button>
                </div>

            </div>
        <!-- FOOTER -->
        <?php include('assets/footer.php'); ?>

    </main>
    
    <!-- BOTTOM NAV -->
    <?php include('assets/bottom_nav.php'); ?>

    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="questions.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            hideLoginButton(cookie_info);
            displayLoginSignupFormWithDelay(cookie_info);
            // signUpOrLoginToContinue(cookie_info)
        }
        
        sendCookieInfo();
    </script>
</body>

</html>