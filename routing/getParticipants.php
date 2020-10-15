<?php

function getParticipants(){
    include_once dirname(__dir__) . "/lib/connect_to_mysql.php";
    $path = dirname(__dir__) . "/src/participants.php";

    include_once $path;

}
