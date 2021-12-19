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
    <title>PEDASSIST | Lesson - 4</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/><link>
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="lesson.css">
    <link rel="stylesheet" href="badge.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <!-- SIDE NAVIGATION BAR -->
    <?php include('assets/headernav.php'); ?>

    <!-- HOME CONTENT -->
    <main>

        <div class="page">

            <!-- VIDEO -->
            <section class="video">
                <video src="http://" alt="lesson" poster="LESSON/LESSON NUMBER 4.png" controls></video>
            </section>

            <!-- TITLE -->
            <section class="title">
                <div class="videotitle">
                    <h3>Lesson Number - 4</h3>
                    <h1>CHILD NEGLECT</h1>
                </div>
                <div>
                    <a 
                        href = 
                            "
                                <?php 
                                    if(isset($_COOKIE['email'])) {
                                        echo 'questions.php?lesson=4';
                                    } else {
                                        echo "lesson1.php?sign_up=1";
                                    }
                                ?>
                            "
                    >
                        <button>TAKE TEST</button>
                    </a>
                </div>
            </section>

            <!-- CONTENT -->

            <section class="content">
                <!-- <h2>EXTRAAS</h2> -->
                <div data-aos="fade-up" data-aos-duration="200" class="content1">
                    <p data-aos="fade-up" data-aos-duration="200"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Chronic neglect is associated with a wider range of damage than active abuse, but it receives less attention in policy and practice.Science tells us that young children who experience
                        significantly limited caregiver responsiveness may sustain a range of adverse physical and mental health consequences that actually produce more widespread developmental impairments than overt physical abuse. These can include
                        cognitive delays, stunting of physical growth, impairments in executive function and self-regulation skills, and disruptions of the body’s stress response.</p>

                </div>
                <img data-aos="fade-up" data-aos-duration="200" src="LESSON/CHILD_NEGLECT.jpeg" alt="">
                <p data-aos="fade-up" data-aos-duration="200">child neglect receives far less public attention than either physical abuse or sexual exploitation and a lower proportion of mental health services.
                </p>


                <p data-aos="fade-up" data-aos-duration="200"><u>Studies on children in a variety of settings show that severe deprivation or neglect:</u></p>
                <ul data-aos="fade-up" data-aos-duration="200">
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Disrupts the ways in which children’s brains develop and process information, increasing the risk for attentional, emotional, cognitive, and behavioral disorders.
                        </p>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Alters the development of biological stress-response systems, leading to greater risk for anxiety, depression, cardiovascular problems, and other chronic health impairments later in life.
                        </p>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Correlates with significant risk for emotional and interpersonal difficulties, including high levels of negativity, poor impulse control, and personality disorders, as well as low levels of enthusiasm, confidence, and assertiveness.
                        </p>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p>Is associated with significant risk for learning difficulties and poor school achievement, including deficits in executive function and attention regulation, low IQ scores, poor reading skills, and low rates of high school graduation.</p>
                    </li>
                </ul>

                <p data-aos="fade-up" data-aos-duration="200" class="note" style="margin-block: 40px; padding: 20px; background-color: rgba(127, 255, 212, 0.164);"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The negative consequences of deprivation and neglect can be reversed or reduced through appropriate and timely interventions, but merely removing a young child from an insufficiently
                    responsive environment does not guarantee positive outcomes. Children who experience severe deprivation typically need therapeutic intervention and highly supportive care to mitigate the adverse effects and facilitate recovery.</p>
            </section>

             <!-- FINAL BUTTON -->

             <div class="" style="display:flex; flex-direction:row; justify-content: space-between;" data-aos="fade-up" data-aos-duration="200">
                <div class="end_taketest_button">
                    <a href="tutorial.php">
                        <button>BACK</button>
                    </a>
                </div>
                <div class="end_taketest_button">
                    <a 
                        href = 
                            "
                                <?php 
                                    if(isset($_COOKIE['email'])) {
                                        echo 'questions.php?lesson=4';
                                    } else {
                                        echo "lesson1.php?sign_up=1";
                                    }
                                ?>
                            "
                    >
                        <button>TAKE TEST</button>
                    </a>
                </div>
            </div>
 
        </div>
        
    <!-- FOOTER -->
    <?php include('assets/footer.php'); ?>
    </main>

    <script src="assets/basic.js"></script>
    <script src="questions.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            hideLoginButton(cookie_info);
            displayLoginSignupForm(cookie_info);
        }

        function sendSignUpOrLoginToContinueInfo() {
            var show_signup = "<?php echo $show_sign_up; ?>";
            signUpOrLoginToContinue(show_signup);
        }

        AOS.init();
        sendCookieInfo();
        sendSignUpOrLoginToContinueInfo();
</body>
</html>