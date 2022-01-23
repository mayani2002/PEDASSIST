<?php 
if (!defined('allow')) {
    die('Access Denied..........');
}

// Connect to the database
$conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
else{
    $select = mysqli_query($conn, "SELECT * FROM login_credentials WHERE email = '".$_POST['email']."'");
    if(mysqli_num_rows($select)) {
        echo 1;
    }else{
        echo 0;
    }

    //free result from memory
    $conn->close();
    die();
}

?>