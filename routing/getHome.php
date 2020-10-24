<?php

function getHome(){

    $path =  dirname(__dir__). "/src/home.php";
    require_once $path;
}