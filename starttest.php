<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();

	$totalQuestion = $exam->getTotalRow();
	$question = $exam->getAllQuestion();
	$allQuestion = $question->fetch_assoc();
?>
<div class="main">
	<h1>Start Your Exam</h1>
	<div class="start-exam">
		<p>Test Your Knowledge</p>
		<ul>
			<li><strong>Number of Question: </strong> <?php echo $totalQuestion;?></li>
			<li><strong>Question Type: </strong> MCQ</li>
		</ul>
		<a href="test.php?q=<?php echo $allQuestion['quesno']?>" class="startest">Start Test</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>