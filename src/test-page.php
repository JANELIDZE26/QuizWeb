<?php
    require_once "../lib/connect_to_mysql.php";
    session_start();
    $id = $_COOKIE["id"];


    if(isset($_SESSION[$id])){
      header("Location: result.php");
      exit();
    }else{
      $_SESSION[$id] = true;
    }

    $myArray = [];
    $conn = connectToDatabase();

    $result = mysqli_query($conn,"SELECT * FROM questions WHERE test_id ='$id'");

    $myArray = mysqli_fetch_assoc($result);

    $questions = unserialize($myArray["questions"]);
    $answers = unserialize($myArray["answers"]);

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../Styles/test-page.css">
  <title>Document</title>
</head>
<body>
<a href="home.php" id = "homeRedirect" >Quizlet</a>

<p id="countdown"></p>
<div id="testMainDiv">
<form action="result.php" method="post">
  <?php 
    //print_r($answers);
    $counter = 1;
    $name = 1;
    $seperator = 1;
    $i =0;

    for($index = 0;$index<sizeof($questions);$index++){

      echo "<p id ='question-id'>$counter) {$questions[$index]}</p>";
      echo "<br>";
      $counter++;
      for($i;$i<sizeof($answers);$i++){
       
        echo "<input required   id='answer$i' class='radio-button' type='radio' class='radioBtn'name='radio$index' value='answer$name'>";
        echo "<label for='answer$i'>{$answers[$i]}</label>";
        $name++;
        echo "<br><br>";
        if($seperator ===4 ){
          $seperator=1;
          $i++;
          break;
        }else{
          $seperator++;
        }
      }
      
    }
    echo "<input hidden id='timer' type='text' value='{$myArray['testTime']}' >"
  ?>
  <input type="submit" name="submit-test" id="submit" >
</form>  
</div>
</body>
    <script src="../Javascript/timer.js"></script>
</html>