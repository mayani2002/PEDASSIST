<?php 
    define('allow',true);
    $lesson_number = $_GET["lesson"];
    if($lesson_number > 1){
        include('assets/php_fetch_lesson_number.php');
        lessonAccessCheck($lesson_number);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="91726057228-j16ha0k20vi4mu4d58scpqe1csuq6eni.apps.googleusercontent.com">

    <title>PEDASSIST | TEST</title>
    <link rel="shortcut icon" type="image/png" href="images/pedassist_favicon.png">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="dragdroptouch.js"></script>

    <link rel="stylesheet" href="questions.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="assets/bottom_nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- <p class="server_response"></p> -->
    <?php include('assets/headernav.php'); ?>



    <!-- MAIN PAGE CONTENT -->
    <main>
        <div class="main_container">
            <div class="question_type">
                <h1>Question Type</h1>
                <h2 class="question_type_name">Single Choice</h2>
                <p class="question_type_description">lorem ipsum dolor sit amet, con lorem ipsum dolor sit amet, con lorem ipsum dolor sit amet, con</p>
                <svg width="13.3235725vw" height="13.6163982vw" viewBox="0 0 182 186" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.4965 14.474L16.2417 29.018L16.095 89.781L15.875 150.614L13.6015 151.173C12.2813 151.453 9.71441 152.782 7.73421 153.97C-1.72671 160.054 -2.68014 173.898 5.82736 181.24C11.6946 186.345 6.12072 185.995 87.8954 185.995C156.982 185.995 161.529 185.925 161.309 184.806C161.163 184.107 160.136 183.408 158.889 183.198C151.848 181.8 146.054 175.087 146.054 168.444C146.054 162.291 151.042 155.998 157.496 154.04C160.356 153.201 161.456 152.572 161.309 151.803C161.089 150.824 159.256 150.684 149.135 150.474L137.254 150.334V114.674C137.254 79.5023 137.254 79.0129 135.787 79.0129C134.32 79.0129 134.32 79.5023 134.32 114.674V150.334H76.3809H18.4419L18.5886 90.69L18.8086 31.1157L33.6234 30.9059L48.5115 30.7661L48.6582 16.5717L48.8782 2.4473L91.6358 2.23752L134.32 2.09767V14.3342C134.32 26.1512 134.393 26.5707 135.787 26.5707C137.254 26.5707 137.254 26.2211 137.107 13.4252L136.887 0.349609L91.7824 0.139832L46.678 -1.52588e-05L31.4965 14.474ZM45.2846 27.7594C44.9912 28.4586 42.1309 28.6684 33.6234 28.6684C27.3895 28.6684 22.109 28.4586 21.8156 28.1789C21.5222 27.8992 26.7294 22.5851 33.2567 16.292L45.2112 4.89459L45.4312 15.8725C45.5046 21.8859 45.4312 27.2699 45.2846 27.7594ZM149.135 155.998C147.448 157.536 145.908 159.424 145.688 160.193C145.248 161.522 143.854 161.522 88.0421 161.522C31.4232 161.522 30.9098 161.522 30.9098 162.92C30.9098 164.319 31.4232 164.319 73.0806 164.319H115.325L115.105 168.304L114.885 172.36L72.9339 172.57C36.337 172.71 30.9098 172.849 30.9098 173.758C30.9098 174.667 36.337 174.807 72.9339 174.947L114.885 175.157L115.105 178.443C115.398 182.359 115.985 182.569 120.972 180.121L124.419 178.443L127.719 180.121C132.706 182.569 133.44 182.359 133.733 178.443L133.953 175.157L139.234 174.947C144.074 174.737 144.588 174.877 145.394 176.346C145.834 177.255 147.595 179.282 149.208 180.96L152.215 183.897H84.8151C41.8376 183.897 16.3884 183.618 14.7016 183.198C3.11376 180.121 -1.28667 166.836 6.56076 158.515C12.0613 152.782 6.48742 153.131 83.6416 153.131H152.068L149.135 155.998ZM131.24 171.451C131.386 175.576 131.166 178.303 130.726 178.303C130.36 178.303 128.819 177.604 127.353 176.835L124.639 175.297L121.705 176.835C120.092 177.604 118.478 178.303 118.112 178.303C117.378 178.303 117.232 165.508 117.965 164.738C118.258 164.459 121.339 164.389 124.786 164.459L131.02 164.668L131.24 171.451ZM143.634 168.514V172.779L138.794 172.57L133.953 172.36L133.733 168.304L133.513 164.319H138.574H143.634V168.514Z" fill="black"/>
                    <path d="M146.054 26.9203L125.152 46.8484L93.2488 46.9882C65.4528 47.198 61.3457 47.3378 61.3457 48.2468C61.3457 49.1558 65.3061 49.2957 91.782 49.5054L122.145 49.6453L118.771 53.0016C115.764 55.9383 115.031 57.3368 112.024 66.0772C109.75 72.6499 108.87 76.0062 109.384 76.4957C109.897 76.9851 113.564 76.1461 120.605 73.9085L131.019 70.6222L156.542 46.289C186.758 17.4807 185.218 19.998 176.564 12.0267C172.457 8.18098 170.623 6.99229 169.083 6.99229C167.323 6.99229 163.582 10.2787 146.054 26.9203ZM175.317 14.2643C180.597 19.3687 180.671 19.928 176.124 24.1234L173.19 26.8504L167.689 21.6761C164.682 18.8093 162.189 16.1522 162.189 15.8026C162.189 14.474 167.616 9.78922 169.156 9.78922C170.036 9.78922 172.603 11.6072 175.317 14.2643ZM162.409 20.1378L164.389 22.0956L143.854 41.6041L123.318 61.1826L120.972 58.8751L118.551 56.6376L138.72 37.4088C149.794 26.8504 159.255 18.18 159.695 18.18C160.062 18.18 161.309 19.089 162.409 20.1378ZM169.156 26.5707L171.283 28.7383L151.188 47.8972C140.113 58.4556 130.652 67.126 130.212 67.126C129.846 67.126 128.599 66.217 127.499 65.1682L125.519 63.2103L145.834 43.8417C157.055 33.2134 166.369 24.473 166.663 24.473C166.883 24.473 167.983 25.452 169.156 26.5707ZM126.985 68.5944C126.985 69.0139 114.224 73.4191 112.977 73.4191C112.464 73.4191 116.351 61.2525 117.231 59.9239C117.598 59.2946 126.985 67.6854 126.985 68.5944Z" fill="black"/>
                    <path d="M27.3887 42.5131C26.7286 42.9327 26.5086 45.6597 26.6553 53.5609L26.8753 63.9794H37.8763H48.8774V53.1414V42.3034L38.6098 42.1635C32.9625 42.0237 27.902 42.2334 27.3887 42.5131ZM47.0439 53.1414V61.5321H38.2431H29.4422V53.1414V44.7507H38.2431H47.0439V53.1414Z" fill="black"/>
                    <path d="M61.1264 60.6232C61.3465 61.8119 63.0333 61.8818 84.082 61.8818C105.131 61.8818 106.818 61.8119 107.038 60.6232C107.258 59.5044 105.791 59.4345 84.082 59.4345C62.3732 59.4345 60.9064 59.5044 61.1264 60.6232Z" fill="black"/>
                    <path d="M27.0231 78.1039C26.7298 78.3136 26.5098 83.2082 26.5098 88.9419V99.2905H37.8775H49.2453V92.6478V86.0051L52.3256 82.7887C54.5992 80.4113 55.1126 79.4324 54.5259 78.873C53.8658 78.2437 53.2791 78.4535 51.9589 79.5722C49.7587 81.5301 49.2453 81.5301 49.2453 79.3625V77.6144H38.3909C32.377 77.6144 27.2432 77.8242 27.0231 78.1039ZM47.0451 82.3692C47.0451 83.7676 46.0917 85.236 43.7448 87.4036L40.4445 90.4802L38.3909 88.5923C36.5574 86.9141 36.1907 86.7743 35.384 87.6833C34.5772 88.5923 34.7972 89.1517 36.8508 91.2493C38.1709 92.5779 39.6377 93.6966 40.0778 93.6966C40.5178 93.6966 41.9846 92.5779 43.3781 91.2493C44.7716 89.9208 46.165 88.802 46.4584 88.802C46.8251 88.802 47.0451 90.62 46.8984 92.7876L46.6784 96.8432L38.0976 97.0529L29.4434 97.2627V88.802V80.4113H38.2443H47.0451V82.3692Z" fill="black"/>
                    <path d="M61.1264 83.6977C61.3464 84.8864 63.5466 84.9563 93.1028 85.1661C124.419 85.3059 124.786 85.3059 124.786 83.9075C124.786 82.509 124.346 82.509 92.8095 82.509C62.8132 82.509 60.9063 82.579 61.1264 83.6977Z" fill="black"/>
                    <path d="M60.9795 96.144C60.9795 97.053 65.0132 97.1928 92.8826 97.1928C120.752 97.1928 124.786 97.053 124.786 96.144C124.786 95.235 120.752 95.0951 92.8826 95.0951C65.0132 95.0951 60.9795 95.235 60.9795 96.144Z" fill="black"/>
                    <path d="M26.8024 114.184C26.6557 114.674 26.5824 119.498 26.6557 124.812L26.8757 134.602L38.0968 134.811L49.2446 135.021V124.113V113.275H38.2435C29.8827 113.275 27.0958 113.485 26.8024 114.184ZM46.8977 123.903L47.1177 132.154H38.2435H29.4427V124.253C29.4427 119.848 29.6627 116.072 29.956 115.792C30.2494 115.583 34.1365 115.443 38.5369 115.513L46.6777 115.722L46.8977 123.903Z" fill="black"/>
                    <path d="M60.9795 119.219C60.9795 120.128 65.0132 120.267 92.8826 120.267C120.752 120.267 124.786 120.128 124.786 119.219C124.786 118.31 120.752 118.17 92.8826 118.17C65.0132 118.17 60.9795 118.31 60.9795 119.219Z" fill="black"/>
                    <path d="M61.3462 130.756C61.1261 131.105 61.1261 131.735 61.3462 132.154C61.6395 132.574 73.0807 132.854 93.3226 132.854C124.272 132.854 124.786 132.854 124.786 131.455C124.786 130.057 124.272 130.057 93.3226 130.057C73.0807 130.057 61.6395 130.336 61.3462 130.756Z" fill="black"/>
                </svg>
            </div>

            <div class="current_question_number">
                <div class="question_number_indicator">
                    <div class="question_number_bubble" id="question_one" data-number="1">
                        <h1>1</h1>
                    </div>
                    <div class="three_dots">
                        <div class="dot" data-number="1"></div>
                        <div class="dot" data-number="1"></div>
                        <div class="dot" data-number="1"></div>
                    </div>
                </div>
                <div class="question_number_indicator">
                    <div class="question_number_bubble" id="question_two" data-number="2">
                        <h1>2</h1>
                    </div>
                    <div class="three_dots">
                        <div class="dot" data-number="2"></div>
                        <div class="dot" data-number="2"></div>
                        <div class="dot" data-number="2"></div>
                    </div>
                </div>
                <div class="question_number_indicator">
                    <div class="question_number_bubble" id="question_three" data-number="3">
                        <h1>3</h1>
                    </div>
                </div>
            </div>

            <div class="question_and_options">
                <div class="question" id="question">
                    <Question>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Tincidunt semper est sit viverra mi mauris tempor sit.
                        Enim nulla laoreet blandit tempus id. Vitae lectus consectetur
                        faucibus lorem viverra odio. Mauris.
                    </Question>
                </div>
                <div class="single_correct_options_container" id="single_correct_options_container">
                    <div class="single_correct_option" data-number="1">
                        <input type="radio" name="single_correct_option_radio" class="single_correct_option_radio" id="single_correct_option_one" data-number="1">
                        <svg class="single_right" width="1.83vw" height="1.39vw" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="single_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="single_correct_option_value" data-number="1">
                            <h2>Eleifend viverra nulla id ut in eu, Nunc.</h2>
                        </div>
                    </div>
                    <div class="single_correct_option" data-number="2">
                        <input type="radio" name="single_correct_option_radio" class="single_correct_option_radio" id="single_correct_option_two" data-number="2">
                        <svg class="single_right" width="1.83vw" height="1.39vw" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="single_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="single_correct_option_value" data-number="2">
                            <h2>Nunc in sapien malesuada tellus.</h2>
                        </div>
                    </div>
                    <div class="single_correct_option" data-number="3">
                        <input type="radio" name="single_correct_option_radio" class="single_correct_option_radio" id="single_correct_option_three" data-number="3">
                        <svg class="single_right" width="1.83vw" height="1.39vw" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="single_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="single_correct_option_value" data-number="3">
                            <h2>Tristique blandit sem malesuada.</h2>
                        </div>
                    </div>
                    <div class="single_correct_option" data-number="4">
                        <input type="radio" name="single_correct_option_radio" class="single_correct_option_radio" id="single_correct_option_four" data-number="4">
                        <svg class="single_right" width="1.83vw" height="1.39vw" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="single_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <!-- <h1>4</h1> -->
                        <div class="single_correct_option_value" data-number="4">
                            <h2>Cras morbi arcu tempor ac.</h2>
                        </div>
                    </div>
                </div>

                <div class="draggable_options_container">
                    <div class="draggable_option" data-number="1">
                        <div class="draggable_option_one">
                            <h1>1</h1>
                        </div>
                        <div class="draggable_option_indicator"></div>
                        <div class="draggable_option_value" draggable="true" data-number="1">
                            Eleifend viverra nulla id ut in eu, Nunc.
                            <i class="fas fa-grip-lines"></i>
                        </div>
                    </div>
                    <div class="draggable_option" data-number="2">
                        <div class="draggable_option_two">
                            <h1>2</h1>
                        </div>
                        <div class="draggable_option_indicator"></div>
                        <div class="draggable_option_value" draggable="true" data-number="2">
                            Nunc in sapien malesuada tellus.
                            <i class="fas fa-grip-lines"></i>
                        </div>
                    </div>
                    <div class="draggable_option" data-number="3">
                        <div class="draggable_option_three">
                            <h1>3</h1>
                        </div>
                        <div class="draggable_option_indicator"></div>
                        <div class="draggable_option_value" draggable="true" data-number="3">
                            Tristique blandit sem malesuada.
                            <i class="fas fa-grip-lines"></i>
                        </div>
                    </div>
                    <div class="draggable_option" data-number="4">
                        <div class="draggable_option_four">
                            <h1>4</h1>
                        </div>
                        <div class="draggable_option_indicator"></div>
                        <div class="draggable_option_value" draggable="true" data-number="4">
                            Cras morbi arcu tempor ac.
                            <i class="fas fa-grip-lines"></i>
                        </div>
                    </div>
                </div>


                <div class="multi_correct_options_container">
                    <div class="multi_correct_option" data-number="1">
                        <input type="checkbox" class="check_box" id="check_box_1" data-number="1">
                        <svg class="multi_right" width="1.83vw" height="1.39vw" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="multi_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label class="multi_correct_option_value" data-number="1">
                            Eleifend viverra nulla id ut in eu, Nunc.
                        </label>
                    </div>
                    <div class="multi_correct_option" data-number="2">
                        <input type="checkbox" class="check_box" id="check_box_2" data-number="2">
                        <svg class="multi_right" width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="multi_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label class="multi_correct_option_value" data-number="2">
                            Eleifend viverra nulla id ut in eu, Nunc.
                        </label>
                    </div>
                    <div class="multi_correct_option" data-number="3">
                        <input type="checkbox" class="check_box" id="check_box_3" data-number="3">
                        <svg class="multi_right" width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="multi_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label class="multi_correct_option_value" data-number="3">
                            Eleifend viverra nulla id ut in eu, Nunc.
                        </label>
                    </div>
                    <div class="multi_correct_option" data-number="4">
                        <input type="checkbox" class="check_box" id="check_box_4" data-number="4">
                        <svg class="multi_right" width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 2L8.5625 17L2 10.1818" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="multi_wrong" width="1.61vw" height="1.53vw" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.8145 2L2.4502 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.4502 2L19.8145 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label class="multi_correct_option_value" data-number="4">
                            Eleifend viverra nulla id ut in eu, Nunc.
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit_btn">
            <input type="submit" value="SUBMIT" id="submit_btn"></input>
        </div>

        <!-- BADGE Display -->

        <div id="badges_container" class="badges_container">
            <div id="badge" class="badge"></div>
        </div>
    </main>

    <?php include('assets/bottom_nav.php'); ?>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="confetti.js"></script>
    <script type="text/javascript" src="questions.js"></script>
    <script type="text/javascript" src="assets/bottom_nav.js"></script>
    <script type="text/javascript">
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";

            hideLoginButton(cookie_info);
        }

        sendCookieInfo();

        function sendLessonNumber() {
            var lessonNumber = '<?php echo $lesson_number; ?>';
            receiveLessonNumber(lessonNumber);
        }

        sendLessonNumber();
    </script>
</body>

</html>