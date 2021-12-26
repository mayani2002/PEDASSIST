<?php 
    define('allow',true); 
    $show_sign_up = $_GET["sign_up"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDASSIST | Lesson - 3</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/><link>
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="lesson.css">
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
            <section class="title">
                <div class="videotitle">
                    <h3>Lesson Number - 3</h3>
                    <h1>TOXIC STRESS</h1>
                </div>
                <div>
                    <a href = 'questions.php?lesson=3'>
                        <button>TAKE TEST</button>
                    </a>
                </div>
            </section>

            <!-- CONTENT -->
            <section class="content">
                <!-- <h2>EXTRAAS</h2> -->
                <div class="content1" data-aos="fade-up" data-aos-duration="200">
                    <p data-aos="fade-up" data-aos-duration="200"><u>Positive Stress:</u> Brief increase in heart rate, mild elevation in stress hormones which makes one alert.</p>

                    <p data-aos="fade-up" data-aos-duration="200"><u>Tolerable Stress:</u> Serious temperary stress response , buffered by supportive relationships.</p>

                    <p data-aos="fade-up" data-aos-duration="200"><u>Toxic Stress:</u> Prolonged activation of Stress responce system in the absence of protective relationships.</p>
                </div>
                <br>
                <br>

                <p data-aos="fade-up" data-aos-duration="200"> 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Constant stress drains precious energy the brain needs: in childhood, for healthy development; and in adulthood. In the areas of the brain dedicated to learning and reasoning, the
                    neural connections that comprise of brain architecture become weaker and fewer in number (because of stress ).
                </p>
                <p data-aos="fade-up" data-aos-duration="200"> 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; In addition, people who have experienced serious early adversity, chronic personal discrimination, or inter-generational trauma are more likely to perceive and focus attention on
                    potential threats throughout life. Frequently experiencing circumstances that seem beyond our control can also lower our sense of self-efficacy (the belief that we can do things to make change and improve our own lives), which is key
                    to our ability to plan and engage in goal-oriented behaviors.

                </p>
                <h2 class="head" style="margin-block: 20px;" data-aos="fade-up" data-aos-duration="200">Manage stress:</h2>
                <p data-aos="fade-up" data-aos-duration="200">Toxic stress can be avoided if we ensure that the environment in which children grow are nurturing , stable and engaging ....
                </p>
                <p data-aos="fade-up" data-aos-duration="200">Listed below are examples of opportunities to apply the reduce sources of stress design principle to policy:
                </p>
                <ul data-aos="fade-up" data-aos-duration="200">
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Create the conditions in which families can meet basic needs, such as affordable and nutritious food, safe shelter, medical care, and mental health services, as well as have opportunities to build financial assets to withstand
                            unexpected losses or emergencies.</p>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Focus special attention on the needs of children during periods of severe hardship, such as homelessness.</p>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Establish simplified, streamlined rules to determine eligibility and re-certification for benefits and services, while minimizing punitive regulations that add stress to already challenging situations.
                        </p>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Actively reduce community-level sources of stress in areas of concentrated disadvantage, such as recurrent violence, exposures to environmental toxicants, food deserts, and lack of services and economic opportunity.
                        </p>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p> Provide consistent, adequate funding to prevent unexpected loss of services, which is a source of stress to both service providers and families, in order to offer stability that enables adults to focus on responsive caregiving.
                        </p>
                    </li>
                </ul>
            </section>

             <!-- FINAL BUTTON -->
             <div class="" style="display:flex; flex-direction:row; justify-content: space-between;" data-aos="fade-up" data-aos-duration="200">
                <div class="end_taketest_button">
                    <a href="tutorial.php">
                        <button>BACK</button>
                    </a>
                </div>
                <div class="end_taketest_button">
                    <a href = 'questions.php?lesson=3'>
                        <button>TAKE TEST</button>
                    </a>
                </div>
            </div>
 
        </div>
        
        <!-- FOOTER -->
        <?php include('assets/footer.php'); ?>

    </main>

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

        AOS.init();
        sendCookieInfo();
    </script>
</body>
</html>