<?php
require_once "../lib/connect_to_mysql.php";
if(isset($_POST["submit"])){


	session_start();
	$author = $_SESSION["userName"];
	$id = $_POST["generatePlace"];
	$title = $_POST["test-title"];
	$testTime = $_COOKIE["time"];
	$questions = [];
	$answers = [];
	$correctAnswers = [];
    $participants = [];
	$writeAcces = true;

	for( $index = 0;$index<sizeof($_POST);$index++ ){

	if(array_key_exists("answer$index",$_POST)){
	  array_push($answers, $_POST["answer$index"]);
	}
	if(array_key_exists("correctAnswer$index",$_POST)){
	  array_push($correctAnswers, $_POST["correctAnswer$index"]);
	}
	if(array_key_exists("question$index",$_POST)){
	  array_push($questions, $_POST["question$index"]);
	}
	}

	$conn = connectToDatabase();

	$result = mysqli_query($conn,"SELECT *  FROM questions");
	while($row = mysqli_fetch_assoc($result)){
		if($row["test_id"] === $id){
			$writeAcces = false;
		}
	}
	if($writeAcces){

		$serialized_questions = serialize($questions);
		$serialized_answers = serialize($answers);
		$serialized_correct_answers = serialize($correctAnswers);
        $serialized_participants = serialize($participants);

		$stm = $conn->prepare("INSERT INTO questions (author,test_id,title,testTime,participants,questions,answers,correct_answers) VALUES (?,?,?,?,?,?,?,?) ");

        $stm->bind_param("ssssssss",$author, $id,$title,$testTime,$serialized_participants,$serialized_questions,
        $serialized_answers,
        $serialized_correct_answers);

		$stm->execute();

	}
  header("Location: home.php");
}
