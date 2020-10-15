<?php

function getHash(){
    $path = dirname(__dir__) . "/lib/password_hash.php";

    include_once $path;
}