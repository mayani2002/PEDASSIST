<?php define('allow',true); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDASSIST | Test Page</title>
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="login.css">

</head>

<body>

    <!-- SIDE NAVIGATION BAR -->
    <?php include('assets/headernav.php'); ?>


    <!-- <script type="text/javascript" src="login.js"></script> -->
    <script type="text/javascript" src="assets/basic.js"></script>
    <!-- <script type="text/javascript" src="questions.js"></script> -->
    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            hideLoginButton(cookie_info);
        }

        sendCookieInfo();
    </script>
</body>

</html>