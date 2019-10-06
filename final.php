<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
?>
<div class="main">
	<h1>Your are Done !</h1>
	<div class="test">
		<p>Congg !, You are Completed the test !!</p>
		<p>Final Score: 
			<?php 
				if(isset($_SESSION['score'])){
					echo $_SESSION['score'];
					unset($_SESSION['score']);
				}else{
					echo "0";
				}
			?>
		</p>
		<a href="exam.php" class="startest">Start Again</a>
		<a href="viewanswer.php" class="startest">View Answer</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>