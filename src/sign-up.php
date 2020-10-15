<?php 
    if(isset($_POST["submit"])){
//        require_once "../lib/password_hash.php";
//        require_once "../lib/connect_to_mysql.php";
        $writeAcces = true;

        $conn = connectToDatabase();
        $stm = $conn->prepare("INSERT INTO users (userName,fullName,password) VALUES (?, ?, ? ) ");

        $fullName = $_POST["fullname"];
        $userName = $_POST["user"];
        $password = cryptPassword($_POST["password"]);

        $stm->bind_param("sss",$userName,$fullName,$password);

        $result = mysqli_query($conn,"SELECT userName FROM users Where userName='$userName' ");

        $name = mysqli_fetch_assoc($result);

        if($name["userName"] === $userName){
            $writeAcces = false;
        }else{
            $stm->execute();
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
    <link rel="stylesheet" href="../Styles/sign-up.css">
    <title>Document</title>
</head>
<body>
    <a href="home.php" id = "homeRedirect" >Quizlet</a>
    <div id = "main-div">
    <form action="sign-up.php" method="post" id="form" >
        <p id="sign-up">Sign Up</p>
        <br />
        <p id="advice">It's free and only takes a minute</p>
        <br />
        <input class="inputs"   id="user" type="text" name="user" placeholder="Username" required >    <br>
        <input class="inputs" id="fullname" type="text" name="fullname" placeholder="Full name" required>  <br>
        <input class="inputs" id="password" type="password" name="password" placeholder="Password" required >  <br>
        <input class="inputs" id="confirm-password" type="password" name="confirm-password"  placeholder="Confirm Password" required > <br>
        
        <div id="attention">
        <?php 
            if(isset($_POST["submit"])){
                if(!$writeAcces){
                    echo "<p class='login-attention'>This user Already exists!</p>";
                }else{
                    header("Location: login.php");
                }
            }
        ?>
    </div>
        <input type="submit" name="submit" id="submit" > <br>
    </form>
    </div>
</body>
<script src="../Javascript/validation.js?newversion"></script>
</html>



