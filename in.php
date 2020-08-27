<?php
$currency = '&euro; '; //Currency Character or code

// Enter your Host, username, password, database below.
$in = mysqli_connect("localhost:3308","root","","sint");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}