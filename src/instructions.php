<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../Styles/instructions.css">
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
        <a href="profile.php">Profile</a>
        <a href="create-test.php">Create Test </a>
			</nav>
		</div>
		<div class="nav-div">
			<nav class="nav">
				<a href="login.php">Log out</a>
			</nav>
		</div>
	</div>
    </header>
    <div id="bodyDiv">
			<h1>Instructions</h1>
			<ul>
				<li>Don't Refresh the page during the test!!! your Answers Will be Lost</li>
				<li>Read each question carefully.</li>
				<li>You'll get one point for each correct answer.</li>
				<li>You have a minute for each question.</li>
				<li>When time expires your answers will be submited automatically.</li>
				<li>Click button below to start.</li>
			</ul>
			<form action="test-page.php">
			<input type="submit" name="button-input" id="test-button"  value="Start">
			</form>
    </div>
</body>
</html>