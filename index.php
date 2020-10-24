<?php


require_once "./routing/routing.php";


registerRoute("/", "./routing/getHome:getHome");
registerRoute("/login.php","./routing/getLogin:getLogin");
registerRoute("/lib/password_hash.php","./routing/gethash:getHash");
registerRoute("/home.php", "./routing/getHome:getHome");
registerRoute("/sign-up.php", "./routing/getRegister:getRegister");
registerRoute("/profile.php", "./routing/getProfile:getProfile");
registerRoute("/participants.php", "/routing/getParticipants:getParticipants");
registerRoute("/create-test.php", "/routing/getCreateTest:getCreateTest");
registerRoute("/procces-input.php", "/routing/proccessInput:proccessInput");
registerRoute("/instructions.php", "/routing/getInstructions:getInstructions");
registerRoute("/test-page.php", "/routing/getTestPage:getTestPage");
registerRoute("/result.php", "/routing/getResult:getResult");

if(!isset($_SERVER["PATH_INFO"])){
    executeRoute("/", "./routing/getHome:getHome");
}
executeRoute($_SERVER["PATH_INFO"]);