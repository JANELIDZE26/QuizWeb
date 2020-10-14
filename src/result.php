<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../Styles/result.css">
	<title>Document</title>

</head>
<body>
<header class="header">
    <div id="mainv-div">
        <div class="nav-div">
				<a href="home.php"><p class="title">Quizlet</p></a>
        </div>
        <div class="nav-div">
            <nav class="nav">
                
                <a href="profile.php">Profile</a>
                <a href="create-test.php">Create Test </a>
            </nav>
        </div>
        <div class="nav-div">
            <nav class="nav">
            <form action="profile.php" method="post">
                <input id="button" type="submit" name="submit" value="Log out">
            </form>
            </nav>
        </div>
    </div>
    </header>
<?php 
	session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require_once "../lib/connect_to_mysql.php";


	$id = $_COOKIE["id"];
	$myAnswers = [];
	$point = 0;
	$index = 0;
    for($i=0;$i<sizeof($_POST);$i++){
        if(array_key_exists("radio$i",$_POST)){
            array_push($myAnswers, $_POST["radio$i"]);
        }
    }
	$conn = connectToDatabase();
    $result = mysqli_query($conn,"SELECT questions, correct_answers,participants FROM questions WHERE test_id = '$id'");

    $data = mysqli_fetch_assoc($result);

    $correctAnswers = unserialize($data["correct_answers"]);
    $quantity = sizeof(unserialize($data["questions"]));

    for($i=0;$i<sizeof($correctAnswers);$i++){
        if($myAnswers[$i] === $correctAnswers[$i]){
            $point++;
        }
    }
    $size = sizeof($_POST);
    if(sizeof($_POST) > 0){
        $_SESSION["point"] = $point;
    }
    print_r( "<h1>Result: {$_SESSION['point']}/$quantity!</h1>");


    $participant = array(
        "name"=>$_SESSION["userName"],
        "point"=>$point
    );
    $writeAcces = true;
    $unserialized_participants = unserialize($data["participants"]);
    foreach($unserialized_participants as $participants){
        if($participants["name"] === $participant["name"]){
            $writeAcces = false;
        }
    }
    if($writeAcces){
        array_push($unserialized_participants,$participant);

        $serialized_participants = serialize($unserialized_participants);

        $query = "UPDATE questions SET  participants='$serialized_participants'  WHERE test_id = '$id'";
        $conn->query($query);
        $_SESSION["write"] = false;
    }



?>
</body>

</html>