<?php include('database.php'); ?>
<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Quizzer</title>
</head>
<body>
	<header>
		<div class="container">
			<h1>Tosin's Quizzer</h1>
			
		</div>
	</header>
	<main>
		<div class="container">
			<h2>You Are Done!</h2>
			<p>Congrats! You have completed the test</p>
			<p>Final Score: <?php echo $_SESSION['score']; unset($_SESSION['score']);  ?></p>
			<a href="question.php?n=1" class="start">Take Again</a>
		</div>
	
	</main>
	<footer>
		<div class="container">
								Created by Tosin<br>

			Copyright &copy; 2018, Tosin's Quizzer
		</div>
	</footer>

</body>
</html>