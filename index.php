<?php include('database.php'); ?>
<?php
//get total questions
$query = "SELECT * FROM questions";
//get result
$result = $conn->query($query) or die($conn->error.____LINE____);
$total= $result->num_rows;
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
			<h2>Attempt Quiz</h2>
			<p>This is a multiple choice quiz to test your knowledge</p>
			<ul>
				<li><strong>Number Of Questions: </strong><?php echo $total; ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Time: </strong> <?php echo $total*0.5."mins"; ?></li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
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