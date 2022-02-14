<?php	
	$email=$_POST["email"];
	$name=$_POST["name"];
	$phone_no=$_POST["phone"];
	$message=$_POST["message"];

    $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');
    if (!$conn) {
        // If the connection to database was unsuccessful, show a connection error.
        echo 'Connection error:' . mysqli_connect_error();
    } else {
        $store_query= "INSERT INTO mails_from_user(name,email,phone_no, message) VALUES('$name','$email','$phone_no','$message')";
        if (mysqli_query($conn, $store_query)){
            echo 1;
        }
        else{
            echo 0;
        }
    //free result from memory
    $conn->close();
    }
?>