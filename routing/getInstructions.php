<?php

function getInstructions (){
    $path = dirname(__dir__) . "/src/instructions.php";
    include_once $path;
}