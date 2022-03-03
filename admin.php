<?php include('database.php'); ?>
<?php if(isset($_POST['submit'])){
	//get tjhe post variale
$question_number = $_POST['question_number'];
$question_text = $_POST['question_text'];
$correct_choice=$_POST['correct_choice'];
//choices array
$chocies=array();
$choices[1]=$_POST['option1'];
$choices[2]=$_POST['option2'];
$choices[3]=$_POST['option3'];
$choices[4]=$_POST['option4'];
//query fo question table
$query = "INSERT INTO questions (question_number,texts)
			VALUES('$question_number', '$question_text')";
			$insert_row = $conn->query($query) or die($conn->error.___LINE______);
if($insert_row){
	foreach ($choices as $choice => $value) {
		if ($value !=""){
			if ($correct_choice==$choice){
					$is_correct=1;
			}
			else{
				$is_correct=0;
			}
			//choices query
			$query=	"INSERT INTO choices (question_number,is_correct,texts)
									VALUES('$question_number','$is_correct','$value')";

									//run query
			$insert_row = $conn->query($query) or die($conn->error.___LINE______);

			//valuidate inser_row
			if($insert_row){
				continue;
			}
			else{
				die('Error: ('.$conn->errno.')'.$conn->error);
			}
}		}
	}
	$msg = "question has been added";
}
	$query="SELECT * FROM questions";

$result = $conn->query($query) or die($conn->error.___LINE_____);
	$total = $result->num_rows;
	$next= $total+1;

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
			<h2>Add A Question</h2>
			<?php 

				if(isset($msg)){
					echo "<p>".$msg."</p>";
				}

			?>
			<form method="POST" action="admin.php">
				<p>
					<label>Questions Number:</label>
					<input type="number" name="question_number" value="<?php echo $next ?>" />
				</p>
				<p>
					<label>Questions Text:</label>
					<input type="text" name="question_text" />
				</p> 
				<p>
					<label>Choice #1:</label>
					<input type="text" name="option1" />
				</p> 
				<p>
					<label>Choice #2:</label>
					<input type="text" name="option2" />
				</p> 
				<p>
					<label>Choice #3:</label>
					<input type="text" name="option3" />
				</p> 
				<p>
					<label>Choice #4:</label>
					<input type="text" name="option4" />
				</p> 
				<p>
					<label>Correct Choice Number:</label>
					<input type="number" name="correct_choice" />
				</p> 
				<p>
					<input type="submit" name="submit" value="submit">
				</p>
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