<?php


function getProfile(){
    $path = dirname(__dir__) . "/src/profile.php";
    include_once dirname(__dir__) . "/lib/connect_to_mysql.php";
    include_once $path;
}