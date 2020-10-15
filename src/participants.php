<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/participants.css">
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

    $id = $_POST["id"];

    $myarray = [];
    
    $conn = connectToDatabase();
    $result = mysqli_query($conn,"SELECT participants FROM questions WHERE test_id ='$id'");
    $myarray =mysqli_fetch_assoc($result);

    ?>
<div id= "tableDiv">
    <table id="tableid">
      <thead>
        <tr>
          <th>Users</th>
          <th>Point</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        foreach(unserialize($myarray["participants"]) as $user){
          echo  "<tr><td>{$user['name']}</td><td>{$user['point']}</td></tr>";
        }
        
      ?>
      </tbody>
    </table>
  </div>







</body>
</html>