<?php

function getResult () {
    $path  = dirname(__dir__) . '/src/result.php';
    require_once dirname(__dir__) . "/lib/connect_to_mysql.php";
    include_once $path;
}