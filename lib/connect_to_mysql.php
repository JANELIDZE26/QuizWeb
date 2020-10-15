<?php
function connectToDatabase():object{
    $conn = new mysqli("localhost","root","132gigi00","quiz-website");
    if($conn->connect_error){
        die( "Connection error:" . $conn->connect_error);
    }

    return $conn;
}

