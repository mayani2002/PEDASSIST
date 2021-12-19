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
    <title>PEDASSIST | Lesson - 2</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/><link>
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="lesson.css">
    <link rel="stylesheet" href="lesson2.css">

</head>

<body>

    <!-- SIDE NAVIGATION BAR -->
    <?php include('assets/headernav.php'); ?>

    <!-- HOME CONTENT -->
    <main>
        <div class="page">
            
            <!-- VIDEO -->
            <section class="video">
                <video src="serve_and_return.mp4" alt="lesson" poster="LESSON/LESSON NUMBER 2.png" controls></video>
            </section>

            <!-- TITLE -->
            <section class="title">
                <div class="videotitle">
                    <h3>Lesson Number - 2</h3>
                    <h1>SERVE AND RETURN</h1>
                </div>
                <div>
                    <a 
                        href = 
                            "
                                <?php 
                                    if(isset($_COOKIE['email'])) {
                                        echo 'questions.php?lesson=2';
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
                <h2 class="head" data-aos="fade-up" data-aos-duration="200">
                    Follow these 5 steps to practice serve and return with your child.</b>
                </h2>

                <ol class="content1" data-aos="fade-up" data-aos-duration="200">

                    <!-- POINT1 -->
                    <img src="LESSON/8674.png" alt="" height="300px" data-aos="fade-up" data-aos-duration="200">
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p><u>Notice the serve and share the child's focus of attention</u></p>

                        <p> &nbsp; Is the child looking or pointing at something? Making a sound or facial expression? Moving those little arms and legs? That's a serve. The key is to pay attention to what the child is focused on. You can't spend all your
                            time doing this, so look for small opportunities throughout the day—like while you're getting them dressed or waiting in line at the store.
                        </p>

                        <p class="WHY">WHY? <br> By noticing serves, you'll learn a lot about children's abilities, interests, and needs. You'll encourage them to explore and you'll strengthen the bond between you.</p>
                    </li>

                    <!-- POINT2 -->
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p><u> Return the serve by supporting and encouraging</u></p>
                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You can offer children comfort with a hug and gentle words, help them, play with them, or acknowledge them. You can make a sound or facial expression—like saying, “I see!”
                            or smiling and nodding to let a child know you're noticing the same thing. Or you can pick up an object a child is pointing to and bring it closer.
                        </p>

                        <p class="WHY">WHY? <br> Supporting and encouraging rewards a child's interests and curiosity. Never getting a return can actually be stressful for a child. When you return a serve, children know that their thoughts and feelings are heard and
                            understood.
                        </p>
                    </li>


                    <!-- POINT 3 -->
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p><u>Give it a name!</u></p>
                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; When you return a serve by naming what a child is seeing, doing, or feeling, you make important language connections in their brain, even before the child can talk or understand
                            your words. You can name anything—a person, a thing, an action, a feeling, or a combination. If a child points to their feet, you can also point to them and say, “Yes, those are your feet!”
                        </p>

                        <p class="WHY">WHY? <br> When you name what children are focused on, you help them understand the world around them and know what to expect. Naming also gives children words to use and lets them know you care.

                        </p>
                    </li>


                    <!-- POINT 4 -->
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p><u> Take turns…and wait. Keep the interaction going back and forth.</u></p>
                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Every time you return a serve, give the child a chance to respond. Taking turns can be quick (from the child to you and back again) or go on for many turns. Waiting is crucial.
                            Children need time to form their responses, especially when they're learning so many things at once. Waiting helps keep the turns going.
                        </p>

                        <p class="WHY">WHY? <br> Taking turns helps children learn self-control and how to get along with others. By waiting, you give children time to develop their own ideas axnd build their confidence and independence. Waiting also helps you understand
                            their needs.
                        </p>
                    </li>


                    <!-- POINT 5 -->
                    <li data-aos="fade-up" data-aos-duration="200">
                        <p><u>Practice endings and beginnings</u></p>
                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Children signal when they're done or ready to move on to a new activity. They might let go of a toy, pick up a new one, or turn to look at something else. Or they may walk
                            away, start to fuss, or say, “All done!” When you share a child's focus, you'll notice when they're ready to end the activity and begin something new.

                        </p>

                        <p class="WHY">WHY? <br> When you can find moments for children to take the lead, you support them in exploring their world—and make more serve and return interactions possible.
                        </p>
                    </li>

                </ol>
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
                                        echo 'questions.php?lesson=2';
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
        }

        function sendSignUpOrLoginToContinueInfo() {
            var show_signup = "<?php echo $show_sign_up; ?>";
            signUpOrLoginToContinue(show_signup);
        }

        sendCookieInfo();
        AOS.init();
        sendSignUpOrLoginToContinueInfo();
    </script>
</body>
</html>