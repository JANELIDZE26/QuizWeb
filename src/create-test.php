<?php 
session_start();
if(!isset($_SESSION["userName"])){
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./Styles/create-test.css">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

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
	<h1>Create your own test</h1>
	<form action="create-test.php" method="post" id="formId">
		<input placeholder="Num" id="numberInput"type="number" name="number" min="1"  required class="testInput" ><br>
		<input id="number-submit" type="submit" name="submit-number" value="Enter"class="testInput"> 
	</form>
	<div id="testDiv">
<form id="form" action="./procces-input.php" method="post">
	<?php

		$counter = 1;
		if(isset($_POST["submit-number"])){

			$number = $_POST["number"];
			setcookie("time",$number);
			echo "<input name='test-title' type='text' placeholder='Test Title' required>";
			for($index=1;$index<=$number;$index++){
					
				for($i=0;$i<5;$i++){
					if($i==0){
						echo "<input required name='question$index' type='text'  class='question' placeholder='Question$index' ><br>";
					}else{
						echo "<input required type='text'  id='$counter' name='answer$counter' placeholder='answer$i'class='questionOption'>";
						$counter++;   
					}
				}
					
				$option1 = $counter-4;
				$option2 = $counter-3;
				$option3 = $counter-2;
				$option4 = $counter-1;
				echo "<br><br><label for='select$counter' id='correct-asnwer-id'>Correct Answer</label><br>";
				
				echo
				"<select required id='select$counter'class='select' name='correctAnswer$index' > 
						<option value='' selected disabled>Choose</option> 
						<option value='answer$option1'>Answer1</option>
						<option value='answer$option2'>Answer2</option> 
						<option value='answer$option3'>Answer3</option> 
						<option value='answer$option4'>Answer4</option> 
				</select><br><br><br>";
			}

			echo '
			<input readonly  required autocomplete="off"  type="text" id="codePlacement" name="generatePlace" placeholder="Test ID">
			
			
			<button  type="button" id="generatorButton" > Generate </button><br>
			<p id="copy"></p>	
			<input id="Submit" type="submit" name="submit" value="Submit">
			
			
			<script src="./Javascript/generator.js"></script>
			';
		}
		
		?>
</form>
</div>
</body>

</html>