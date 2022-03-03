<?php include('database.php'); ?>
<?php session_start()?>
<?php
// check to see if score is set\
if (!isset($_SESSION['score'])) {
	$_SESSION['score'] = 0;
}
if (isset($_POST['submit'])){
	$number = $_POST['number'];
	$selected_choice =$_POST['choice'];

	$next = $number+1;
	}
	//just added to the code
	else{
	if(isset($_POST['previous'])){
			$number = $_POST['number'];
				$selected_choice =$_POST['choice'];


			$next = $number-1;
			

					header('location: question.php?n='.$next);
					

				}
			}

	//get total question
	$query="SELECT * FROM questions";
	//GET RESULT
	$result = $conn->query($query) or die($conn->error.___LINE_____);
	$total = $result->num_rows;

	// Get correct choice from each question
	$query ="SELECT * FROM choices
			WHERE question_number=$number AND is_correct=1";

		//get result
			$result = $conn->query($query) or die($conn->error.___LINE_____);
			//get row
			$row = $result->fetch_assoc();
				//set correct choice
			$correct_choice= $row['id'];

			//compare
			if ($selected_choice==$correct_choice) {
	
				//Answer is correct
				$_SESSION['score']++;
			}
			
			//check if it is last question
			if($number == $total){
								header('location: final.php');

						
				}			
			else{	

				
				header('location: question.php?n='.$next);
}		


  ?>
