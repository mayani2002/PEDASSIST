<?php define('allow', true); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="91726057228-j16ha0k20vi4mu4d58scpqe1csuq6eni.apps.googleusercontent.com">

    <title>PEDASSIST | HOME</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="shortcut icon" type="image/png" href="images/pedassist_favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="assets/bottom_nav.css">
    <link rel="stylesheet" href="edit_profile.css">

</head>

<body>
    <?php include('assets/headernav.php'); ?>
    <?php include('edit_profile.php'); ?>

    <!-- HOME CONTENT -->
    <main>
        <section class="header_img" id="1">
            <div class="header_img_quote_section">
                <blockquote class="header_img_quote">
                    "The best way to predict the future is to create it."
                </blockquote>
                <cite> <a href="https://en.wikipedia.org/wiki/Abraham_Lincoln" target="blank">- By Abraham Lincoln</a></cite>
            </div>
            <!-- BUTTON -->
            <div class="end_taketest_button">
                <a href="lessons_page.php">
                    <button>Lessons</button>
                </a>
                <p class="check_out_btn">Check out the Lessons!</p>
            </div>
        </section>


        <!-- FACTS -->
        <section class="facts" id="2">
            <div class="right_align" data-aos="fade-right" data-aos-duration="500">
                <blockquote class="container">
                    “Research has proven that by the time a child reaches the age of three, 85% of the brains capacity is already developed.”
                </blockquote>
            </div>
            <div class="center_align">
                <div data-aos="fade-up" data-aos-duration="500">
                    <blockquote class="container">
                        “The power of early year’s education is immense with a plethora of
                        benefits such as better social skills, increased confidence levels,
                        greater coordination, creativity and increased confidence levels.”
                    </blockquote>
                </div>
            </div>
            <div class="left_align" data-aos="fade-left" data-aos-duration="500">
                <blockquote class="container">
                    “Toxic stress damages developing brain architecture, which can lead to
                    lifelong problems in learning, behavior and physical and mental health.”
                </blockquote>
            </div>
        </section>


        <!-- OUR DESCRIPTION -->
        <div class="page">
            <section class="description" id="3">
                <img src="HOME/peopleA.png" alt="peopleA" class="peopleA" data-aos="fade-left" data-aos-delay="500" />
                <h1 class="heading">WHAT WE DO?</h1>
                <div class="des_child">
                    <h2>
                        Our platform helps you understand how each and every experience of a
                        child affects the brain architecture and how it plays a huge role in its later life
                    </h2>
                    <h2>
                        The highly researched content help parents or care takers gain new
                        knowledge about the effects a happy and healthy early childhood
                        has on the personallity of a person
                    </h2>
                    <h2>
                        We provide an one stop guide to better parenting and family
                        life to anyone interested. We help new parents learn about the do's and dont's
                        of raising a healthy child both physically and mentally.

                    </h2>
                </div>
                <img src="HOME/peopleB.png" alt="peopleB" class="peopleB" data-aos="fade-right" data-aos-delay="500" />
            </section>

            <div class="linebtwnsections"></div>

            <!-- CONTENT -->
            <section class="content" id="4">
                <div class="list">
                    <div onclick="display_tutorial()" class="TUTORIALS">TUTORIALS</div>
                    <div onclick="display_assisment()" class="ASSESSMENT">ASSESSMENT</h1>
                    </div>
                    <div onclick="display_rules()" class=" ABOUT">RULES</div>
                </div>

                <div class="content_child">
                    <p class="content_tutorial">
                        Hours of research is compiled in 4 different lesson which consist of
                        short video about the topic providing you with a gist of the topic
                        and a highly detailed descriptive text which provides you with proper do's and don'ts of the lesson.
                        This Accumulated data will guide you to a better understanding of a childs mental health.
                    </p>
                    <p class="content_assisment">
                        These set of compiled questions prepared by us makes sure that you
                        properly understand each and every concept and are fully aware of
                        all the minute details that require undiverted attention of a parent.
                        Upon completion of every lesson's assesment one shall recive a badge
                        which signifies that he/she is ready for the next phase and
                        compleatly understood what the lesson had to offer.
                    </p>
                    <ul class="content_rules">
                        <li>All lessons must be studied according to the recomended sequence.</li><br>
                        <li>Badges are recieved upon succesfull compleation of the assesment of the lesson.</li><br>
                        <li>All the questions of the assesment must be answered correctly to get the badge.</li><br>
                        <li>If not please reattempt the assesment again after revising the entire lesson.</li><br>
                        <li>Do not forget to sign in so that you don't lose all the progress made and the badges aquired.
                            These badges will be mailed to you on the registered email id.
                        </li>
                    </ul>
                    </p>
                </div>
            </section>


            <section class="content2">
                <div class="abt_Lesson">
                    <div class="abt_Lesson_pic"></div>
                    <div class="abt_Lesson_content">
                        <div class="lession_heading">
                            <div class="abt_Lesson_circle circle">
                                <h2>Lessons</h2>
                            </div>
                        </div>
                        <p class="para">Hours of research is compiled in 4 different lessons
                            where each lesson consists of a short video providing you with a
                            gist and a highly informative write-up for a more detailed study
                            of the topic. Each lesson will help you improve your understanding
                            of a child’s mental health.
                        </p>
                    </div>
                </div>

                <div class="abt_Assessment">
                    <div class="abt_Assessment_content">
                        <div class="assessment_heading">
                            <div class="abt_Assessment_circle circle">
                                <h2>Assessment</h2>
                            </div>
                        </div>
                        <p class="para">After studying each lesson, we’ll test your understanding for which you’ll have to answer 3 different type of questions. These will also help you to judge how much you know. After successful completion of these questions we will give you a badge in the honor of completing a lesson.</p>
                    </div>
                    <div class="abt_Assessment_pic"></div>
                </div>

                <div class="abt_Rule">
                    <div class="abt_Rule_pic"></div>
                    <div class="abt_Rule_content">
                        <div class="rule_heading">
                            <div class="abt_Rule_circle circle">
                                <h2>Rule</h2>
                            </div>
                        </div>
                        <p class="para">
                        <ul class="para">
                            <li>You’ll have to create an account so that your progress can be saved with us.</li><br>
                            <li>Badges are recieved upon succesfull completion of the assesment of the lesson.</li><br>
                            <li>All the questions of the assesment must be answered correctly to get the badge.</li><br>
                            <li>If not please reattempt the assesment again after revising the entire lesson.</li><br>
                            <li>These badges will be mailed to you on the registered email id.</li>
                        </ul>
                        </p>
                    </div>
                </div>

            </section>

            <!-- ABOUT US -->
            <h1 class="abt" id="about_us" data-aos="fade-left" data-aos-delay="300">ABOUT US</h1>
            <div class="about_us">
                <div class="identity_frame">
                    <div class="img_frame" data-framenumber="1">
                        <div class="img_container_aditya">
                            <img src="HOME/aditya.png" alt="">
                        </div>
                        <div class="dot_1_aditya"></div>
                        <div class="dot_2_aditya"></div>
                        <div class="dot_3_aditya"></div>
                        <div class="name_container_aditya">
                            <h2>Aditya Tiwari</h2>
                        </div>
                        <div class="img_frame_media media_aditya">
                            <a href="adityatiwari2391@gmail.com" class="mail_aditya media" target="_blank"><img src="SVG/Email.svg" alt=""></a>
                            <a href="https://www.linkedin.com/in/aditya-tiwari-64999820a/" class="linkedin_aditya media" target="_blank"><img src="SVG/LinkedIn Logo.svg" alt=""></a>
                            <a href="https://www.instagram.com/_klikbait_/" class="insta_aditya media" target="_blank"><img src="SVG/Instagram Logo.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="img_frame" data-framenumber="2">
                        <div class="img_container_mayani">
                            <img src="HOME/mayani.png" alt="">
                        </div>
                        <div class="dot_1_mayani"></div>
                        <div class="dot_2_mayani"></div>
                        <div class="dot_3_mayani"></div>
                        <div class="name_container_mayani">
                            <h2>Mayani Agnihotri</h2>
                        </div>
                        <div class="img_frame_media media_mayani">
                            <a href="arti.agni01@gmail.com" class="mail_mayani media" target="_blank"><img src="SVG/Email.svg" alt=""></a>
                            <a href="https://www.linkedin.com/in/mayani-agnihotri-254b2a1a9/" class="linkedin_mayani media" target="_blank"><img src="SVG/LinkedIn Logo.svg" alt=""></a>
                            <a href="https://www.instagram.com/mayaniagnihotri/" class="insta_mayani media" target="_blank"><img src="SVG/Instagram Logo.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="img_frame" data-framenumber="3">
                        <div class="img_container_tanmay">
                            <img src="HOME/tanmay.png" alt="">
                        </div>
                        <div class="dot_1_tanmay"></div>
                        <div class="dot_2_tanmay"></div>
                        <div class="dot_3_tanmay"></div>
                        <div class="name_container_tanmay">
                            <h2>Tanmay Singhania</h2>
                        </div>
                        <div class="img_frame_media media_tanmay">
                            <a href="tanmaysm1711@gmail.com" class="mail_tanmay media" target="_blank"><img src="SVG/Email.svg" alt=""></a>
                            <a href="https://www.linkedin.com/in/tanmay-singhania-740143179/" class="linkedin_tanmay media" target="_blank"><img src="SVG/LinkedIn Logo.svg" alt=""></a>
                            <a href="https://www.instagram.com/_itstanmaysinghania/" class="insta_tanmay media" target="_blank"><img src="SVG/Instagram Logo.svg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="description_frame">
                    <p>
                        We are students of Thakur College of Engineering and Technology.
                        We are driven by passion to learn new things and implementing newly
                        gained knowledge hoping that we could bring about a change in the
                        world with the help of inovation and experience.
                    </p>
                </div>
            </div>


            <!-- MOBILE ABOUT US -->
            <div class="hidden_abt_us">
                <div class="person_mayani" onmouseover='showSocialMedia(".social_media_mayani p")' onmouseout="hideSocialMedia('.social_media_mayani p')">
                    <div class="social_media_mayani">
                        <div class="mail"><a target="_blank" href="arti.agni01@gmail.com">
                                <img src="SVG/Email.svg" alt="">
                                <p>arti.agni01@gmail.com</p>
                            </a>
                        </div>
                        <div class="insta"><a target="_blank" href="https://www.instagram.com/mayaniagnihotri/">
                                <img src="SVG/Instagram Logo.svg" alt="">
                                <p>@mayaniagnihotri</p>
                            </a>
                        </div>
                        <div class="linkedin"><a target="_blank" href="https://www.linkedin.com/in/mayani-agnihotri-254b2a1a9/">
                                <img src="SVG/LinkedIn Logo.svg" alt="">
                                <p>Mayani Agnhotri</p>
                            </a>
                        </div>
                    </div>
                    <div class="mayani_pic"></div>
                </div>
                <div class="person_tanmay" onmouseover="showSocialMedia('.social_media_tanmay p')" onmouseout="hideSocialMedia('.social_media_tanmay p')">
                    <div class="social_media_tanmay">
                        <div class="mail"><a target="_blank" href="">
                                <p>tanmaysm1711@gmail.com</p><img src="SVG/Email.svg" alt="">
                            </a></div>
                        <div class="insta"><a target="_blank" href="https://www.instagram.com/_itstanmaysinghania/">
                                <p>@_itstanmaysinghania</p><img src="SVG/Instagram Logo.svg" alt="">
                            </a></div>
                        <div class="linkedin"><a target="_blank" href="https://www.linkedin.com/in/tanmay-singhania-740143179/">
                                <p>TANMAY SINGHANIA</p><img src="SVG/LinkedIn Logo.svg" alt="">
                            </a></div>
                    </div>
                    <div class="tanmay_pic"></div>
                </div>
                <div class="person_aditya" onmouseover="showSocialMedia('.social_media_aditya p')" onmouseout="hideSocialMedia('.social_media_aditya p')">
                    <div class="social_media_aditya">
                        <div class="mail"><a target="_blank" href=""><img src="SVG/Email.svg" alt="">
                                <p>adityatiwari2391@gmail.com</p>
                            </a></div>
                        <div class="insta"><a target="_blank" href="https://www.instagram.com/_klikbait_/"><img src="SVG/Instagram Logo.svg" alt="">
                                <p>@_klikbait_</p>
                            </a></div>
                        <div class="linkedin"><a target="_blank" href="https://www.linkedin.com/in/aditya-tiwari-64999820a/"><img src="SVG/LinkedIn Logo.svg" alt="">
                                <p>Aditya Tiwari</p>
                            </a></div>
                    </div>
                    <div class="aditya_pic"></div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include('assets/footer.php'); ?>
    </main>
    <!-- BOTTOM NAV -->
    <?php include('assets/bottom_nav.php'); ?>


    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="assets/bottom_nav.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="home.js"></script>
    <script type="text/javascript" src="edit_profile.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            hideLoginButton(cookie_info);
            // displayLoginSignupFormWithDelay(cookie_info);
        }
        sendCookieInfo();
        AOS.init();
    </script>
</body>

</html>