<?php
require_once "lib/connect_to_mysql.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../Styles/index.css">
		<title>Quizlet</title>
	</head>
	<body>   
	<header class="header">
	<div id="mainv-div">
		<div class="nav-div">
			<a href="home.php"><p class="title">Quizlet</p></a>
		</div>
		<div class="nav-div">
			<nav class="nav">
			
				<?php if(isset($_SESSION["userName"])): ?>
					<a href="profile.php">Profile</a>
				<?php else: ?>
					<a href="login.php">Profile</a>
				<?php endif ?>

				<?php if(isset($_SESSION["userName"])):?>
					<a href="create-test.php">Create Test </a>
				<?php else:?>
					<a href="login.php">Create Test </a>
				<?php endif?>
			</nav>
		</div>
		<div class="nav-div">
			<nav class="nav">
					<?php if(isset($_SESSION["userName"])): ?>
						<a href="./login.php">Log out</a>
					<?php else: ?>
						<a href="./login.php">Log in</a>
					<?php endif ?>
			</nav>
		</div>
	</div>
	</header>

	<main>
		<div id="animation">
			<div id="input-div">
				<p id="input-paragraph">Quizlet!</p>

				<form action="home.php" method="post">
					<input autocomplete="off" name="id-input" id="text-input" type="text" placeholder="Quiz Pin"
                           minlength="8" maxlength="8" required> <br>
					<input type="submit" name="button-input" id="button"  value="Enter">
				</form>
				<?php 
					if(isset($_POST["button-input"])){
						$redirectToTest = false;
						$id = $_POST["id-input"];
						$participants = [];
						$written = false;

                        $conn = connectToDatabase();
                        $result = mysqli_query($conn,"SELECT * FROM questions WHERE test_id ='$id' ");

                        $data = mysqli_fetch_assoc($result);
                        if(sizeof($data) > 0){
                            $redirectToTest = true;
                            $participants = unserialize($data["participants"]);
                        }

                        if(isset($_SESSION["userName"])){
                            if($redirectToTest){
                                foreach($participants as $participant){
                                    if($participant["name"] === $_SESSION["userName"]){
                                        $written = true;
                                        break;
                                    }
                                }
                                if($written){
                                    echo " <p class='attention'>You have already written this test!</p>";
                                }else{
                                    setcookie("id",$id, time()+1000);
                                    header("Location: ./instructions.php");
                                }
                            }else{
                                echo " <p class='attention'>Make Sure Your Test ID is Correct!</p>";
                            }
                        }else{
                            header("Location: ./login.php");
                        }
                }
				?> 
			</div>
		</div>
	</main>
	</body>
</html>