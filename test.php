<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();

	if(isset($_GET['q'])){
		$number = $_GET['q'];
	}else{
		header("Location:exam.php");
	}

	$totalQuestion = $exam->getTotalRow();
	$question = $exam->getQuestionByNumber($number);
	$answer = $exam->getAnswerByNumber($number);
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$process = $pro->processData($_POST);
	}
?>
<div class="main">
<h1>Question <?php echo $question['quesno']?> of <?php echo $totalQuestion;?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesno']?>: <?php echo $question['ques']?></h3>
				</td>
			</tr>
			<?php 
				if($answer):
					while($ansrow = $answer->fetch_assoc()):
			?>
			<tr>
				<td>
				 <input type="radio" value="<?php echo $ansrow['id'];?>" name="ans"/><?php echo $ansrow['ans'];?>
				</td>
			</tr>
			<?php 
				endwhile;
			endif;
			?>

			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $number;?>"/>
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>