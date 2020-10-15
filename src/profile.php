<?php 
     session_start();
//     include_once "../lib/connect_to_mysql.php";
     if(!isset($_SESSION["userName"])){
       header("Location: login.php");
     }
    if(isset($_POST["submit"])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./app.css">  -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/profile.css">
    <title>Profile</title>
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

  <div class="profile">

    <?php
     
      if(isset($_SESSION["userName"])){ 
        echo "<h1> Logged As: ".$_SESSION["userName"]." ";
        echo "<h3>See Who has written your tests</h3>";
        $author = $_SESSION["userName"];
        $titleArray = [];
        $idArray = [];

       $conn = connectToDatabase();
       $result = mysqli_query($conn,"SELECT * FROM questions WHERE author = '$author'");
       while($row  = mysqli_fetch_assoc($result)) {
           array_push($titleArray,$row["title"]);
           array_push($idArray,$row["test_id"]);
       }
      echo "<ul>";
        for($i=0;$i<sizeof($idArray);$i++){
          echo "<form id='form$i' action='participants.php' method='post'>
            <input hidden  name='id' type='text' value='{$idArray[$i]}'>
            <li><input type='submit' name='test$i' value='{$titleArray[$i]} 'class='test-button'><p>({$idArray[$i]})</p> </li>
          </form>";
        }
      echo "</ul>";
      }

    ?>
  <div>
       
</body>
</html>