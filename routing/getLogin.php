<?php


function getLogin(){
    $path = dirname(__dir__) . "/src/login.php";

    require_once dirname(__dir__) ."/lib/password_hash.php";
    require_once dirname(__dir__). "/lib/connect_to_mysql.php";


    include_once $path;
}