<?php include('database.php'); ?>
<?php
session_start();
?>
<?php
	$num = (int) $_GET['n'];

 $sql="SELECT * FROM questions 
 		WHERE question_number = $num ";
 		$result = $conn->query($sql) or die($conn->error.__LINE__);

 			$question = $result->fetch_assoc();

 				//choices

 			 $sql="SELECT * FROM choices
 					WHERE question_number = $num ";

 		$choices = $conn->query($sql) or die($conn->error.__LINE__);
 			//get total question
	$query="SELECT * FROM questionS";
	//GET RESULT
	$result = $conn->query($query) or die($conn->error.___LINE_____);
	$total = $result->num_rows;
	
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
			<div class="current">Question <?php echo $question['question_number'].' of '. $total;?></div>
			<p class="question">
				<?php echo $question['texts'];  ?>
			</p>
			<form method="POST" action="process.php">
				<?php while ($row = $choices->fetch_assoc()): ?>
					<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo  $row['texts'];  ?></li>
				<?php endwhile;  ?>
				<!--just did this-->
				<input type="submit" name="previous" value="previous">
				<!-- ends here-->
				<input type="submit" name="submit"  value="next" id="next">
				<input type="hidden" name="number" value="<?php echo $num; ?>">
			</form>
	
				
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