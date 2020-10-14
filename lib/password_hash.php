<?php

function cryptPassword ($password): string{
    $hashFormat = "25x$2y10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password,$hashF_and_salt);

    return $password;
}