<?php
function connectToDatabase():object{
    $conn = new mysqli("localhost","root","13200gigi","quiz-web");
    if($conn->connect_error){
        die( "Connection error:" . $conn->connect_error);
    }

    return $conn;
}

