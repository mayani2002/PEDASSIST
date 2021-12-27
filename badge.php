<?php define('allow',true);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .badges_container {
            display: flex;
            flex-direction: column;
            place-items: center;
            max-height: 100vh;
            max-width: 100vw;
            background-color: rgba(0, 0, 0, 0.158);
            /* padding-top: 2vw; */
            animation: none;
        }
        
        .badge_row_1,
        .badge_row_2 {
            font-family: Sniglet;
            height: 48vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            margin-block: 2vw;
        }
        
        .badge_row_1 img,
        .badge_row_2 img {
            height: 250px;
            z-index: 10;
            animation: dance 2s ease forwards;
            box-shadow: 10px 10px 25px rgba(0, 0, 0, 0.527);
            margin-inline: 2vw;
        }
        
        @keyframes dance {
            0% {
                height: 150px;
                opacity: 0;
            }
            60% {
                height: 250px;
                transform: translateY(50px);
            }
            85% {
                opacity: 1;
                height: 250px;
            }
        }
    </style>
    <link rel="stylesheet" href="login.css">
    <script type="text/javascript" src="login.js"></script>
</head>

<body>
    <div class="badges_container">
        <div class="badge_row_1">
            <img src="1.png" alt="">
            <img src="2.png" alt="">
        </div>
        <div class="badge_row_2">
            <img src="3.png" alt="">
            <img src="4.png" alt="">
        </div>
    </div>
    <script src="confetti.js"></script>
    <script>
    </script>
</body>

</html>