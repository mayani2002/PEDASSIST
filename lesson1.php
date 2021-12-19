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
    <title>PEDASSIST | Lesson - 1</title>
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
                <video src="brain_architecture.mp4" alt="lesson" poster="LESSON/LESSON NUMBER 1.png" controls></video>
            </section>

            <!-- TITLE -->
            <section class="title">
                <div class="videotitle">
                    <h3>Lesson Number - 1</h3>
                    <h1>BRAIN ARCHITECTURE</h1>
                    <small>(Introduction)</small>
                </div>
                <div>
                    <a 
                        href = 
                            "
                                <?php 
                                    if(isset($_COOKIE['email'])) {
                                        echo 'questions.php?lesson=1';
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
                <div class="content1">
                    <p data-aos="fade-up" data-aos-duration="200"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; What if the society could be made Crime free or we could drastically reduced crime rates , improve mental health and Quality of life in our community. Hard to believe , isn't
                        it ! Well , If such changes were to be brought , where will you start from? You will be surprised to know that these changes could be brought about since the early childhood of a person , just as the brain architecture begins
                        to form. </p>

                    <p data-aos="fade-up" data-aos-duration="200">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Science tells us that we might find the solution to these complex social problems in the early childhood, when the architecture of the brain begins to form. The basic architecture
                        of the brain is constructed through an ongoing process that begins before birth and continues into adulthood. Simpler neural connections and skills form first, followed by more complex circuits and skills. <u> In the first few years
                        of life, more than 1 million new neural connections form every second. After this period of rapid proliferation, connections are reduced through a process called pruning, which allows brain circuits to become more efficient.</u></p>
                </div>
                <img src="LESSON/brain_ability.jpeg" data-aos="fade-up" data-aos-duration="200">
                <p data-aos="fade-up" data-aos-duration="200"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Brain architecture comprises of billions of connections between individual neurons across different areas of the brain. These connections enable lightning-fast communication among
                    neurons that specialize in different kinds of brain functions. The early years are the most active period for establishing neural connections, but new connections can form throughout life and unused connections continue to be pruned.
                    Because this dynamic process never stops, it is impossible to determine what percentage of brain development occurs by a certain age. More importantly, the connections that form early provide either a strong or weak foundation for
                    the connections that form later.
                </p>

                <div class="note" data-aos="fade-up" data-aos-duration="200">
                    <p> NOTE: 1. The interactions of genes and experience shape the developing brain. Cognitive, emotional, and social capacities are inextricably intertwined throughout the life course.</p>
                </div>

            </section>

             <!-- FINAL BUTTON -->
             <div data-aos="fade-up" data-aos-duration="200" style="display:flex; flex-direction:row; justify-content: space-between;">
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
                                        echo 'questions.php?lesson=1';
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

    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="questions.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            hideLoginButton(cookie_info);
            // displayLoginSignupForm(cookie_info);
        }

        function sendSignUpOrLoginToContinueInfo() {
            var show_signup = "<?php echo $show_sign_up; ?>";
            signUpOrLoginToContinue(show_signup);
        }

        AOS.init();
        sendCookieInfo();
        sendSignUpOrLoginToContinueInfo();
    </script>
</body>

</html>