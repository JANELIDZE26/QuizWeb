<?php

function getTestPage() {
    $path = dirname(__dir__) . '/src/test-page.php';
    require_once dirname(__dir__) . "/lib/connect_to_mysql.php";

    include_once $path;
}