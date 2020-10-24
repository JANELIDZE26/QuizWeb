<?php

session_start();
//require_once "../lib/password_hash.php";
//require_once "../lib/connect_to_mysql.php";

if(isset($_SESSION["userName"])){
        session_unset();
        session_destroy();
    }
    if(isset($_POST["submit"])){
        $loginAcces=false;
        $userName = $_POST["userName"];
        $password =cryptPassword($_POST["password"]);

        $conn = connectToDatabase();
        $result = mysqli_query($conn,"SELECT userName,password FROM users WHERE userName = '$userName' AND password = '$password' ");
        $user = mysqli_fetch_assoc($result);

        if($user["userName"] === $userName && $user["password"] === $password){
            $loginAcces = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./app.css">   -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Styles/login.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav">
        <a href="home.php" id = "homeRedirect" >Quizlet</a>
        </nav>
    </header>
    <div id="main-div">
    <form action="login.php" method="post">
    <p id="sign-in">Sign In</p>
        <br />
        <input type="text" name="userName" id="user" placeholder="User name" required>
        <input type="password" name="password" id="pass" placeholder="Password" required>
        <div id="attention">
        <?php 

            if(isset($_POST["submit"])){
                if($loginAcces){
                    session_start();
                    $_SESSION["userName"] = $userName;
                    header("Location: profile.php");
                }else{
                    echo "<p class='login-attention'>Incorrect Username or Password!</p>";
                }
            }
        ?>

    </div>
        <input type="submit" name="submit" id = "submit">
        <a href="sign-up.php" id="redirect" > Don't have an account?</a>
    </form>
            
    </div>

</body>
</html>